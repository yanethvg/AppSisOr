# SysOrApp

This app basically is for controlling severeal procedures at an orthodontic clinic  which patientes and doctors are involved.

## Comenzando
Los siguientes requerimientos se deben seguir para instalar la aplicación para desarrollo.


### Prerequisitos
Lo que debes tener instalador para poder correr el proyecto.

* PHP >= 7.2
* Composer >= 1.8
* PostgreSQL >= 10.1
* Git >= 2.0
* Cmder ***un entorno de terminal amigable*** 
* Redis >= 5.0
* Node.js >= 12.0

### instalación

Después de cumplir todos los requesitos se debe instalar.

1. Primero se debe clonar el proyecto actual.
    ```
    git clone git@github.com:yaneth94/AppSisOr.git
    git clone https://github.com/yaneth94/AppSisOr.git

    ```
2. Luego se debe acceder a la carpeta raiz del directorio clonado e instalar las dependencias.
    ```
        composer install
    ```
3. Luego se debe realizar una copia del archivo **.env.example**  con el nombre **.env**
    ```
        cp .env.example
    ```
3. Luego se debe generar la llave para poder obtener funcionando la aplicación
    ```
        php artisan generate:key
    ```    
4. Se debe crear una base de datos con un usuario en postgreSQL

    ```SQL
        create user api password 'holamundo';
        create database ortodoncia owner api;

    ```

5. Luego de esto sin tener ningun problema, se debe modificar el archivo .env recientemente copiado 
con las variables de entorno de su preferencia se recomienda.

```
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=ortodoncia
    DB_USERNAME=api
    DB_PASSWORD=holamundo

```
6. luego de modificar el archivo **.env** se debe correr las migraciones junto a los datos semillas

```
    php artisan migrate
    php artisan db:seed
```

7. por ultimo cada vez que se actualize la base de datos con nuevos campos o nuevos datos pruebas se debe
ejecutar el siguente comando.

```
    php artisan migrate:refresh --seed

```
