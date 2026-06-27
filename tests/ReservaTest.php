<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\TestDox;
use App\Cliente;
use App\Habitacion;
use App\Reserva;
use InvalidArgumentException;
use DateTime;

#[CoversClass(Reserva::class)]
#[Group('reserva')]
class ReservaTest extends TestCase {
    private Cliente $cliente;
    private Habitacion $habitacion;

    protected function setUp(): void {
        $this->cliente = new Cliente("Marta Gomez", "marta@example.com", "944555666");
        $this->habitacion = new Habitacion(401, "Premium", 200.00);
    }

    #[TestDox('Fecha ingreso invalida')]
    public function testFechaIngresoInvalida(): void {
        $this->expectException(InvalidArgumentException::class); // Aserción 19
        new Reserva($this->cliente, $this->habitacion, "25-12-2026", "2026-12-30");
    }

    #[TestDox('Fecha ingreso pasado')]
    public function testFechaIngresoPasado(): void {
        $ayer = (new DateTime('yesterday'))->format('Y-m-d');
        $mañana = (new DateTime('tomorrow'))->format('Y-m-d');

        $this->expectException(InvalidArgumentException::class); // Aserción 20
        new Reserva($this->cliente, $this->habitacion, $ayer, $mañana);
    }

    #[TestDox('Fecha salida anterior')]
    public function testFechaSalidaAnterior(): void {
        $hoy = (new DateTime('today'))->format('Y-m-d');
        $ayer = (new DateTime('yesterday'))->format('Y-m-d');

        $this->expectException(InvalidArgumentException::class); // Aserción 21
        new Reserva($this->cliente, $this->habitacion, $hoy, $ayer);
    }

    #[TestDox('Calcular total')]
    public function testCalcularTotal(): void {
        $hoy = (new DateTime('today'))->format('Y-m-d');
        $enCuatroDias = (new DateTime('+4 days'))->format('Y-m-d');

        $reserva = new Reserva($this->cliente, $this->habitacion, $hoy, $enCuatroDias);
        
        $this->assertEquals(800.00, $reserva->calcularTotal()); // Aserción 22
    }
}
    //PREGUNTAS
    //1.¿Qué importancia tiene el rol del QA en el proceso de desarrollo?
    //Garantiza la calidad del software y detecta errores antes de la entrega. 
    //2.¿Cómo cambia tu enfoque al trabajar con un plan de pruebas ya elaborado?
    //Sigo los casos definidos para validar que todo funcione correctamente. 
    //3.¿Qué ventaja tiene documentar las pruebas con @covers y @group?
    //Facilita organizar, identificar y ejecutar pruebas específicas.

