<?php
namespace App;

use DateTime;
use InvalidArgumentException;

class Reserva {
    private Cliente $cliente;
    private Habitacion $habitacion;
    private string $fechaIngreso;
    private string $fechaSalida;

    public function __construct(Cliente $cliente, Habitacion $habitacion, string $fechaIngreso, string $fechaSalida) {
        // CP-07: Validar formato exacto YYYY-MM-DD
        $dIngreso = DateTime::createFromFormat('Y-m-d', $fechaIngreso);
        if (!$dIngreso || $dIngreso->format('Y-m-d') !== $fechaIngreso) {
            throw new InvalidArgumentException("El formato de la fecha de ingreso es inválido.");
        }
        
        $dSalida = DateTime::createFromFormat('Y-m-d', $fechaSalida);
        if (!$dSalida || $dSalida->format('Y-m-d') !== $fechaSalida) {
            throw new InvalidArgumentException("El formato de la fecha de salida es inválido.");
        }

        // CP-08: Validar que no sea una fecha en el pasado
        $hoy = new DateTime('today');
        if ($dIngreso < $hoy) {
            throw new InvalidArgumentException("La fecha de ingreso no puede ser en el pasado.");
        }

        // CP-09: Validar que la salida sea posterior al ingreso
        if ($dSalida <= $dIngreso) {
            throw new InvalidArgumentException("La fecha de salida debe ser posterior al ingreso.");
        }

        $this->cliente = $cliente;
        $this->habitacion = $habitacion;
        $this->fechaIngreso = $fechaIngreso;
        $this->fechaSalida = $fechaSalida;
    }

    public function calcularTotal(): float {
        $ingreso = new DateTime($this->fechaIngreso);
        $salida = new DateTime($this->fechaSalida);
        
        // CP-10: Calcular la diferencia real en días
        $dias = $ingreso->diff($salida)->days;
        
        return $dias * $this->habitacion->getPrecio();
    }
}
