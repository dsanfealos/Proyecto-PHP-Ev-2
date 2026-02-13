# Documentación Proyecto PHP 2º Ev.

## <u>Nombre del proyecto:</u> Muebles Kuatropatas

## <u>Descripción</u>
Es una aplicación Ecommerce basándose en una tienda de muebles, que permite su gestión como administrador y su uso como usuario, autenticado o no, con la diferencia de que un usuario autenticado tiene una "Lista de Deseados", que le permite marcar como favoritos algunos productos para luego añadirlos a su carrito.

## <u>Tecnologías utilizadas</u>
Se han utilizado PHP, Laravel, MySQL, Boostrap, Composer y Docker.

Las dependencias principales a utilizar han sido:
* Tailwind
* Vite
* AlpineJS
* Breeze
* Telescope
* Pint
* PHPStan
* PHP_Codesniffer

Las librerías especiales utilizadas han sido:
* Illuminate\Support\Facades\Auth
* Illuminate\Database\Eloquent

## <u>Mejoras implementadas</u>
En este proyecto, se han implementado 2 mejoras respecto a su estructura inicial, con la intención de mejorar su funcionalidad.
* Adición de "Pepper" a las contraseñas: Las contraseñas, además de ser hasheadas antes de guardarse en la base de datos, pueden tener capas de seguridad adicionales como "salt" o "pepper". 
  * El "salt" añade un número concreto (por ejemplo 3) de caracteres aleatorios al final de una string para que, al usar el hash, obtengamos un resultado distinto de otra string inicial idéntica (porque dos usuarios usen la misma contraseña). **Esto ya está incluido por defecto en Laravel.**
  * El 'pepper' es una última capa de seguridad, que añade a todas las contraseñas una string secreta al final de éstas cuyo valor está oculto en el fichero .env, y esto da un resultado de **password + salt + pepper** antes de usar el hash, lo que dificulta aún más la identificación de contraseña incluso en el caso de acceso fraudulento a la base de datos. **Esto es lo que hemos añadido.**

* Adición de una lista de productos filtrados por el mismo color del producto que se esté observando en `/products/{id}` o `products.show.` Esto significa que, si vemos un mueble marrón, nos aparecerá también una lista de los muebles marrones, en caso de que queramos comprar un conjunto del mismo color.

## <u>Estructura del proyecto</u>
Tenemos una estructura principal como la que sigue, especificando sólo las subcarpetas y subficheros más importantes:
* root:   
  * app
    * Http
      * Controllers
      * Middleware
      * Requests
    * Models
    * Providers
    * Traits
    * View
  * bootstrap
    * ficheros: app.php, providers.php
  * config
    * ficheros: app.php, auth.php, ...
  * database
    * data
    * factories
    * migrations
    * seeders
    * ficheros: .gitignore, database.sqlite
  * node_modules
  * public
  * resources
    * css
    * js
    * views
  * routes
    * ficheros: auth.php, console.php, web.php
  * storage
  * tests
  * vendor
  * ficheros: .editorconfig, .env, .env.example, .gitignore, .phpcs.xml, artisan, compos.yaml, composer.json, composer.lock, package-lock.json, package.json, phpstan.neon, phpunit.xml, pint.json, postcss.config.js, tailwind.config.js, vite.config.js

## <u>Instrucciones de instalación</u>

1. Primero, ha de clonarse el proyecto de github https://github.com/dsanfealos/Proyecto-PHP-Ev-2.
2. Después, instalamos sail, copiamos el .env de ejemplo y añadimos sail a los alias de linux:
    ```bash
    php artisan sail:install --with=mysql,redis

    cp .env.example .env
    php artisan key:generate

    echo "alias sail='./vendor/bin/sail'" >> ~/.bashrc
    source ~/.bashrc
    ```
3. En el .env, rellenamos estos campos:
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=myshop
    DB_USERNAME=sail
    DB_PASSWORD=mipassword
    DB_EXTRA_OPTIONS=
    ```
4. Levantamos los contenedores mediante un comando sail:
    ```bash
    sail up -d --build
    ```
5. Accedemos al contenedor de mysql para darle permisos a la aplicación (con usuario sail) para gestionar nuestra base de datos, que llamaremos "myshop":
    ```bash
    #Da el nombre de contenedor
    docker ps --format "table {{.Names}}\t{{.Image}}" | grep -i mysql
    #Accedemos a mysql
    docker exec -it nombre-contenedor mysql -u root -pmipassword
    ```
    ```sql
    CREATE DATABASE IF NOT EXISTS mibasededatos;
    GRANT ALL PRIVILEGES ON myshop.* TO 'sail'@'%';
    FLUSH PRIVILEGES;
    #Después, salimos de mysql
    exit
    ```
6. Poblamos la base de datos con datos iniciales:
    ```bash
    sail artisan migrate:refresh --seed
    ```
7. Instalamos dependencias:
    ```bash
    sail npm install
    ```

## <u>Uso Básico</u>

### Navegación
Por un lado, podemos acceder a las vistas principales mediante el menú de navegación en la parte superior, a las vistas "Inicio", "Productos", "Categorías", "Ofertas", "Contacto" y "Dashboard" (O "Login" y "Registro" si se trata de un usuario no autenticado).

Por otro lado, desde cada una de estas vistas principales podemos acceder a los elementos específicos de cada sección, como un producto, categoría, u oferta concretos, o a la sección de artículos actualmente en oferta.

Finalmente, desde el "Dashboard", como usuario autenticado, podemos aceder a la gestión de productos, situada en `/admin/products` o a la sección de "Lista de Deseados", donde podemos ver nuestros productos marcados como favoritos.

### Login y Registro
Los usuarios pueden usar la mayoría de la aplicación web sin iniciar sesión, a excepción de la gestión de productos y el acceso a la "Lista de Deseados". Para ello, existen las vistas de Login y Registro, que gestionan la autentificación.

### Ver Productos
Todos los usuarios pueden ver los productos en `/products` y `/products-on-sale` (mostrando sólo aquellos en oferta), mostrando su precio actual y anterior a una posible rebaja, cualquier oferta que tengan, y su nombre, imagen y descripción.

Además, desde esa vista pueden pulsar en el botón "Ver Detalles" de cualquier producto e ir a la vista de `/products/{id}`, donde se pueden apreciar más detalles, como el stock, y una imagen más amplia del producto, así como una lista de muebles del mismo color.

### Categorías
En la vista `/categories` se pueden ver todas las categorías de productos disponibles, y un botón de "Ver Productos" para acceder a los productos de cada categoría en `/categories/{id}`. Cada una de las categorías posee una pequeña descripción para orientar a los usuarios.

### Ofertas
En la vista de ofertas en `/offers` tenemos la lista de ofertas, junto a sus respectivos descuentos. Los usuarios pueden ver una mayor descripción y la lista de productos afectados por dichas ofertas al pichar en el botón de "ver Productos" de cada una e ir a `/offers/{id}`, donde se muestra todo con mayor detalle.

### Gestionar producto
Como usuario autenticado, es posible acceder a `/admin/products` para poder crear, editar o borrar cualquier producto, a fin de gestionar la tienda online. La aplicación web tiene capacidad para, además de gestionar los productos en sí en la base de datos, subir ficheros de imágenes de los mismos, permitiendo una mayor visibilidad y funcionalidad.

### Lista de Deseados
Un usuario autenticado, desde la vista específica de producto en `/products/{id}`, puede añadir dicho elemento a su lista de deseados. Más tarde, desde dicha lista en `/admin/wishlist`, podemos añadir cualquiera de los productos favoritos a nuestro carrito para pdoer comprarlos.

### Carrito
Desde la vista de `/cart`, los usuarios pueden  ver la lista de productos de su carrito, modificar la cantidad de los mismos, eliminarlos del carrito, o proceder al pago. Se puestra el precio resultante, así como los precios previos a las rebajas aplicadas por las ofertas

## <u>Requisitos previos</u>
Para utilizar esta esta aplicación web, antes de seguir las instrucciones de instalación se necesitan los siguientes elementos:
* Docker
* Composer
* PHP
* Linux o WSL conectado a Docker Desktop y un editor de código (en Windows). 
* Los puertos donde han de ejecutarse los tres contenedores del compose han de estar libres:
  * Aplicación, en puerto 80
  * MySQL, en el puerto 3306
  * Redis, en el puerto 6379

## <u>Autor</u>
Daniel Sanfélix Alós<br>
Github: https://github.com/dsanfealos/Proyecto-PHP-Ev-2

## <u>Licencia</u>
Uso educativo. Creative Commons
