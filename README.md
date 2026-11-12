# Vinyl & Groove Records

**Good Music Never Gets Old.**

## 1. Apresentação

O **Vinyl & Groove Records** é um projeto académico desenvolvido no âmbito da unidade curricular UC00605 — Programação para a Web.

A aplicação simula a área administrativa de uma loja de música, com uma identidade visual inspirada na cultura musical vintage das décadas de 1960 e 1970.

O projeto permite autenticar utilizadores, gerir registos, consultar listagens e inserir novos utilizadores numa base de dados MySQL/MariaDB.

## 2. Objetivos

Desenvolver uma aplicação web utilizando PHP e MySQL/MariaDB, aplicando conceitos fundamentais de programação para a Web, gestão de sessões, operações com bases de dados, validação de dados e organização de ficheiros.

O projeto procura também estabelecer uma estrutura organizada, documentada e preparada para evolução e versionamento através do Git.

## 3. Tecnologias utilizadas

- **PHP 8.2.12:** processamento do lado do servidor.
- **MariaDB 10.4.32:** gestão e armazenamento de dados.
- **HTML5:** estrutura das páginas.
- **CSS3:** personalização visual.
- **MDBootstrap 7.3.2:** componentes e elementos de interface.
- **Apache:** servidor web.
- **XAMPP:** ambiente de desenvolvimento local.
- **Visual Studio Code:** editor de código.
- **Git:** controlo de versões.

## 4. Estrutura do projeto

```text
vinyl-groove-records/
│
├── assets/
│   ├── css/
│   │   └── style.css
│   │
│   └── img/
│       ├── banner-cinel-vinyl-groove.png
│       ├── banner-cinel-vinyl-login.png
│       ├── cinel-icone.png
│       └── remover.png
│
├── config/
│   ├── config.example.php
│   └── config.local.php
│
├── database/
│   └── vinyl_groove.sql
│
├── includes/
│   ├── auth.php
│   └── header.php
│
├── paginas/
│   ├── home.php
│   ├── inserir.php
│   ├── listar.php
│   └── listar_alfabeticamente.php
│
├── conexao.php
├── index.php
├── login.php
├── logout.php
├── .gitignore
├── README.md
└── README-INSTALACAO.md
```

O ficheiro `config/config.local.php` contém os parâmetros locais de ligação à base de dados e não deve ser publicado no repositório.

O ficheiro `config/config.example.php` apresenta um modelo de configuração sem credenciais reais.

## 5. Base de dados

**Nome utilizado na configuração atual:** `aula`

**Tabela utilizada pela aplicação:** `dados`

| Campo      | Descrição                                |
| ---------- | ---------------------------------------- |
| `id_dados` | Identificador do registo                 |
| `email`    | Endereço de e-mail do utilizador         |
| `password` | Palavra-passe armazenada através de hash |
| `tipo`     | Tipo de utilizador                       |

### Tipos de utilizador

| Valor | Permissão     |
| ----- | ------------- |
| 1     | Administrador |
| 0     | Utilizador    |

### Script SQL

O ficheiro `database/vinyl_groove.sql` contém:

- Estrutura da tabela `dados`.
- Chave primária `id_dados`.
- Campo `AUTO_INCREMENT`.
- Seis registos iniciais de demonstração.

O script não cria automaticamente a base de dados. Esta deverá existir antes da importação.

**Atenção:** a base de dados `aula` é utilizada noutros exercícios. A importação do script deve ser realizada apenas numa base de dados preparada para esse efeito, sem tabelas incompatíveis ou dados que devam ser preservados.

## 6. Funcionalidades implementadas

### Autenticação

- Login através de e-mail e palavra-passe.
- Verificação das credenciais na base de dados.
- Utilização de sessões PHP.
- Proteção das páginas internas.
- Regeneração do identificador da sessão após autenticação.
- Encerramento e destruição da sessão através do logout.

### Gestão de utilizadores

- Inserção de novos utilizadores.
- Validação dos dados introduzidos.
- Verificação de endereços de e-mail duplicados.
- Validação do formato do e-mail.
- Definição do tipo de utilizador.
- Armazenamento das palavras-passe através de hash.

### Consulta de dados

- Listagem de utilizadores.
- Ordenação alfabética por endereço de e-mail.
- Identificação do tipo de utilizador.
- Exclusão das palavras-passe das listagens.

## 7. Configuração da aplicação

A ligação à base de dados está centralizada no ficheiro `conexao.php`.

Os parâmetros de ligação são carregados através de:

```text
config/config.local.php
```

O ficheiro:

```text
config/config.example.php
```

disponibiliza um modelo para configurar a aplicação noutros ambientes.

Esta separação permite manter as configurações locais e as credenciais fora do código principal e do repositório Git.

Para consultar os procedimentos de instalação, configuração do ambiente e execução, utilizar o documento `README-INSTALACAO.md`.

## 8. Identidade visual

O projeto utiliza uma identidade visual inspirada na estética vintage da cultura musical.

| Cor              | Código    | Aplicação          |
| ---------------- | --------- | ------------------ |
| Carvão           | `#202020` | Fundos escuros     |
| Creme            | `#E8DCC3` | Fundos claros      |
| Laranja queimado | `#C76E32` | Destaques          |
| Bordô            | `#9E3029` | Navegação e botões |

**Slogan:** Good Music Never Gets Old.

## 9. Ambiente de desenvolvimento

O projeto foi organizado e configurado para execução local através de XAMPP, com Apache, PHP e MariaDB.

No ambiente de desenvolvimento atual, a aplicação é disponibilizada através do VirtualHost:

```text
http://vinyl-groove.local/
```

O diretório oficial do projeto encontra-se separado da pasta original dos exercícios do XAMPP.

## 10. Estado do projeto

As funcionalidades principais foram implementadas e testadas no ambiente local.

Entre os testes realizados encontram-se:

- Autenticação de utilizadores.
- Acesso à página inicial.
- Listagem de utilizadores.
- Ordenação alfabética.
- Inserção de novos utilizadores.
- Validação de campos obrigatórios.
- Verificação de e-mails duplicados.
- Armazenamento de palavras-passe através de hash.
- Encerramento da sessão.
- Proteção das páginas internas contra acessos não autenticados.
- Importação da estrutura SQL numa base de dados de teste.

O projeto encontra-se em fase de organização técnica, documentação e preparação do controlo de versões.

---

**Vinyl & Groove Records**

_Good Music Never Gets Old._

Projeto académico — UC00605 | Programação para a Web.
