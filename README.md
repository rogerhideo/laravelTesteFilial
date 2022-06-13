# testeFilial
 
 Esse projeto está configurado pra trabalhar em conjunto com o projeto Android do link a seguir:
[https://github.com/rogerhideo/laravelTesteFilial](https://github.com/rogerhideo/testeFilial)

Execute os passos para integrar os projetos

1- crie uma database chamada "teste_filial" em seu banco Mysql

     mysql -u root -p"root" -e "DROP DATABASE IF EXISTS teste_filial ;CREATE DATABASE teste_filial"   
     
2 - na Raiz do projeto execute os comando a seguir   
  
      composer update
      php artisan migrate


Para que funcione a comunicação do módulo android com o servidor, eu não consegui configurar para que ele redirecionasse ao "localhost"
então será necessário que o servidor esteja rodando no IP da máquina que está com os projetos

Nota: Você pode usar o comando "ifconfig" no windows ou "hostname -I" no Linux para localizar seu IP.
E então rode o servidos com 

     php artisan serve --host=192.168.100.76:3000
    

Registrar usuário
{{ host }}/api/auth/register
METHOD POST
```json
{
	"name": "Usurionovo",
	"email" : "new_user@gmail.com",
	"password": "1234"
}
```

Login de usuário
{{ host }}/api/auth/login
METHOD POST
```json
{
	"email" : "new_user@gmail.com",
	"password": "1234556"
}

```

Retorna filiais cadastradas pelo usuário<br>
{{ host }}/api/filiais/{userId}<br>
METHOD GET


Retorna 1 filial<br>
{{ host }}/api/filial/{filialId}<br>
METHOD GET


