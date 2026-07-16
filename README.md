# Sistema de Reservas - Hotel Paraíso (Pruebas Unitarias)

![PHP Version](https://img.shields.io/badge/php-%3E%3D%208.4-777bb4.svg)
![PHPUnit Version](https://img.shields.io/badge/phpunit-%3E%3D%2011.5-blue.svg)
![License](https://img.shields.io/badge/license-MIT-green.svg)

Este proyecto corresponde a la **Guía de Práctica Nro 12** de la Unidad Didáctica de **Pruebas Unitarias de Software**. El objetivo principal fue auditar y refactorizar un sistema de reservas de hotel inicialmente defectuoso, aplicando principios de control de calidad (QA) y robusteciendo el código frente a **casos límite** (valores vacíos, negativos, formatos incorrectos y lógica cronológica errónea).

---

##  Características y Correcciones Aplicadas

Se implementó una suite completa de pruebas automatizadas utilizando **PHPUnit 11** y **Atributos Nativos de PHP 8**, corrigiendo los siguientes 10 puntos críticos (CP) del sistema original:

* **Cliente (`Cliente.php`):** Validación estricta para evitar nombres vacíos (`CP-01`) y filtrado nativo de correos electrónicos válidos (`CP-02`).
* **Habitación (`Habitacion.php`):** Restricción de números de habitación (`CP-03`) y precios (`CP-04`) a valores estrictamente positivos. Control estricto de disponibilidad para evitar dobles reservas (`CP-05` y `CP-06`).
* **Reserva (`Reserva.php`):** Validación de formato ISO (`YYYY-MM-DD`) para fechas (`CP-07`), bloqueo de reservas en el pasado (`CP-08`), validación cronológica (salida posterior al ingreso) (`CP-09`) y cálculo dinámico real de días de estadía (`CP-10`).

---

##  Estructura del Proyecto

El proyecto sigue el estándar de la comunidad PHP con auto-cargado PSR-4:

Este es el contenido actualizado para tu archivo de la raíz del proyecto. Documenta la integración completa de la Semana 12 (Hotel) y la Semana 15 (Aserciones en PHPUnit):  Markdown# Proyecto de Calidad y Pruebas Unitarias - SEMANA 12 & 15

Este repositorio contiene la suite de pruebas automatizadas en PHP utilizando la biblioteca **PHPUnit**, enfocándose tanto en la lógica de negocio de un Sistema de Reservas de Hotel como en la implementación de aserciones de objetos avanzadas con PSR-4.

## Estructura de Directorios Actualizada

El proyecto sigue el estándar de la comunidad PHP con auto-cargado PSR-4:

```text
semana12/
├── composer.json          # Dependencias y configuración de auto-carga
├── phpunit.xml            # Configuración global de la suite de pruebas
├── README.md              # Documentación principal del proyecto (Actualizado)
├── reporte_test.md        # Informe detallado de QA para gerencia
├── src/                   # Código de producción (Lógica de negocio)
│   ├── Cliente.php
│   ├── Habitacion.php
│   ├── Reserva.php
│   └── Usuario.php        # INTEGRADO S15: Clase de negocio Usuario
└── tests/                 # Suite de pruebas unitarias automatizadas
    ├── ClienteTest.php
    ├── HabitacionTest.php
    ├── ReservaTest.php
    └── UsuarioTest.php    # INTEGRADO S15: Set de 23 pruebas de aserciones avanzadas
Requisitos PreviosAsegúrate de contar con las siguientes herramientas instaladas en tu entorno local:PHP 8.4 o superior.Composer (Gestor de dependencias de PHP).Instalación y ConfiguraciónClonar el repositorio u organizar los archivos en tu directorio local:Bashcd "C:\Users\Hp\Documents\SEMANA 12 PUS"
Instalar las dependencias de desarrollo (PHPUnit):Bashcomposer install
Regenerar y optimizar la auto-carga para mapear las nuevas clases introducidas:Bashcomposer dump-autoload
Ejecución de las Pruebas UnitariasPara correr el motor de pruebas unitarias de manera global y comprobar los resultados de la suite completa, utiliza el siguiente comando:Bashvendor/bin/phpunit --testdox
Resultado Esperado en Consola (35 Tests, 48 Aserciones)PlaintextPHPUnit 11.5.55 by Sebastian Bergmann and contributors.

Runtime:       PHP 8.4.22
Configuration: C:\Users\Hp\Documents\SEMANA 12 PUS\phpunit.xml

Cliente (Tests\Cliente)
 ✔ Nombre vacio
 ✔ Email invalido

Habitacion (Tests\Habitacion)
 ✔ Numero cero
 ✔ Numero negativo
 ✔ Precio cero
 ✔ Precio negativo
 ✔ Reservar habitacion disponible
 ✔ Reservar habitacion no disponible

Reserva (Tests\Reserva)
 ✔ Fecha ingreso invalida
 ✔ Fecha ingreso pasado
 ✔ Fecha salida anterior
 ✔ Calcular total

Usuario (Tests\Usuario)
 ✔ Get nombre
 ✔ Get email
 ✔ Get edad
 ✔ Es mayor de edad con edad valida
 ✔ Es mayor de edad con edad invalida
 ✔ Es mayor de edad con edad cero
 ✔ Usuario valido
 ✔ Usuario invalido
 ✔ Usuario es instancia
 ✔ Usuario no es instancia de otra clase
 ✔ Get nombre con assert same
 ✔ Get edad con assert same
 ✔ Assert same con tipos diferentes
 ✔ Usuario no es null
 ✔ Comparar objetos iguales
 ✔ Comparar objetos diferentes
 ✔ Comparar mismo objeto
 ✔ Comparar objetos diferentes con assert same
 ✔ Array contiene elemento
 ✔ Array tiene tres elementos
 ✔ Array esta vacio
 ✔ Array no esta vacio
 ✔ Get nombre con mensaje

OK, but there were issues!
Tests: 35, Assertions: 48, PHPUnit Deprecations: 1.
