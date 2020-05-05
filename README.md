Forum

Forum desenvolvido em Laravel + Vue.js.

Ao rodar esse projeto, você terá uma aplicação de forum rodando. Nessa aplicação você pode criar um tópico, interagir nele, receber interações de outros usuários. Toda interação acontece em tempo real utilizando pusher.
Este projeto está com container docker configurado para ser mais rápido a configuração.

Para rodar esse projeto, basta seguir os seguintes passos:

- Ter o docker instalado na máquina
- Rodar o comando git clone git@github.com:fmontilla/forum.git no terminal
- Entrar na pasta do projeto via terminal e rodar o comando docker-compose up -d
- Rodar o comando docker exec -it forum_app_1 sh para acessar o container
- Rodar o comando composer install
- Rodar o comando npm install
- Rodar o comando cp .env.example .env
- Para o próximo passo, recomendo ter uma IDE de banco de dados. Para prosseguir, será necessário criar um banco de dados chamado forum ou com o nome que desejar, porém tendo que ser alterado no arquivo .env posteriormente
- Após criar a base de dados, rodar o comando php artisan migrate --seed dentro do container para criar as tabelas e registros (Obs.: caso caia o container do banco de dados, sair do container do terminal digitando exit, verificar os containers de pé rodando docker ps, e caso o container do banco de dados não estiver de pé, rodar novamente docker-compose up -d)
- Rodar o comando php artisan key:generate

Pronto. Agora é só acessar o projeto pelo navegador digitando localhost:86

Na tela inicial, é possível alterar a língua para português ou inglês, fazer login ou se registrar para poder interagir no forum.

Para rodar testes unitário, criar a base de dados forum_testing, entrar no container e digitar o comando ./vendor/bin/phpunit


