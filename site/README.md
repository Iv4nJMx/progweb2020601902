# Sistema Web de Ventas con Gestión de Inventario y Usuarios

## Descripción General

Este sistema web permite la gestión completa de un negocio de ventas, integrando funcionalidades de compra, inventario y administración de usuarios. Está conectado a una base de datos centralizada para almacenar y consultar información en tiempo real.

---

## Funcionalidades Principales

### Usuario General

Los usuarios comunes pueden:

- Realizar ventas de productos
  - Seleccionar productos disponibles
  - Indicar cantidades
  - Generar venta y recibo

- Generar reportes de ventas
  - Consultar historial por fechas
  - Visualizar totales por venta o producto

- Consultar el inventario
  - Ver lista de productos disponibles
  - Ver cantidad (stock) actual por producto

---

### Administrador

Además de las funciones del usuario general, el administrador puede:

- Gestionar usuarios del sistema
  - Crear nuevos usuarios (alta)
  - Asignar roles: Usuario o Administrador
  - Editar o eliminar usuarios existentes

---

## Requisitos del Sistema

### Software

- Servidor Web: IIS (Internet Information Services) o Apache
- PHP: Versión 7.x o superior
- Base de datos: MySQL
- Extensiones necesarias de PHP:
  - `mbstring`
  - `gd`
  - `html2pdf` o `dompdf` para la generación de reportes PDF

### Otros requisitos

- Navegador actualizado (Chrome, Firefox, Edge)
- Composer instalado para gestionar dependencias

---

## Estructura de la Base de Datos (Resumen)

Tabla            | Descripción                                       
-----------------|---------------------------------------------------
`usuarios`       | Contiene datos de acceso y roles                  
`productos`      | Almacena información de los artículos en venta    
`ventas`         | Registro principal de ventas                      
`detalle_ventas` | Relación producto-cantidad por cada venta         
`inventario`     | Stock disponible por producto                     

---

## Seguridad

- Inicio de sesión con control de acceso basado en roles
- Validación de sesiones activas
- Restricción de funciones por tipo de usuario

---

## Tecnologías Utilizadas

- Frontend: HTML, CSS, JavaScript
- Backend: PHP
- Base de datos: MySQL
- Generación de reportes: DOMPDF (integrado mediante Composer)
- Gestión de dependencias: Composer (carpeta `vendor` incluida en el proyecto)

---

## Notas

Este sistema está diseñado para adaptarse a tiendas físicas o comercios electrónicos pequeños y medianos.