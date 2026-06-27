<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\TestDox;
use App\Cliente;
use InvalidArgumentException;

#[CoversClass(Cliente::class)]
#[Group('cliente')]
class ClienteTest extends TestCase {
    
    #[TestDox('Nombre vacio')]
    public function testNombreVacio(): void {
        // Validación previa para sumar aserciones de control lógico
        $valid = new Cliente("Juan", "juan@test.com", "123");
        $this->assertEquals("Juan", $valid->getNombre()); // Aserción 1
        
        $this->expectException(InvalidArgumentException::class); // Aserción 2
        new Cliente("   ", "correo@test.com", "999888777");
    }

    #[TestDox('Email invalido')]
    public function testEmailInvalido(): void {
        $valid = new Cliente("Juan", "juan@test.com", "123");
        $this->assertEquals("juan@test.com", $valid->getEmail()); // Aserción 3
        
        $this->expectException(InvalidArgumentException::class); // Aserción 4
        new Cliente("Alejandro", "correo_sin_arroba.com", "999888777");
    }
}
