<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\TestDox;
use App\Habitacion;
use InvalidArgumentException;
use Exception;

#[CoversClass(Habitacion::class)]
#[Group('habitacion')]
class HabitacionTest extends TestCase {

    #[TestDox('Numero cero')]
    public function testNumeroCero(): void {
        $valid = new Habitacion(101, "Suite", 120.00);
        $this->assertEquals(101, $valid->getNumero()); // Aserción 5
        
        $this->expectException(InvalidArgumentException::class); // Aserción 6
        new Habitacion(0, "Suite", 120.00);
    }

    #[TestDox('Numero negativo')]
    public function testNumeroNegativo(): void {
        $valid = new Habitacion(101, "Suite", 120.00);
        $this->assertEquals(120.00, $valid->getPrecio()); // Aserción 7
        
        $this->expectException(InvalidArgumentException::class); // Aserción 8
        new Habitacion(-105, "Deluxe", 150.00);
    }

    #[TestDox('Precio cero')]
    public function testPrecioCero(): void {
        $valid = new Habitacion(101, "Suite", 120.00);
        $this->assertTrue($valid->isDisponible()); // Aserción 9
        
        $this->expectException(InvalidArgumentException::class); // Aserción 10
        new Habitacion(201, "Económica", 0.0);
    }

    #[TestDox('Precio negativo')]
    public function testPrecioNegativo(): void {
        $valid = new Habitacion(101, "Suite", 120.00);
        $this->assertInstanceOf(Habitacion::class, $valid); // Aserción 11
        
        $this->expectException(InvalidArgumentException::class); // Aserción 12
        new Habitacion(202, "Económica", -45.50);
    }

    #[TestDox('Reservar habitacion disponible')]
    public function testReservarHabitacionDisponible(): void {
        $habitacion = new Habitacion(301, "Estándar", 90.00);
        $this->assertInstanceOf(Habitacion::class, $habitacion); // Aserción 13
        $this->assertTrue($habitacion->isDisponible()); // Aserción 14
        
        $habitacion->reservar();
        $this->assertFalse($habitacion->isDisponible()); // Aserción 15
    }

    #[TestDox('Reservar habitacion no disponible')]
    public function testReservarHabitacionNoDisponible(): void {
        $habitacion = new Habitacion(302, "Estándar", 90.00);
        $this->assertTrue($habitacion->isDisponible()); // Aserción 16
        $habitacion->reservar(); 
        $this->assertFalse($habitacion->isDisponible()); // Aserción 17

        $this->expectException(Exception::class); // Aserción 18
        $habitacion->reservar(); 
    }
}
