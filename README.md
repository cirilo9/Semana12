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

```text
semana12/
├── composer.json          # Dependencias y configuración de auto-carga
├── phpunit.xml            # Configuración global de la suite de pruebas
├── README.md              # Documentación principal del proyecto
├── reporte_test.md        # Informe detallado de QA para gerencia
├── src/                   # Código de producción (Lógica de negocio)
│   ├── Cliente.php
│   ├── Habitacion.php
│   └── Reserva.php
└── tests/                 # Suite de pruebas unitarias automatizadas
    ├── ClienteTest.php
    ├── HabitacionTest.php
    └── ReservaTest.php

Requisitos Previos
Asegúrate de contar con las siguientes herramientas instaladas en tu entorno local:

PHP 8.4 o superior.

Composer (Gestor de dependencias de PHP).

 Instalación y Configuración
Clonar el repositorio u organizar los archivos en tu directorio local:

Bash
cd "C:\Users\Hp\Documents\SEMANA 12 PUS"
Instalar las dependencias de desarrollo (PHPUnit):

Bash
composer install
Generar/Actualizar el optimizador de carga automática (opcional si hay cambios):

Bash
composer dump-autoload
 Ejecución de las Pruebas Unitarias
Para correr las pruebas unitarias y verificar la calidad del código implementado, ejecuta el motor de PHPUnit en tu terminal.

Comando estándar:
Bash
vendor/bin/phpunit
Comando con Reporte Detallado (--testdox):
Este comando traduce las pruebas a un formato estructurado en lenguaje natural:

Bash
vendor/bin/phpunit --testdox
Resultado Esperado en Consola:
Plaintext
PHPUnit 11.5.55 by Sebastian Bergmann and contributors.

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

OK (12 tests, 22 assertions)
