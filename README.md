## ZipCode Api

Zipcode Api es una api para obtener la información completa de un código postal basada en la fuente https://www.correosdemexico.gob.mx/SSLServicios/ConsultaCP/CodigoPostal_Exportar.aspx asegurando que la información regresada sea correctamente.

## Despliegue Local

1. Clonar el repositorio en su computadora de forma local
2. Configurar conexión a base de datos en el archivo .env
3. Correr las migraciones con php artisan migrate
4. Correr el seeder para poblar la base con php artisan db:seed

En su navegador puede ir a la url local para probar con algún código postal valido
http://zipcodeapi.test/api/zip-codes/23088

## Pruebas

El proyecto esta armado con pruebas para verificar su correcto funcionamiento; integrarse con gitflow
o bien se puede agregar al ci/cd si se integrará.

para ejecutar las pruebas utilice php artisan test

## Resumen

Una arquitectura limpia y mejores prácticas para obtener un proyecto laravel escalable, se desarrolló bajo el concepto de arquitectura hexagonal
pensando en las demandas y tendencias de sistemas en la actualidad, esta arquitectura promueve que sus componentes en las capas no estén fuertemente acoplados
lo que permite que se puedan utilizar diferentes puertos y adaptadores para hacer más fácil la interacción, si fuera el caso de la base de datos,
un patron diferente para los controladores o una api externa a consumir, utilizar el patrón repository para separar lógicas. Se penso en el costo que puede generar un alto volumen de tráfico buscando reducir
los costos por procesador en las nubes donde se puede alojar.

Al final del dia esta arquitectura se vuelve más fácil de escalar y mantener, ya que cada componente está separado y se puede modificar sin afectar los demas componentes,
así como su modularidad permite la adición y eliminación de funcionalidades sin afectar al resto.

