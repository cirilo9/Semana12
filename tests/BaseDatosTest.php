<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\BaseDatos;

/**
 * @group basedatos
 * @covers \App\BaseDatos
 */
class BaseDatosTest extends TestCase
{
    private $baseDatos;

    /**
     * Ejercicio 1: Se ejecuta UNA VEZ antes de TODAS las pruebas de la clase
     */
    public static function setUpBeforeClass(): void
    {
        echo "\n[INFO] Iniciando pruebas de base de datos...\n";
    }

    /**
     * Ejercicio 1: Se ejecuta UNA VEZ después de TODAS las pruebas de la clase
     */
    public static function tearDownAfterClass(): void
    {
        echo "[INFO] Finalizando pruebas de base de datos...\n";
    }

    /**
     * Se ejecuta antes de CADA prueba
     */
    protected function setUp(): void
    {
        $this->baseDatos = new BaseDatos();
    }

    /**
     * Se ejecuta después de CADA prueba
     */
    protected function tearDown(): void
    {
        $this->baseDatos->limpiar();
        $this->baseDatos = null;
    }

    public function testGuardarUsuario()
    {
        $resultado = $this->baseDatos->guardarUsuario('Juan Perez', 'juan@mail.com');
        $this->assertTrue($resultado);
    }

    public function testContarUsuarios()
    {
        $this->baseDatos->guardarUsuario('Ana Gomez', 'ana@mail.com');
        $this->baseDatos->guardarUsuario('Luis Torres', 'luis@mail.com');

        $total = $this->baseDatos->contarUsuarios();
        $this->assertEquals(2, $total);
    }

    /**
     * Ejercicio 2: Usuario con email vacío -> debe fallar (retornar false o lanzar excepción según lógica)
     */
    public function testGuardarUsuarioConEmailVacio()
    {
        // Dependiendo de si BaseDatos.php valida el correo o si la BD falla por constraints.
        // Como la firma de la función en la guía retorna bool, evaluamos si devuelve false.
        $resultado = $this->baseDatos->guardarUsuario('Carlos Ruiz', '');
        $this->assertFalse($resultado, "Debe fallar al guardar un usuario con email vacío");
    }

    /**
     * Ejercicio 2: Usuario con nombre muy largo -> debe manejarlo correctamente
     */
    public function testGuardarUsuarioConNombreMuyLargo()
    {
        $nombreLargo = str_repeat("A", 255); // Genera una cadena de 255 caracteres
        $resultado = $this->baseDatos->guardarUsuario($nombreLargo, 'largo@mail.com');
        $this->assertTrue($resultado, "Debe manejar de forma correcta un nombre de gran longitud");
    }

    /**
     * Ejercicio 2: Insertar 100 usuarios -> verificar conteo
     */
    public function testGuardar100Usuarios()
    {
        for ($i = 1; $i <= 100; $i++) {
            $this->baseDatos->guardarUsuario("Usuario $i", "usuario$i@mail.com");
        }

        $total = $this->baseDatos->contarUsuarios();
        $this->assertEquals(100, $total, "El conteo total en la base de datos debe ser exactamente 100");
    }
