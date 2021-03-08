## Projeto Stefanini Laravel 8 - 2021

### Sobre o projeto

Desafio técnico admissional para a empresa Stefanini desenvolvido em Laravel 8 para gestão fictícia de vendas de produtos 

#### Guia de instalação

1. Realizar o clone do projeto - **git clone https://github.com/LucasVSCS/projeto-stefanini-laravel.git**.

2. Fazer o download e o configurar o do banco de dados localmente (populado ou não com os produtos iniciais) [Link no DRIVE](https://drive.google.com/drive/folders/1LmsBUtKDrAYgynEd67SX2tpEXEXEUSFV?usp=sharing).

3. Na pasta raiz do projeto executar os comandos **composer install**, **npm install** e **npm run dev** para instalar as dependências do projeto.

4. Ainda na pasta raiz do projeto, realizar uma cópia do arquivo **.env.exemple** e alterar seu nome para "**.env**".

5. Configurar os dados de acesso ao banco de dados no arquivo **.env**.

6. Executar o comando **php artisan key:generate** para gerar a chave única do projeto no arquivo **.env**.

7. **(Opcional)** Caso tenha efetuado o download do DB sem os produtos inicias, executar o comando **php artisan db:seed** para gerar os dados de uso do projeto.

8. Executar o comando **php artisan serve** para rodar o projeto localmente na porta :8000.
