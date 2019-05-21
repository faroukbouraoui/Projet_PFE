# Symfony & Angular App


## Instructions :


1.`Composer update`
2. `symfony/app/config/parameters.yml`: change dbname


Testing using Postman 

**Login - http://127.0.0.1/login  Method POST**
Body:

*key = json
value = {"email":"-----","password":"------"}

**Register - http://127.0.0.1/user/new  Method POST**
Body:

*key = json | value = {"name":"-----","email":"------------","password":"---------"}*


**Orders list - http://127.0.0.1/orders/list  Method POST**
Body:

*key = authorization | value = token .... *

**New Order - http://127.0.0.1/orders/new  Method POST**
Body:

*key = json | value = {"total":"----"}
key = authorization | value = token ... *



