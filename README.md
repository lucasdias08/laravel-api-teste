# Primeiras considerações

API RESTfull desenvolvida como teste de conhecimento. Tecnologias envolvidas: PHP 8x, Laravel 8, laravel/passport, Migrations, Seeders, Factories, MySql e ORM eloquent. Você pode clonar esse repositório e seguir os passos para testá-la, avaliá-la ou melhorá-la.

__Apesar de ser uma API que trabalhe personagens e suas aldeias, as tecnologias Seeder e Factory colocam dados desconexos com o tema central, visto que utilizar a LIB Faker para preenchimento em massa (porém de forma organizada).__

- Antes de iniciarmos, seria interessante estar bem familiarizado com as tecnologias supracitadas;

- Também é importante que os comandos oriundos do PHP estejam a nível global do Sistema Operacional (setar variável de ambiente "PATH" do sistema com o endereço do PHP no HD);

- Comentei todos os comandos do " .gitignore " para resguardar seu tempo de procurar pacotes. Não será preciso nenhuma configuração senão no banco de dados MySql, que será bem simples e intuitivo

## Preparando ambiente

- __1.__ Clone esse repositório e o abra em seu editor de texto preferido, caso queira;

- __2.__ Crie um Banco de dados MySql com o nome "naruto". Exatamente dessa forma;

- __3.__ Navegue até o arquivo " .env " na raíz do projeto. Lá você pode alterar o nome do banco(DB_DATABASE), do usuário(DB_USERNAME) e a senha de acesso(DB_PASSWORD). O primeiro é opcional, os demais fica ao seu critério;

- __4.__ Navegue até a raíz do projeto com seu terminal (CMD, PowerShell, etc);

- __5.__ Execute o comando: 
>php artisan migrate

- __6.__ Em seguida, execute o comando: 
>php artisan db:seed

- __7.__ Em seguida, execute o comando: 
>php artisan passport:install

- __8.__ Por fim, execute o comando: 
>php artisan serve

### Justificativas

- O comando do item 5 executa as Migrations, que por sua vez criam as tabelas. É importante que esse seja o primeiro passo depois de criar o Banco de Dados;
- O comando do item 6 executa as Seeders + Factories, que por sua vez criam registros para as tabelas. É importante que esse seja o primeiro passo depois de criar as tabelas via Migrations;
- O comando do item 7 instala as credenciais do passport no banco de dados que está sendo utilizado pelo ORM do Laravel (Eloquent). É importante que esse seja o primeiro passo depois de criar os registros do Banco de Dados;
- O comando do item 8 executa o servidor HTTP embutido do laravel. Apesar de ser possível utilizar outros Servidores Web, recomendo que faça como dito.

# Manipulando a API

### Rotas

### Obtendo acesso
- Para iniciar, recomendo que utilize seu navegador para a seguinte __rota__, caso queira logar com seu facebook:
>localhost:8000/api/login/facebook

Essa rota irá redirecionar, caso logado com sucesso, para a rota
>localhost:8000/api/login/facebook/callback

Nessa rota, os dados do suário são processados e salvos seu nome, e-mail e uma senha numérica gerada pela API do facebook. Com esses dados, o usuário pode logar para utilizar as demais rotas.

- Caso queira registrar manualmente, pode acessar a seguinte __rota__ do tipo POST: 
>localhost:8000/api/register

Nessa rota, deve ser passados dados em formulario com os nomes "name", "email", "password" e "password_confirmation". 

- Em seguida, podemos fazer o login manualmente com os os dados cadastrados ou gerados pela API do Facebook. Para tanto, é preciso passar dados em formulario com os nomes "email" e "password". A __ROTA__ é do tipo POST:
>localhost:8000/api/login

### Manipulando as Rotas restritas

Para trabalhar com as rotas retritas, depois de logado, recomendo que use softwares de simulação clientHttp, como o Insomnia ou o Postman.

### aldeias

- __Rota GET__. Espera-se que retorne todas as aldeias e seus dados cadastrados, no formato JSON;
>localhost:8000/api/aldeias

- __Rota GET__, __parametrizada__. Espera-se que retorne a aldeia especificada pelo id na forma de parametro, no formato JSON;
>localhost:8000/api/aldeias/{id}

- __Rota POST__. Para usar essa rota, é necessário estar possuir um usuário e estar logado, de forma que retorne o AcessToken retornado e coloque no cabeçalho de autenticação. No caso do Insomnia é Auth, do tipo Bearer. Espera-se que os dados colocados sejam iguais aos dos campos da tabela (" name ", no caso). Se tudo der certo, será retornado o JSON dos dados cadastrados e o Status Code competente;
>localhost:8000/api/aldeias

- __Rota PUT__. Para usar essa rota, é necessário estar possuir um usuário e estar logado, de forma que retorne o AcessToken retornado e coloque no cabeçalho de autenticação. No caso do Insomnia é Auth, do tipo Bearer. Espera-se que os dados colocados sejam iguais aos dos campos da tabela (" name ", no caso) e que seja passado o ID de identificação do registro. Se tudo der certo, será retornado o JSON dos dados __atualizados__ no cadastrado e o Status Code competente;
>localhost:8000/api/aldeias/{id}

- __Rota DELETE__. Para usar essa rota, é necessário estar possuir um usuário e estar logado, de forma que retorne o AcessToken retornado e coloque no cabeçalho de autenticação. No caso do Insomnia é Auth, do tipo Bearer. Espera-se que seja passado o ID de identificação do registro. Se tudo der certo, será retornado uma mensagem informando que o registro foi excluído. Você pode conferir se realmente foi excluído o registro utilizando a rota GET;
>localhost:8000/api/aldeias/{id}

### personagens

- __Rota GET__. Espera-se que retorne todas os personagens cadastrados, no formato JSON;
>localhost:8000/api/personagens

- __Rota GET__, __parametrizada__. Espera-se que retorne o personagem especificado pelo ID na forma de parametro, no formato JSON;
>localhost:8000/api/personagens/{id}

- __Rota POST__. Para usar essa rota, é necessário estar possuir um usuário e estar logado, de forma que retorne o AcessToken retornado e coloque no cabeçalho de autenticação. No caso do Insomnia é Auth, do tipo Bearer. Espera-se que os dados colocados sejam iguais aos dos campos da tabela (" name " e " fk_aldeia_id ", no caso). Se tudo der certo, será retornado o JSON dos dados cadastrados e o Status Code competente;
>localhost:8000/api/personagens

- __Rota PUT__. Para usar essa rota, é necessário estar possuir um usuário e estar logado, de forma que retorne o AcessToken retornado e coloque no cabeçalho de autenticação. No caso do Insomnia é Auth, do tipo Bearer. Espera-se que os dados colocados sejam iguais aos dos campos da tabela (" name ", no caso) e que seja passado o ID de identificação do registro. Se tudo der certo, será retornado o JSON dos dados __atualizados__ no cadastrado e o Status Code competente;
>localhost:8000/api/personagens/{id}

- __Rota DELETE__. Para usar essa rota, é necessário estar possuir um usuário e estar logado, de forma que retorne o AcessToken retornado e coloque no cabeçalho de autenticação. No caso do Insomnia é Auth, do tipo Bearer. Espera-se que seja passado o ID de identificação do registro. Se tudo der certo, será retornado uma mensagem informando que o registro foi excluído. Você pode conferir se realmente foi excluído o registro utilizando a rota GET;
>localhost:8000/api/personagens/{id}
