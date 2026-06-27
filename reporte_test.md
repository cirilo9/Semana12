# REPORT DE PRUEBAS UNITARIAS: SISTEMA DE RESERVAS "HOTEL PARAÍSO"

## I. INFORMACIÓN GENERAL
* **Institución:** Instituto de Educación Superior Tecnológico Público "Santiago Antúnez de Mayolo" 
* **Programa de Estudio:** Diseño y Programación Web 
* **Unidad Didáctica:** Pruebas Unitarias de Software 
* **Semana de Práctica:** 12 
* **Docente:** Ing. Erick Donniex Moscoso Bravo
* **Estudiante:** Hinostroza Tello Cirilo 
* **Enlace del Repositorio:** [Coloca aquí la URL de tu GitHub] 

---

## II. PROPÓSITO DEL REPORTE
Este documento detalla el proceso de aseguramiento de la calidad (QA) aplicado al Sistema de Reservas desarrollado por el estudiante cirilo. El objetivo principal fue auditar el código fuente original, identificar vulnerabilidades funcionales y de lógica, corregir los errores e implementar una suite de pruebas unitarias automatizadas con PHPUnit para garantizar la estabilidad del software bajo casos límite y condiciones extremas.

---

## III. REGISTRO DE EVIDENCIAS Y ANÁLISIS DE ERRORES CORREGIDOS
A continuación, se detallan los 10 puntos críticos identificados por el Tech Lead que ponían en riesgo la integridad del sistema, junto con la descripción de la solución aplicada en esta fase de control de calidad:

| ID        | Clase        | Error Identificado                           | Descripción del Error / Acción Correctiva |

| **CP-01** | Cliente | El código NO valida que el nombre esté vacío | El constructor permitía crear un cliente sin nombre. Se añadió una excepción `InvalidArgumentException` cuando `$nombre` está vacío. |
| **CP-02** | Cliente | El código NO valida el formato del email | Se permitía cualquier cadena en `$email`. Se implementó la función nativa `filter_var($email, FILTER_VALIDATE_EMAIL)`. |
| **CP-03** | Habitacion | El código NO valida que el número sea positivo | Se permitían números de habitación menores o iguales a cero. Se restringió el constructor a valores estrictamente mayores a cero. |
| **CP-04** | Habitacion | El código NO valida que el precio sea positivo | Se permitían precios de $0.00 o negativos. Se añadió una regla de validación para exigir precios mayores a cero. |
| **CP-05** | Habitacion | El código NO verifica disponibilidad antes de reservar | El método `reservar()` cambiaba el estado a falso a ciegas. Ahora valida el estado actual de la propiedad `$disponible`. |
| **CP-06** | Habitacion | El código NO lanza excepción en doble reserva | Si la habitación ya estaba ocupada (`$disponible === false`), no advertía al sistema. Se implementó una `Exception` protectora. |
| **CP-07** | Reserva | El código NO valida el formato de la fecha de ingreso | Se aceptaban formatos libres. Se forzó el uso estricto del estándar `YYYY-MM-DD` mediante `DateTime::createFromFormat`. |
| **CP-08** | Reserva | El código NO valida fechas de ingreso en el pasado | El sistema aceptaba registros retroactivos. Se programó una comparación obligatoria contra la fecha actual (`new DateTime('today')`). |
| **CP-09** | Reserva | El código NO valida que la salida sea posterior al ingreso | Se permitían reservas con fecha de salida previa al ingreso. Se añadió un control lógico cronológico comparativo. |
| **CP-10** | Reserva | El código NO calcula correctamente los días de estadía | El método `calcularTotal()` tenía un valor fijo de 1 día. Se corrigió usando de forma dinámica el intervalo `$ingreso->diff($salida)->days`. |

---

## IV. RESULTADOS DE LA EJECUCIÓN (EVIDENCIA `--testdox`)
Se ejecutó la suite de pruebas unitarias automatizadas utilizando la opción `--testdox` de PHPUnit, la cual traduce los resultados técnicos a un lenguaje natural legible para la gerencia y el equipo de desarrollo.

A continuación, se transcribe el resultado exitoso obtenido desde la consola del sistema:

```text
PHPUnit 13.2.1 by Sebastian Bergmann and contributors. 

Runtime:       PHP 8.4.22 
Configuration: D:\Proyectos_Software\pruebas_unitarias_DPW\semana12\phpunit.xml 

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
