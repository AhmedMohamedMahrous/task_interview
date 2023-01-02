
# Backend Stack Task



## Deployment

To deploy this project to must have 

```bash
  PHP >= 7.3.33
  laravel >= 8.x
  MySql >= 5.7.36
```
## Setup
create a new database and deploy the file .sql in database 

in terminal run to generate a new ky
```bash
  php artisan key:generate 
```
run the server 
```bash
  php artisan serve
```
config your database server in .env file 
```bash
  
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=stack_task
DB_USERNAME=root
DB_PASSWORD=
```