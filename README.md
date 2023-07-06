# Sistema de asignación de Herramientas de un Pañol


*Integrantes:*

- Gastón Hernán Cathalifaud Rosales ([TasmVanum](https://github.com/TasmVanum))
- Matías Sebastián Marchant Soto ([Matias-pixel](https://github.com/Matias-pixel))
- Santiago Ignacio Fierro Madrid ([ElWazy](https://github.com/ElWazy))
- Esteban Salomón Vivanco Ulloa ([EstebanVivanco](https://github.com/EstebanVivanco))

## Entorno de desarrollo

### Requisitos

1. [Git](https://git-scm.com/)
2. [XAMPP (o solo PHP y MySQL)](https://www.apachefriends.org/es/index.html)
3. [Composer](https://getcomposer.org/)

### Instalación

Primero debe clonar el repositorio, para ello en la terminal se ubica en la
ruta donde quiere guardar el proyecto y ejecuta el siguiente comando:
```bash
git clone https://github.com/ElWazy/pasys-api
cd pasys-api
```

Seguido de hacer la clonación. Con `composer` debe generar el archivo `autoload.php` con el
comando:
```bash
composer upgrade
```
esto es necesario ya que composer nos permite poder trabajar con namespaces y uses para
mantener un orden en cuanto a la estructura de clases y modulos (se puede asimilar
con los packages e imports de java).


Al terminar de generar el archivo `autoload.php`. Puede importar los scripts de 
la base de datos del sistema ubicada en la carpeta `sql`. Puede basarse en el Diagrama 
Relacional de abajo para importar las entidades fuertes primero y despues las entidades débiles.

Una particularidad es que el sistema fue creado colaborativamente tanto en Linux como en Windows.
Por ende para evitar conflictos de usuarios, en el script `database.sql` hay un código comentado
para añadir un usario con permisos totales exclusivamente para nuestra base de datos en concreto.


Por ultimo, para ejecutar el proyecto, por terminal debe dirigirse dentro del repositorio a la carpeta 
`/app/public` y ejecutar el siguiente comando:
```bash
php -S localhost:5000
```
Lo que hace el comando es crear un servidor local por medio del interprete de PHP, el cual nos permite
tener el control de las URI y así poder crear todo el sistema de enrutamiento con endpoints.


## Requerimientos

1. El sistema podrá enrolar a un trabajador y su especialidad.
2. Las herrammientas deberán poseer un registro, ser catalogadas, disposición y ubicacón.
3. Se debe gestionar el préstamo y devolución de herramientas.
4. Debe proveerse de un método de notificación de falta de devolución al sistema y usuarios.

## Base de datos

![image](https://user-images.githubusercontent.com/74669757/141474860-7657b81e-833e-4de8-9ff9-3ebe749834c1.png)
