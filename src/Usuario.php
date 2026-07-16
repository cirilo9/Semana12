<?php

namespace App;

class Usuario
{
    private string $nombre;
    private string $email;
    private int $edad;

    public function __construct(string $nombre, string $email, int $edad)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->edad = $edad;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getEdad(): int
    {
        return $this->edad;
    }

    public function esMayorDeEdad(): bool
    {
        return $this->edad >= 18;
    }

    public function esValido(): bool
    {
        return !empty($this->nombre) && !empty($this->email) && $this->edad > 0;
    }
}
