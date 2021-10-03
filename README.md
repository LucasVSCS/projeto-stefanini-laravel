## Projeto Laravel 8 - 2021

### Sobre o projeto

Desafio desenvolvido em Laravel 8 para gestão fictícia de vendas de produtos 

#### Guia de instalação

1. Realizar o clone do projeto - **git clone https://github.com/LucasVSCS/projeto-stefanini-laravel.git**.

2. Fazer o download e o configurar o do banco de dados localmente (populado ou não com os produtos iniciais) [Link no DRIVE](https://drive.google.com/drive/folders/1LmsBUtKDrAYgynEd67SX2tpEXEXEUSFV?usp=sharing).

3. Na pasta raiz do projeto executar os comandos **composer install**, **npm install** e **npm run dev** para instalar as dependências do projeto.

4. Ainda na pasta raiz do projeto, realizar uma cópia do arquivo **.env.exemple** e alterar seu nome para "**.env**".

5. Configurar os dados de acesso ao banco de dados no arquivo **.env**.

6. Executar o comando **php artisan key:generate** para gerar a chave única do projeto no arquivo **.env**.

7. **(Opcional)** Caso tenha efetuado o download do DB sem os produtos inicias, executar o comando **php artisan db:seed** para gerar os dados de uso do projeto.

8. Executar o comando **php artisan serve** para rodar o projeto localmente na porta :8000.

----------------------------------------------------------------------------

### Descrição das tecnologias utilizadas

1. Modelo de projeto (MVC)

- A divisão do software em 3 camadas: Model (Camada de interação com o banco de dados), View (Interação com o usuário) e Controller (Intermediária entre a Model e a View e a parte **Lógica do sistema**) torna muito mais fácil o planejamento e desenvolvimento do mesmo, e é justamente esse o propósito do **MVC**. Dentre esses adjetivos, podemos dizer também que o MVC auxilia no desenvolvimento simultanêo entre várias pessoas em um mesmo projeto, facilita a manuntenção por dividir o código em partes bem estruturadas e assim como é simples estruturar um projeto para o formato MVC, fora os inúmeros frameworks no mercado que já são empacotados no modelo MVC.

2. Framework de desenvolvimento (Laravel)

- O Laravel é um dos maiores frameworks web na linguagem PHP para desenvolvimento rápido e organizado de projetos que tendem a escalar. Utilizando o padrão de arquitetura MVC, torna-o um framework de fácil manuntenção e de se encontrar soluções pela internet. Com uma grande comunidade, implementação nativa do composer, constantes atualizações e ótima documentação, o Laravel se torna uma perfeita escolha de plataforma para quem busca segurança e confiabilidade. Sempre utilizei o Laravel nos meus projetos pessoais e utilizo diaramente no meu trabalho acompanhado do MySQL. 

3. Banco de dados (MySQL)

- O MySQL esta no topo dos bancos relacionais gratuitos. Por ser OpenSource, se tornou muito popular rapidamente, sendo um dos BD mais utilizados atualmente **(Fonte: https://db-engines.com/en/ranking_trend)**. Dentre suas características podemos citar: Bons níveis de segurança, onde apenas usuários autorizados e com privilégios podem fazer modificações; Disponibilidade, confiabilidade e estabilidade; Ótima documentação; Variedade de linguagens suportadas (PHP, Python, Perl, Ruby, .NET, ASP, C, C++, Java e etc); Suporte por diversos sistemas operacionais; Disponível em soluções integradas como o XAMPP e o LAMPP.

[DER (Diagrama entidade relacional) do projeto](https://drive.google.com/file/d/1_n5vRgfDtdbvdLHloYqnDkKkd0xdbTm1/view?usp=sharing)

4. Git (GitHub)

- Impossível o desenvolvimento de um projeto atualmente sem utilizar pelo menos uma das soluções presentes na internet para versionamento de código. Gratuito, confiável e com uma gigante comunidade, o GitHub atualmente é uma das maiores centrais de repositórios do mundo. Podendo tanto ser utilizado em grandes times quanto trabalhos de apenas uma pessoa; Servindo para documentar e organizar as alterações feitas no código do projeto.
