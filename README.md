# laravel-vue-todo
Pequena aplicação REST API com laravel 8 e FRONTEND com Vue consumindo a api com JWT;


### para iniciar o Vue:


1. ``` $ cd todo-list-vuejs ```
2. ``` $ npm install ```
3. ``` $ npm run serv ```


### Para iniciar o laravel com o docker:


1. na raiz do projeto, ``` $ cd todo-list-api ```
2. ``` $ docker-compose up -d ```
3. ``` $ docker-compose exec app bash ```
4. ``` $ php artisan key:generate ```
5. ``` $ php artisan jwt:secret ```
6. ``` $ php artisan optimize:clear ```



#### Para configurar o BD no docker:


1. docker-compose exec db bash (para abrir o seviço de BD do docker)
2. ``` $ mysql -u root -p ```
3. digite a senha "laravel_web"
4. ``` $ show databases; ``` (verifique se a tabela laravel_web)
5. agora vamos colocar a senha e usuario igual ao arquivo .env
6. ``` $ GRANT ALL ON laravel_web.* TO 'laravel_web_user'@'%' IDENTIFIED BY 'laravel_pass'; ```
7. ``` $ FLUSH PRIVILEGES; ``` (salvar user)

#### Para popular o banco de dados:

```
$ docker-compose exec app bash 
```

```
php artisan migrate:fresh --seed
```

### Teste o acesso em http://localhost/


## Esta disponível o arquivo para api no postman na raiz do projeto!
