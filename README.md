# Prueba Laboral

## Requerimientos

Luego de nuestra conversación telefónica, me permito hacer entrega del archivo en pdf denominado "Prueba Técnica" que contiene la descripción de la prueba técnica a nivel de base de datos y de interfaz web.

Para la realización de la prueba agradezco tener en cuenta lo siguiente:

1. Crear la base de datos que está en el diagrama, poblarla según se indica en el documento y realizar las sentencias sql que se solicitan.
2. Se requiere usar base de datos PostgreSQL o superior.
3. Enviar en un archivo de texto todas la sentencias sql (creación de la bd, poblado de la bd y consultas solicitadas).
4. Realizar el CRUD sobre la tabla indicada en el archivo de la prueba técnica.
5. El CRUD puede realizarse en cualquiera de los siguientes lenguajes de programación: php, java o C#. Si es en php, usar IDE NetBeans. Si es en C# usar Visual Studio Community. Si es en java, usar IDE NetBeans y servidor WildFly o proyecto embebido Spring Boot.
6. Para la entrega del proyecto de debe adjuntar el proyecto y el archivo con las sentencias sql en un zip y envíelo por este medio a los siguientes correos: rocio.villamizar@avance.org.co y edgar.cortes@avance.org.co.
7. Enviar la prueba técnica antes del día Jueves 9 de mayo a las 6:00 p.m.

Quedo atenta a sus comentarios.

Cordialmente,

Rocío Villamizar Méndez

---

## Descripción de la base de datos

El diagrama modela un sistema encargado de almacenar documentos contables (Facturas, Notas Débito y Notas Crédito). Cada documento pertenece a una numeración autorizada por la DIAN a una empresa. Una vez entregado el documento a la DIAN, la DIAN determina su estado, el cual es actualizado en la base de datos.

- **Empresa:** Son las empresas que registran los documentos.
- **TipoDocumento:** Define el tipo de documento que se genera, puede ser Factura, Nota Débito o Nota Crédito.
- **Numeracion:** Intervalo de numeración autorizado por la DIAN para una empresa. Una empresa puede tener varias numeraciones de cualquier tipo. Los consecutivos y las vigencias determinan qué número y qué fechas puede tener los documentos generados con una numeración en particular.
- **Estado:** Define un conjunto de estados de validación dentro de los cuales cada documento puede tener uno solo en un momento datos. Estados pueden haber mucho, pero en general se clasifican en dos grupos, los exitosos (Recibido, En validación, Sin errores, etc.) y fallidos o No Exitosos (Formato Incorrecto, Con errores, Fuera de Vigencia, Fuera de Rango, etc.)
- **Documento:** Factura o Nota generada para ser entregada a la DIAN.

### Actividad y consultas

Para cada punto de las actividades y las consultas, relacionar la sentencia SQL utilizada.

1. Cree la base de datos del modelo.
2. Agregue los 3 tipos de documentos relacionados en la explicación del modelo.
3. Agregue los 7 estados de documentos relacionados en la explicación del modelo.
4. Cree al menos 3 empresas.
5. Cree al menos 6 numeraciones por empresa usando uniformemente en lo posible los tipos de documento permitidos.
6. Cree al menos 6 documentos por numeración usando uniformemente en lo posible los estados permitidos.

#### Consultas

- Listar las empresas que tienen más documentos fallidos que exitosos.
- Listar todas las empresas y cuantas facturas, notas débito y notas crédito se han generado entre dos fechas dadas.
- Listar todas las empresas y por cada una, la cantidad de documentos que están en cada uno de los estados.
- Listar las empresas que tienen más de 3 documentos no exitosos.
- Listar por cada empresa, cuantos documentos tiene número o fecha por fuera del rango y vigencia permitido por la DIAN.
- Teniendo en cuenta que las facturas suman y las notas débito suman, listar todas las empresas y el total de dinero recibido (base+impuestos). No incluya las notas crédito pues esas relacionan dinero que sale, no que entra.
- Teniendo en cuenta que el “número completo” de un documento es la concatenación de su prefijo y su número (ejemplo prefijo PRUE, número 654987, numero completo es PRUE654987), determine si hay algún “número completo” repetido en la base de datos (dos empresas pueden tener numeraciones con el mismo prefijo) y cuantas veces se repite.

---

## Interfaz WEB

Cree un CRUD de la tabla documento usando JQUERY y JQUERY UI. Las solicitudes web deben ser asincrónicas (AJAX). Las siguientes validaciones y detalles aplican para la inserción y edición de datos.

- Se debe poder saber a qué empresa pertenece la numeración que se use para ingresar un documento.
- Se debe poder saber si la numeración usada es de factura o nota débito o nota crédito.
- Valide que el número del documento se encuentre dentro del rango autorizado en la numeración.
- Valide que la fecha del documento se encuentre dentro de la vigencia autorizada en la numeración.
- Valide que el número del documento no haya sido usado antes para la numeración seleccionada.
- El valor base del documento no puede ser menor o igual a cero.
- Los impuestos del documento deben ser menores que la base pero nunca menor a cero.

---

## Iniciando


## Clonar el Repositorio y Iniciar el Proyecto

Para clonar y ejecutar este proyecto en su máquina local, siga estos pasos:

1. **Clonar el Repositorio:**
   ```
   git clone https://ruta-del-repositorio.git
   ```

2. **Instalar Dependencias:**
   Navegue hasta el directorio del proyecto y ejecute el siguiente comando para instalar las dependencias de PHP:
   ```
   composer install
   ```

3. **Configurar el Archivo de Entorno:**
   Copie el archivo `.env.example` y cree un nuevo archivo llamado `.env`. Luego, configure las variables de entorno necesarias, como la conexión a la base de datos y las claves de la aplicación.

4. **Generar Clave de Aplicación:**
   Ejecute el siguiente comando para generar una nueva clave de aplicación en su archivo `.env`:
   ```
   php artisan key:generate
   ```

5. **Ejecutar las Migraciones y Semillas:**
   Para crear las tablas en la base de datos y poblarlas con datos de prueba, ejecute:
   ```
   php artisan migrate --seed
   ```

6. **Iniciar el Servidor de Desarrollo:**
   Para iniciar el servidor de desarrollo de Laravel, use el siguiente comando:
   ```
   php artisan serve
   ```

7. **Acceder al Proyecto:**
   Abra su navegador y vaya a `http://localhost:8000` para acceder al proyecto Laravel.

---


## Consultas

### Creación de la Base de Datos

Para crear la base de datos del proyecto, ejecute los siguientes comandos SQL:

```sql
CREATE DATABASE nombre_de_la_base_de_datos;
```

Reemplace `nombre_de_la_base_de_datos` con el nombre que desee para su base de datos.

### Poblando la Base de Datos

Para poblar la base de datos con nuevos registros, puede utilizar los siguientes comandos SQL como ejemplo:

```sql
INSERT INTO Empresa (nombre) VALUES ('Empresa A'), ('Empresa B'), ('Empresa C');
INSERT INTO TipoDocumento (tipo) VALUES ('Factura'), ('Nota Débito'), ('Nota Crédito');
INSERT INTO Numeracion (empresa_id, tipo_documento_id, consecutivo, vigencia_desde, vigencia_hasta) VALUES
(1, 1, 1000, '2023-01-01', '2023-12-31'),
(1, 2, 2000, '2023-01-01', '2023-12-31'),
(2, 1, 3000, '2023-01-01', '2023-12-31');
```

Estos son ejemplos simples y puede ajustarlos según sus necesidades y el modelo de su base de datos.

### Consultas

A continuación se presentan algunas consultas de ejemplo que puede ejecutar en la base de datos para obtener información:

```sql
-- 1. Listar las empresas que tienen más documentos fallidos que exitosos:
SELECT e.razonsocial
FROM empresa e
JOIN numeracion n ON e.id = n.idempresa
JOIN documento d ON n.id = d.idnumeracion
JOIN estado est ON d.idestado = est.id
WHERE NOT est.exitoso
GROUP BY e.razonsocial
HAVING COUNT(CASE WHEN NOT est.exitoso THEN 1 END) > COUNT(CASE WHEN est.exitoso THEN 1 END);

-- 2. Listar todas las empresas y cuantas facturas, notas débito y notas crédito se han generado entre dos fechas dadas:
SELECT e.razonsocial,
       COUNT(CASE WHEN td.descripcion = 'Factura' THEN 1 END) AS facturas,
       COUNT(CASE WHEN td.descripcion = 'Nota Débito' THEN 1 END) AS notas_debito,
       COUNT(CASE WHEN td.descripcion = 'Nota Crédito' THEN 1 END) AS notas_credito
FROM empresa e
JOIN numeracion n ON e.id = n.idempresa
JOIN documento d ON n.id = d.idnumeracion
JOIN estado est ON d.idestado = est.id
JOIN tipodocumento td ON n.idtipodocumento = td.id
WHERE d.fecha BETWEEN '2024-01-01' AND '2024-12-31'
GROUP BY e.razonsocial;

-- 3. Listar todas las empresas y por cada una, la cantidad de documentos que están en cada uno de los estados:
SELECT e.razonsocial,
       est.descripcion AS estado,
       COUNT(*) AS cantidad_documentos
FROM empresa e
JOIN numeracion n ON e.id = n.idempresa
JOIN documento d ON n.id = d.idnumeracion
JOIN estado est ON d.idestado = est.id
GROUP BY e.razonsocial, est.descripcion;

-- 4. Listar las empresas que tienen más de 3 documentos no exitosos:
SELECT e.razonsocial
FROM empresa e
JOIN numeracion n ON e.id = n.idempresa
JOIN documento d ON n.id = d.idnumeracion
JOIN estado est ON d.idestado = est.id
WHERE NOT est.exitoso
GROUP BY e.razonsocial
HAVING COUNT(*) > 3;

-- 5. Listar por cada empresa, cuantos documentos tiene número o fecha por fuera del rango y vigencia permitido por la DIAN:
SELECT e.razonsocial,
       SUM(CASE WHEN d.numero NOT BETWEEN n.consecutivoinicial AND n.consecutivofinal OR d.fecha NOT BETWEEN n.vigenciainicial AND n.vigenciafinal THEN 1 ELSE 0 END) AS documentos_fuera_rango_vigencia
FROM empresa e
JOIN numeracion n ON e.id = n.idempresa
JOIN documento d ON n.id = d.idnumeracion
GROUP BY e.razonsocial;

-- 6. Teniendo en cuenta que las facturas suman y las notas débito suman, listar todas las empresas y el total de dinero recibido (base+impuestos):
SELECT e.razonsocial,
       SUM(d.base + d.impuestos) AS dinero_recibido
FROM empresa e
JOIN numeracion n ON e.id = n.idempresa
JOIN documento d ON n.id = d.idnumeracion
JOIN tipodocumento td ON n.idtipodocumento = td.id
WHERE td.descripcion = 'Factura' OR td.descripcion = 'Nota Débito'
GROUP BY e.razonsocial;

-- 7. Teniendo en cuenta que el “número completo” de un documento es la concatenación de su prefijo y su número, determine si hay algún “número completo” repetido en la base de datos y cuantas veces se repite:
SELECT prefijo || numero AS numero_completo,
       COUNT(*) AS repeticiones
FROM numeracion n
JOIN documento d ON n.id = d.idnumeracion
GROUP BY prefijo || numero
HAVING COUNT(*) > 1;
```

## Realizando Consultas en Laravel

Para realizar consultas en Laravel que sean equivalentes a las consultas SQL anteriores, puede utilizar las siguientes rutas y controladores:

1. **Listar las empresas que tienen más documentos fallidos que exitosos:**
   - Ruta en Laravel:
     ```php
     api/action/1
     ```
   - Método en el controlador `OperationsController`:
     ```sql
     -- 1. Listar las empresas que tienen más documentos fallidos que exitosos:
        SELECT e.razonsocial
        FROM empresa e
        JOIN numeracion n ON e.id = n.idempresa
        JOIN documento d ON n.id = d.idnumeracion
        JOIN estado est ON d.idestado = est.id
        WHERE NOT est.exitoso
        GROUP BY e.razonsocial
        HAVING COUNT(CASE WHEN NOT est.exitoso THEN 1 END) > COUNT(CASE WHEN est.exitoso THEN 1 END);
     ```

2. **Listar todas las empresas y cuantas facturas, notas débito y notas crédito se han generado entre dos fechas dadas:**
   - Ruta en Laravel:
     ```php
     /api/action/2
     ```
   - Método en el controlador `OperationsController`:
     ```sql
     -- 2. Listar todas las empresas y cuantas facturas, notas débito y notas crédito se han generado entre dos fechas dadas:
        SELECT e.razonsocial,
               COUNT(CASE WHEN td.descripcion = 'Factura' THEN 1 END) AS facturas,
               COUNT(CASE WHEN td.descripcion = 'Nota Débito' THEN 1 END) AS notas_debito,
               COUNT(CASE WHEN td.descripcion = 'Nota Crédito' THEN 1 END) AS notas_credito
        FROM empresa e
        JOIN numeracion n ON e.id = n.idempresa
        JOIN documento d ON n.id = d.idnumeracion
        JOIN estado est ON d.idestado = est.id
        JOIN tipodocumento td ON n.idtipodocumento = td.id
        WHERE d.fecha BETWEEN '2024-01-01' AND '2024-12-31'
        GROUP BY e.razonsocial;
     ```

3. **Listar todas las empresas y por cada una, la cantidad de documentos que están en cada uno de los estados:**
   - Ruta en Laravel:
     ```php
     /api/action/3
     ```
   - Método en el controlador `OperationsController`:
     ```sql
     -- 3. Listar todas las empresas y por cada una, la cantidad de documentos que están en cada uno de los estados:
        SELECT e.razonsocial,
               est.descripcion AS estado,
               COUNT(*) AS cantidad_documentos
        FROM empresa e
        JOIN numeracion n ON e.id = n.idempresa
        JOIN documento d ON n.id = d.idnumeracion
        JOIN estado est ON d.idestado = est.id
        GROUP BY e.razonsocial, est.descripcion;
     ```

4. **Listar las empresas que tienen más de 3 documentos no exitosos:**
   - Ruta en Laravel:
     ```php
     /api/action/4
     ```
   - Método en el controlador `OperationsController`:
     ```sql
     -- 4. Listar las empresas que tienen más de 3 documentos no exitosos:
        SELECT e.razonsocial
        FROM empresa e
        JOIN numeracion n ON e.id = n.idempresa
        JOIN documento d ON n.id = d.idnumeracion
        JOIN estado est ON d.idestado = est.id
        WHERE NOT est.exitoso
        GROUP BY e.razonsocial
        HAVING COUNT(*) > 3;
     ```

5. **Listar por cada empresa, cuantos documentos tiene número o fecha por fuera del rango y vigencia permitido por la DIAN:**
   - Ruta en Laravel:
     ```php
     /api/action/5
     ```
   - Método en el controlador `OperationsController`:
     ```sql
     -- 5. Listar por cada empresa, cuantos documentos tiene número o fecha por fuera del rango y vigencia permitido por la DIAN:
        SELECT e.razonsocial,
               SUM(CASE WHEN d.numero NOT BETWEEN n.consecutivoinicial AND n.consecutivofinal OR d.fecha NOT BETWEEN n.vigenciainicial AND n.vigenciafinal THEN 1 ELSE 0 END) AS documentos_fuera_rango_vigencia
        FROM empresa e
        JOIN numeracion n ON e.id = n.idempresa
        JOIN documento d ON n.id = d.idnumeracion
        GROUP BY e.razonsocial;
     ```

6. **Teniendo en cuenta que las facturas suman y las notas débito suman, listar todas las empresas y el total de dinero recibido (base+impuestos):**
   - Ruta en Laravel:
     ```php
     /api/action/6
     ```
   - Método en el controlador `OperationsController`:
     ```sql
     -- 6. Teniendo en cuenta que las facturas suman y las notas débito suman, listar todas las empresas y el total de dinero recibido (base+impuestos):
        SELECT e.razonsocial,
               SUM(d.base + d.impuestos) AS dinero_recibido
        FROM empresa e
        JOIN numeracion n ON e.id = n.idempresa
        JOIN documento d ON n.id = d.idnumeracion
        JOIN tipodocumento td ON n.idtipodocumento = td.id
        WHERE td.descripcion = 'Factura' OR td.descripcion = 'Nota Débito'
        GROUP BY e.razonsocial;
     ```

7. **Teniendo en cuenta que el “número completo” de un documento es la concatenación de su prefijo y su número, determine si hay algún “número completo” repetido en la base de datos y cuantas veces se repite:**
   - Ruta en Laravel:
     ```php
     /api/action/7
     ```
   - Método en el controlador `OperationsController`:
     ```sql
     -- 7. Teniendo en cuenta que el “número completo” de un documento es la concatenación de su prefijo y su número, determine si hay algún “número completo” repetido en la base de datos y cuantas veces se repite:
        SELECT prefijo || numero AS numero_completo,
               COUNT(*) AS repeticiones
        FROM numeracion n
        JOIN documento d ON n.id = d.idnumeracion
        GROUP BY prefijo || numero
        HAVING COUNT(*) > 1;
     ```

Estas rutas en Laravel se corresponden con las consultas SQL anteriores y pueden ser implementadas en los controladores correspondientes para manejar la lógica de las consultas y devolver los resultados esperados.


## Utilizando el CRUD

Para utilizar el CRUD en Laravel y comenzar a interactuar con la aplicación, siga estos pasos:

1. **Inicio de la Aplicación:**
   Para acceder al CRUD, asegúrese de que su servidor de desarrollo de Laravel esté en funcionamiento en `http://localhost:8000`. Puede iniciar el servidor ejecutando el siguiente comando en la terminal:
   ```
   php artisan serve
   ```

2. **Migraciones y Seeders:**
   Antes de comenzar a utilizar el CRUD, asegúrese de haber ejecutado las migraciones y los seeders para crear la estructura de la base de datos y poblarla con datos de prueba. Para ello, ejecute los siguientes comandos en la terminal:
   ```
   php artisan migrate --seed
   ```

3. **Acceso al CRUD:**
   Una vez que el servidor esté en funcionamiento y la base de datos esté preparada, abra su navegador y vaya a `http://localhost:8000` para acceder al CRUD de la aplicación Laravel.

4. **Funcionalidades del CRUD:**
   - Crear: Puede agregar nuevos registros a la base de datos utilizando el formulario de creación proporcionado.
   - Leer: Puede ver todos los registros existentes en la base de datos y consultar su información detallada.
   - Actualizar: Puede editar la información de los registros existentes utilizando el formulario de edición.
   - Eliminar: Puede eliminar registros de la base de datos con el botón de eliminar proporcionado en la interfaz.

¡Ahora está listo para comenzar a utilizar el CRUD y gestionar los datos de su aplicación en Laravel de manera eficiente