<?php

// Filtro de pesquisa
$txt_pesquisa = isset($_POST['txt_pesquisa'])
  ? mysqli_real_escape_string($conexao, $_POST['txt_pesquisa'])
  : "";

// Alternar status (0/1)
$idTarefa = (isset($_GET['idTarefa']) && is_numeric($_GET['idTarefa'])) ? (int)$_GET['idTarefa'] : 0;
$statusTarefa = (isset($_GET['statusTarefa']) && $_GET['statusTarefa'] === '0') ? 1 : 0;

if ($idTarefa > 0) {
  // Se estiver marcando como concluída (1), salva data e hora atuais
  if ($statusTarefa == 1) {
    $sql = "UPDATE tbtarefas SET 
            statusTarefa = {$statusTarefa},
            dataConclusaoTarefa = CURDATE(),
            horaConclusaoTarefa = CURTIME()
            WHERE idTarefa = {$idTarefa}";
  } else {
    // Se estiver desmarcando, limpa data e hora de conclusão
    $sql = "UPDATE tbtarefas SET 
            statusTarefa = {$statusTarefa},
            dataConclusaoTarefa = NULL,
            horaConclusaoTarefa = NULL
            WHERE idTarefa = {$idTarefa}";
  }
  mysqli_query($conexao, $sql);
}
?>

<header>
  <h3><i class="bi bi-list-task"></i> Tarefas</h3>
</header>

<div>
  <a class="btn btn-outline-secondary mb-2" href="index.php?menuop=cad-tarefa">
    <i class="bi bi-list-task"></i> Nova Tarefa
  </a>
</div>

<div>
  <form action="index.php?menuop=tarefas" method="post">
    <div class="input-group">
      <input class="form-control" type="text" name="txt_pesquisa" value="<?=$txt_pesquisa?>" placeholder="Pesquisar por título, descrição, local, setor ou responsável">
      <button class="btn btn-outline-success btn-sm" type="submit">
        <i class="bi bi-search"></i> Pesquisar
      </button>
    </div>
  </form>
</div>

<div class="tabela1">
  <table class="table table-dark table-hover table-bordered table-sm">
    <thead>
      <tr>
        <th>Status</th>
        <th>Título</th>
        <th>Descrição</th>
        <th>Local</th>
        <th>Setor</th>
        <th>Responsável</th>
        <th>Prazo</th>
        <th>Data/Hora Conclusão</th>
        <th>Editar</th>
        <th>Excluir</th>
      </tr>
    </thead>
    <tbody>
<?php
  // Paginação
  $quantidade = 10;
  $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
  $inicio = ($quantidade * $pagina) - $quantidade;

  // Consulta
  $sql = "
    SELECT
      idTarefa,
      statusTarefa,
      tituloTarefa,
      descricaoTarefa,
      localTarefa,
      setorTarefa,
      responsavelTarefa,
      prazoTarefa,
      DATE_FORMAT(dataConclusaoTarefa, '%d/%m/%Y') AS dataConclusaoTarefa,
      DATE_FORMAT(horaConclusaoTarefa, '%H:%i') AS horaConclusaoTarefa
    FROM tbtarefas
    WHERE
      tituloTarefa LIKE '%{$txt_pesquisa}%'
      OR descricaoTarefa LIKE '%{$txt_pesquisa}%'
      OR localTarefa LIKE '%{$txt_pesquisa}%'
      OR setorTarefa LIKE '%{$txt_pesquisa}%'
      OR responsavelTarefa LIKE '%{$txt_pesquisa}%'
    ORDER BY statusTarefa, prazoTarefa
    LIMIT {$inicio}, {$quantidade}
  ";

  $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta: ".mysqli_error($conexao));

  while ($dados = mysqli_fetch_assoc($rs)) {
?>
      <tr>
        <!-- Botão de alternar status -->
        <td>
          <a class="btn btn-secondary btn-sm"
             href="index.php?menuop=tarefas&pagina=<?=$pagina?>&idTarefa=<?=$dados['idTarefa']?>&statusTarefa=<?=$dados['statusTarefa']?>">
            <?php
              if ($dados['statusTarefa'] == 0) {
                echo '<i class="bi bi-square"></i>';
              } else {
                echo '<i class="bi bi-check-square"></i>';
              }
            ?>
          </a>
        </td>

        <td><?=htmlspecialchars($dados['tituloTarefa'])?></td>
        <td><?=htmlspecialchars($dados['descricaoTarefa'])?></td>
        <td><?=htmlspecialchars($dados['localTarefa'])?></td>
        <td><?=htmlspecialchars($dados['setorTarefa'])?></td>
        <td><?=htmlspecialchars($dados['responsavelTarefa'])?></td>

        <!-- PRAZO -->
        <td>
          <?php
            $status = (int)$dados['statusTarefa'];
            $prazo  = $dados['prazoTarefa'] ?? null;

            if ($status === 1) {
              echo "<span class='badge bg-success'>Concluída</span>";
            } elseif (!empty($prazo) && $prazo !== '0000-00-00') {
              $hoje = new DateTime('today');
              $ref  = new DateTime($prazo);
              $dias = (int)$hoje->diff($ref)->format('%r%a');

              if ($dias < 0) {
                echo "<span class='badge bg-danger'>Atrasado há ".abs($dias)." dia".(abs($dias)>1?'s':'')."</span>";
              } elseif ($dias == 0) {
                echo "<span class='badge bg-warning text-dark'>Vence hoje</span>";
              } else {
                echo "<span class='badge bg-info text-dark'>Faltam {$dias} dia".($dias>1?'s':'')."</span>";
              }
              
              // Exibe a data do prazo
              $dataFormatada = date('d/m/Y', strtotime($prazo));
              echo "<br><small>{$dataFormatada}</small>";
            } else {
              echo "<span class='badge bg-secondary'>Sem prazo</span>";
            }
          ?>
        </td>

        <!-- Data e Hora da conclusão -->
        <td>
          <?php
            if ($dados['dataConclusaoTarefa'] && $dados['dataConclusaoTarefa'] != '00/00/0000') {
              echo $dados['dataConclusaoTarefa'];
              if ($dados['horaConclusaoTarefa'] && $dados['horaConclusaoTarefa'] != '00:00') {
                echo "<br><small>{$dados['horaConclusaoTarefa']}</small>";
              }
            } else {
              echo "<span style='color: #999;'>-</span>";
            }
          ?>
        </td>

        <!-- Ações -->
        <td class="text-center">
          <a class="btn btn-outline-warning btn-sm"
             href="index.php?menuop=editar-tarefa&idTarefa=<?=$dados['idTarefa']?>">
            <i class="bi bi-pencil-square"></i>
          </a>
        </td>

        <td class="text-center">
          <button type="button"
                  class="btn btn-outline-danger btn-sm"
                  data-bs-toggle="modal"
                  data-bs-target="#modalExcluir"
                  data-id="<?=$dados['idTarefa']?>"
                  data-nome="<?=htmlspecialchars($dados['tituloTarefa'])?>"
                  data-tipo="esta tarefa"
                  data-url="index.php?menuop=excluir-tarefa&idTarefa=<?=$dados['idTarefa']?>">
            <i class="bi bi-trash-fill"></i>
          </button>
        </td>
      </tr>
<?php
  }
?>
    </tbody>
  </table>
</div>

<?php include($_SERVER['DOCUMENT_ROOT']."/sistema-suporte/paginas/modal-exclusao.php"); ?>

<ul class="pagination justify-content-center">
  <br>
<?php
  // Contagem total considerando o filtro de pesquisa
  $sqlTotal = "SELECT COUNT(*) as total FROM tbtarefas 
               WHERE tituloTarefa LIKE '%{$txt_pesquisa}%'
               OR descricaoTarefa LIKE '%{$txt_pesquisa}%'
               OR localTarefa LIKE '%{$txt_pesquisa}%'
               OR setorTarefa LIKE '%{$txt_pesquisa}%'
               OR responsavelTarefa LIKE '%{$txt_pesquisa}%'";
  
  $qrTotal = mysqli_query($conexao, $sqlTotal) or die(mysqli_error($conexao));
  $dadosTotal = mysqli_fetch_assoc($qrTotal);
  $numTotal = $dadosTotal['total'];
  $totalPagina = ceil($numTotal / $quantidade);

  echo "<li class='page-item'><span class='page-link'>Total de tarefas: {$numTotal}</span></li>";
  echo '<li class="page-item"><a class="page-link" href="?menuop=tarefas&pagina=1">Primeira página</a></li>';

  if ($pagina > 6) {
    echo '<li class="page-item"><a class="page-link" href="?menuop=tarefas&pagina='.($pagina-1).'"> <<< </a></li>';
  }

  for ($i = 1; $i <= $totalPagina; $i++) {
    if ($i >= ($pagina - 5) && $i <= ($pagina + 5)) {
      if ($i == $pagina) {
        echo "<li class='page-item active'><span class='page-link'>{$i}</span></li>";
      } else {
        echo "<li class='page-item'><a class='page-link' href='?menuop=tarefas&pagina={$i}'>{$i}</a></li>";
      }
    }
  }

  if ($pagina < ($totalPagina - 5)) {
    echo '<li class="page-item"><a class="page-link" href="?menuop=tarefas&pagina='.($pagina+1).'"> >>> </a></li>';
  }

  echo "<li class='page-item'><a class='page-link' href='?menuop=tarefas&pagina={$totalPagina}'>Última página</a></li>";
?>
</ul>