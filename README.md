# 🧾 SDATCC

Esse sistema é um Repositório Institucional para o IFNMG - Campus Januária desenvolvido com Laravel 11.x como parte do TCC (Trabalho de conclusão de Curso) do curso de Bacharelado em Sistemas de Informação.

## ✅ Requisitos

Certifique-se de que os seguintes softwares estão instalados em sua máquina:

- **PHP**: >= 8.3.4 
- **Composer**: >= 2.7.2  
- **MySQL**: >= 8.3 
- **Node.js**: >= 20.12.1  
- **NPM**: >= 10.5 
- **Laravel**: 11.x  

## 🚀 Instalação

Clone o repositório:

```bash
git clone https://github.com/maxwillias/sdatcc.git
cd sdatcc
```

Instale as dependências PHP com o Composer:
```bash
composer install
```
Instale as dependências JavaScript:
```bash
npm install
```
Copie o arquivo de ambiente e configure:
```bash
cp .env.example .env
```
Gere a chave da aplicação:
```bash
php artisan key:generate
```
Configure o banco de dados no arquivo .env:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```
Execute as migrações:
```bash
php artisan migrate
```
(Opcional) Execute os seeders, caso queira gerar alguns dados iniciais:
```bash
php artisan db:seed
```
Compile os assets do frontend:
```bash
npm run dev
```
Inicie o servidor local:
```bash
php artisan serve
```
O projeto estará disponível em http://localhost:8000
