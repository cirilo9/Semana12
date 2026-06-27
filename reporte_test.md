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

ID	Clase	Error Identificado	Descripción del Error	Acción Correctiva
CP-01	Cliente	No valida que el nombre esté vacío	El constructor permitía crear un cliente sin nombre.	Se añadió una excepción InvalidArgumentException cuando $nombre está vacío.
CP-02	Cliente	No valida el formato del email	Se permitía cualquier cadena en el campo $email.	Se implementó filter_var($email, FILTER_VALIDATE_EMAIL) para validar el formato del correo.
CP-03	Habitación	No valida que el número sea positivo	Se permitían números de habitación menores o iguales a cero.	Se restringió el constructor para aceptar únicamente valores mayores a cero.
CP-04	Habitación	No valida que el precio sea positivo	Se permitían precios de 0.00 o negativos.	Se agregó una validación que exige precios estrictamente mayores a cero.
CP-05	Habitación	No verifica disponibilidad antes de reservar	El método reservar() cambiaba el estado de la habitación sin verificar si ya estaba ocupada.	Se añadió una validación del estado de la propiedad $disponible antes de realizar la reserva.
CP-06	Habitación	No lanza excepción en doble reserva	Si la habitación ya estaba ocupada ($disponible === false), el sistema no notificaba el error.	Se implementó una Exception para impedir reservas duplicadas.
CP-07	Reserva	No valida el formato de la fecha de ingreso	Se aceptaban fechas con cualquier formato.	Se implementó DateTime::createFromFormat('Y-m-d', $fecha) para exigir el formato YYYY-MM-DD.
CP-08	Reserva	No valida fechas de ingreso en el pasado	El sistema permitía registrar reservas con fechas anteriores a la actual.	Se comparó la fecha de ingreso con new DateTime('today') para impedir fechas pasadas.
CP-09	Reserva	No valida que la salida sea posterior al ingreso	Se permitían reservas cuya fecha de salida era igual o anterior a la de ingreso.	Se agregó una validación cronológica para garantizar que la salida sea posterior al ingreso.
CP-10	Reserva	No calcula correctamente los días de estadía	El método calcularTotal() asumía siempre una estadía de un día.	Se corrigió utilizando el cálculo dinámico del intervalo mediante $ingreso->diff($salida)->days.

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
