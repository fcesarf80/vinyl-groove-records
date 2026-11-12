# Vinyl & Groove Records — Guia de Instalação

## 1. Requisitos

Para executar a aplicação, são necessários:

- Windows 10 ou superior.
- XAMPP.
- Apache.
- PHP 8.2 ou superior.
- MySQL ou MariaDB.
- Navegador web.
- Ligação à Internet para carregar os recursos externos do MDBootstrap através de CDN.

## 2. Instalação e configuração do XAMPP

1. Instalar o XAMPP.
2. Abrir o XAMPP Control Panel.
3. Iniciar os serviços **Apache** e **MySQL**.
4. Confirmar que ambos os serviços se encontram em execução.

O phpMyAdmin pode ser acedido através de:

```text
http://localhost/phpmyadmin/
```

## 3. Instalação dos ficheiros

O projeto deve ser colocado num diretório acessível ao servidor Apache.

No ambiente de desenvolvimento atual, a localização oficial é:

```text
C:\Users\fcesa\Documents\github\vinyl-groove-records
```

A estrutura principal é:

```text
vinyl-groove-records/
│
├── assets/
│   ├── css/
│   └── img/
│
├── config/
│   ├── config.example.php
│   └── config.local.php
│
├── database/
│   └── vinyl_groove.sql
│
├── includes/
├── paginas/
├── conexao.php
├── index.php
├── login.php
└── logout.php
```

## 4. Configuração do VirtualHost

No ambiente de desenvolvimento atual, a aplicação utiliza o domínio local:

```text
vinyl-groove.local
```

O ficheiro de configuração dos VirtualHosts do Apache encontra-se em:

```text
C:\xampp\apache\conf\extra\httpd-vhosts.conf
```

O ficheiro principal do Apache deve incluir esta configuração.

Exemplo de configuração:

```apache
<VirtualHost *:80>
    ServerName vinyl-groove.local
    DocumentRoot "C:/Users/fcesa/Documents/github/vinyl-groove-records"

    <Directory "C:/Users/fcesa/Documents/github/vinyl-groove-records">
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

O ficheiro de hosts do Windows deve conter:

```text
127.0.0.1 vinyl-groove.local
```

A localização habitual do ficheiro é:

```text
C:\Windows\System32\drivers\etc\hosts
```

Após a configuração, reiniciar o Apache através do XAMPP Control Panel.

A aplicação deverá estar disponível em:

```text
http://vinyl-groove.local/
```

**Nota:** os caminhos do exemplo correspondem ao ambiente de desenvolvimento atual. Numa instalação noutro computador, devem ser adaptados à localização efetiva do projeto.

## 5. Preparação da base de dados

A aplicação utiliza atualmente a base de dados:

```text
aula
```

A tabela utilizada pela aplicação é:

```text
dados
```

Para uma instalação nova, a base de dados deve ser criada previamente através do phpMyAdmin ou de outro cliente MariaDB.

**Atenção:** não eliminar nem substituir uma base de dados `aula` existente sem verificar o seu conteúdo. Esta base de dados pode conter tabelas e registos de outros exercícios.

O ficheiro `database/vinyl_groove.sql` contém apenas a estrutura e os seis registos iniciais da tabela `dados`. Não cria a base de dados automaticamente.

A importação deve ser efetuada apenas numa base de dados preparada para receber essa estrutura.

## 6. Configuração da ligação à base de dados

A aplicação utiliza o ficheiro:

```text
conexao.php
```

Este ficheiro carrega os parâmetros de ligação a partir de:

```text
config/config.local.php
```

Para preparar a configuração local:

1. Copiar `config/config.example.php`.
2. Criar um ficheiro chamado `config.local.php` dentro da pasta `config`.
3. Configurar os parâmetros de ligação ao MariaDB.

Exemplo de configuração:

```php
<?php

return [
    'database' => [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'aula',
        'charset' => 'utf8mb4'
    ]
];
```

Os valores apresentados correspondem à configuração local utilizada no ambiente de desenvolvimento atual.

Se o servidor utilizar outras credenciais, os parâmetros deverão ser adaptados.

**Importante:** o ficheiro `config.local.php` contém informação específica do ambiente e não deve ser publicado no GitHub.

## 7. Execução da aplicação

Depois de configurar o Apache, a ligação à base de dados e os ficheiros locais:

1. Abrir o XAMPP Control Panel.
2. Confirmar que Apache e MySQL estão ativos.
3. Abrir o navegador.
4. Aceder ao endereço:

```text
http://vinyl-groove.local/
```

A página inicial deverá apresentar o formulário de autenticação.

## 8. Credenciais de demonstração

O ficheiro `database/vinyl_groove.sql` contém seis registos de demonstração.

As palavras-passe encontram-se armazenadas através de hash, utilizando a função `password_hash()` do PHP.

A validação das credenciais é efetuada através de `password_verify()`.

As credenciais de demonstração devem ser consultadas apenas no contexto do ambiente de teste e não devem ser utilizadas em ambientes de produção.

## 9. Verificação da instalação

Após a configuração, recomenda-se verificar:

- Acesso ao endereço local da aplicação.
- Funcionamento do formulário de autenticação.
- Ligação à base de dados.
- Acesso à página inicial.
- Listagem de utilizadores.
- Ordenação alfabética por e-mail.
- Inserção de novos utilizadores.
- Validação dos campos obrigatórios.
- Verificação de endereços de e-mail duplicados.
- Encerramento da sessão.
- Proteção das páginas internas contra acessos não autenticados.

## 10. Observações

- A aplicação utiliza PHP e MariaDB/MySQL.
- A ligação à base de dados é centralizada em `conexao.php`.
- Os parâmetros de ligação são definidos em `config/config.local.php`.
- O ficheiro `config.example.php` serve como modelo de configuração.
- O ficheiro `database/vinyl_groove.sql` contém a estrutura e os dados iniciais da tabela `dados`.
- O projeto utiliza MDBootstrap através de CDN, sendo necessária ligação à Internet para carregar os respetivos recursos externos.
- Não importar o script SQL sobre uma base de dados existente sem verificar previamente a estrutura e os dados.

---

**Vinyl & Groove Records**

_Good Music Never Gets Old._

Projeto académico — UC00605 | Programação para a Web.
