# 📋 SISTEMA WEB DE APOIO À GESTÃO DE SERVIÇOS TÉCNICOS

Sistema WEB para gerenciamento de chamados, tarefas, equipamentos e contatos desenvolvido como Trabalho de Conclusão de Curso (TCC), com funcionalidades de cadastro, edição, exclusão e favoritos.

## 🚀 Tecnologias Utilizadas

- **PHP** - Linguagem de programação server-side
- **MySQL** - Banco de dados relacional
- **Bootstrap 5** - Framework CSS para interface responsiva
- **JavaScript** - Validação de formulários e interatividade
- **HTML5/CSS3** - Estrutura e estilização

## ✨ Funcionalidades

- ✅ Cadastros
- ✅ Edição e exclusão
- ✅ Busca e filtros
- ✅ Interface responsiva
- ✅ Sistema de login seguro
- ✅ Upload de fotos

## 📋 Pré-requisitos

Antes de começar, você precisa ter instalado:

- [XAMPP](https://www.apachefriends.org/) (ou WAMP/LAMP)
  - Apache
  - PHP 7.4 ou superior
  - MySQL 5.7 ou superior

## 🔧 Instalação

### 1. Clone o repositório

```bash
git clone https://github.com/edcarlosbd/sistema-gestao-tecnica.git
```

### 2. Configure o banco de dados

1. Inicie o **Apache** e **MySQL** no XAMPP
2. Acesse o **phpMyAdmin**: `http://localhost/phpmyadmin`
3. Importe o arquivo de banco de dados:
   - Clique em "Importar"
   - Selecione o arquivo `db/dbsisagendador-bk.sql`
   - Clique em "Executar"

### 3. Configure as credenciais

1. Copie o arquivo `.env.example` para `.env`:
   ```bash
   cp .env.example .env
   ```

2. Edite o arquivo `.env` com suas credenciais do MySQL:
   ```env
   DB_HOST=localhost
   DB_NAME=dbsisagendador
   DB_USER=root
   DB_PASS=sua_senha_aqui
   ```

   > ⚠️ **Importante:** O arquivo `.env` não deve ser commitado no Git (já está no `.gitignore`)

### 4. Mova o projeto para o servidor

Copie a pasta do projeto para:
- **XAMPP:** `C:\xampp\htdocs\sistema-suporte_ajustando`
- **WAMP:** `C:\wamp64\www\sistema-suporte_ajustando`
- **LAMP:** `/var/www/html/sistema-suporte_ajustando`

### 5. Acesse o sistema

Abra no navegador:
```
http://localhost/sistema-suporte_ajustando
```

## 🔐 Credenciais de Acesso

O banco de dados vem com usuários de exemplo. Consulte o arquivo SQL para ver os logins disponíveis.

## 📁 Estrutura do Projeto

```
sistema-suporte_ajustando/
├── css/                  # Arquivos de estilo
├── db/                   # Banco de dados e configuração
│   ├── config.php       # Configuração do banco
│   ├── conexao.php      # Conexão com MySQL
│   └── dbsisagendador-bk.sql  # Estrutura do banco
├── img/                  # Imagens do sistema
├── js/                   # Scripts JavaScript
├── paginas/              # Páginas do sistema
│   ├── contatos/        # CRUD de contatos
│   ├── equipamentos/    # Gestão de equipamentos
│   └── chamados/        # Sistema de chamados
├── .env.example         # Modelo de configuração
├── .gitignore           # Arquivos ignorados pelo Git
├── index.php            # Página inicial
├── login.php            # Tela de login
└── README.md            # Este arquivo
```

## 🛡️ Segurança

Este projeto implementa boas práticas de segurança:

- ✅ **Prepared Statements** - Proteção contra SQL Injection
- ✅ **Variáveis de ambiente** - Credenciais protegidas em arquivo `.env`
- ✅ **Hash de senhas** - Senhas criptografadas com SHA-256
- ✅ **Validação de formulários** - Validação client-side e server-side
- ✅ **Controle de sessão** - Sistema de autenticação seguro

## 🤝 Contribuindo

Contribuições são bem-vindas! Para contribuir:

1. Faça um Fork do projeto
2. Crie uma branch para sua feature (`git checkout -b feature/MinhaFeature`)
3. Commit suas mudanças (`git commit -m 'Adiciona MinhaFeature'`)
4. Push para a branch (`git push origin feature/MinhaFeature`)
5. Abra um Pull Request

## 📝 Licença

Este projeto foi desenvolvido como Trabalho de Conclusão de Curso (TCC).

## 👨‍💻 Autor

**Ed Carlos**
- GitHub: [@edcarlosbd](https://github.com/edcarlosbd)

---

⭐ Se este projeto te ajudou, considere dar uma estrela!
