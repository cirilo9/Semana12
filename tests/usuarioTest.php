<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Usuario;

/**
 * @group usuario
 * @covers \App\Usuario
 */
class UsuarioTest extends TestCase
{

    //EJERCICIO 1: assertEquals

    public function testGetNombre()
    {
        $usuario = new Usuario('Alberto Perez', 'alberto@mail.com', 25);
        $this->assertEquals('Alberto Perez', $usuario->getNombre());
    }

    public function testGetEmail()
    {
        $usuario = new Usuario('Alberto Perez', 'alberto@mail.com', 25);
        $this->assertEquals('alberto@mail.com', $usuario->getEmail());
    }

    public function testGetEdad()
    {
        $usuario = new Usuario('Alberto Perez', 'alberto@mail.com', 25);
        $this->assertEquals(25, $usuario->getEdad());
    }

    //EJERCICIO 2: assertTrue y assertFalse

    public function testEsMayorDeEdadConEdadValida()
    {
        $usuario = new Usuario('Alberto Perez', 'alberto@mail.com', 25);
        $this->assertTrue($usuario->esMayorDeEdad());
    }

    public function testEsMayorDeEdadConEdadInvalida()
    {
        $usuario = new Usuario('Ana Gomez', 'ana@mail.com', 16);
        $this->assertFalse($usuario->esMayorDeEdad());
    }

    public function testEsMayorDeEdadConEdadCero()
    {
    $usuario = new Usuario('Luis Torres', 'luis@mail.com', 0);
    $this->assertFalse($usuario->esMayorDeEdad());
    }
    public function testUsuarioValido()
{
    $usuario = new Usuario('Juan Perez', 'juan@mail.com', 25);
    $this->assertTrue($usuario->esValido());
}

public function testUsuarioInvalido()
{
    $usuario = new Usuario('', '', 0);
    $this->assertFalse($usuario->esValido());
}

//EJERCICIO 3: assertInstanceOf

public function testUsuarioEsInstancia()
{
    $usuario = new Usuario('Juan Perez', 'juan@mail.com', 25);
    $this->assertInstanceOf(Usuario::class, $usuario);
}

public function testUsuarioNoEsInstanciaDeOtraClase()
{
    $usuario = new Usuario('Juan Perez', 'juan@mail.com', 25);
    $this->assertNotInstanceOf(\Exception::class, $usuario);
}

//EJERCICIO 4: assertSame

public function testGetNombreConAssertSame()
{
    $usuario = new Usuario('Juan Perez', 'juan@mail.com', 25);
    $this->assertSame('Juan Perez', $usuario->getNombre());
}

public function testGetEdadConAssertSame()
{
    $usuario = new Usuario('Juan Perez', 'juan@mail.com', 25);
    $this->assertSame(25, $usuario->getEdad());
}

public function testAssertSameConTiposDiferentes()
{
    $usuario = new Usuario('Juan Perez', 'juan@mail.com', 25);

    // assertEquals: solo verifica valor
    $this->assertEquals(25, $usuario->getEdad());

    // assertSame: verifica valor y tipo
    $this->assertSame(25, $usuario->getEdad());
    $this->assertNotSame("25", $usuario->getEdad());
}

//EJERCICIO 5: assertNull y assertNotNull

public function testUsuarioNoEsNull()
{
    $usuario = new Usuario('Juan Perez', 'juan@mail.com', 25);
    $this->assertNotNull($usuario);
}

//EJERCICIO 6: Comparar objetos

public function testCompararObjetosIguales()
{
    $usuario1 = new Usuario('Juan Perez', 'juan@mail.com', 25);
    $usuario2 = new Usuario('Juan Perez', 'juan@mail.com', 25);

    // Mismos valores → assertEquals pasa
    $this->assertEquals($usuario1, $usuario2);
}

public function testCompararObjetosDiferentes()
{
    $usuario1 = new Usuario('Juan Perez', 'juan@mail.com', 25);
    $usuario2 = new Usuario('Ana Gomez', 'ana@mail.com', 30);

    // Diferentes valores → assertNotEquals pasa
    $this->assertNotEquals($usuario1, $usuario2);
}

public function testCompararMismoObjeto()
{
    $usuario1 = new Usuario('Juan Perez', 'juan@mail.com', 25);
    $usuario2 = $usuario1;

    // Misma referencia → assertSame pasa
    $this->assertSame($usuario1, $usuario2);
}

public function testCompararObjetosDiferentesConAssertSame()
{
    $usuario1 = new Usuario('Juan Perez', 'juan@mail.com', 25);
    $usuario2 = new Usuario('Juan Perez', 'juan@mail.com', 25);

    // Diferentes objetos, mismos valores → assertNotSame pasa
    $this->assertNotSame($usuario1, $usuario2);
}

    //Ejercicio 1: assertContains y assertNotContains

 public function testArrayContieneElemento()
{
    $numeros = [1, 2, 3, 4, 5];
    $this->assertContains(3, $numeros); // Verifica que el 3 está en el array 
    $this->assertNotContains(6, $numeros); // Verifica que el 6 NO está en el array 
}

   //Ejercicio 2: assertCount

public function testArrayTieneTresElementos()
{
    $numeros = [1, 2, 3];
    $this->assertCount(3, $numeros); // Verifica el número de elementos 
}

  //Ejercicio 3: assertEmpty y assertNotEmpty

  public function testArrayEstaVacio()
{
    $vacio = [];
    $this->assertEmpty($vacio); // Verifica si el array está vacío 
}

public function testArrayNoEstaVacio()
{
    $numeros = [1, 2, 3];
    $this->assertNotEmpty($numeros); // Verifica que el array NO está vacío 
}

    //Ejercicio 4: Mensajes personalizados

public function testGetNombreConMensaje()
{
    $usuario = new Usuario('Alberto Perez', 'alberto@mail.com', 25);
    // Agrega un mensaje personalizado para que el error sea más claro si falla 
    $this->assertEquals('Alberto Perez', $usuario->getNombre(), 'El nombre no coincide con el esperado');
}
//cirilo9

}
