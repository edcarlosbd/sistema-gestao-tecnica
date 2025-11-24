<?php
    // Carregar variáveis de ambiente do arquivo .env (se existir)
    $envFile = __DIR__ . '/../.env';
    if (file_exists($envFile)) {
        $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            // Ignorar comentários
            if (strpos(trim($line), '#') === 0) {
                continue;
            }
            
            // Parse linha no formato CHAVE=valor
            if (strpos($line, '=') !== false) {
                list($key, $value) = explode('=', $line, 2);
                $key = trim($key);
                $value = trim($value);
                
                // Remover aspas se houver
                $value = trim($value, '"\'');
                
                // Definir variável de ambiente
                putenv("$key=$value");
                $_ENV[$key] = $value;
                $_SERVER[$key] = $value;
            }
        }
    }

    // Constantes de configuração da conexão com o banco de dados
    // Usa variáveis de ambiente com valores padrão como fallback
    define("SERVIDOR", getenv('DB_HOST') ?: 'localhost:3308');
    define("USUARIO", getenv('DB_USER') ?: 'root');
    define("SENHA", getenv('DB_PASS') ?: '');
    define("BANCO", getenv('DB_NAME') ?: 'dbsisagendador');
    define("PORTA", (int)(getenv('DB_PORT') ?: 3308));
?>
