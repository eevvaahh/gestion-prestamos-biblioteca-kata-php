<?php

namespace evahe\GestionPrestamosBiblioteca\Test;

use evahe\GestionPrestamosBiblioteca\GestionPrestamosBibliotecaKata;
use PHPUnit\Framework\TestCase;

class GestionPrestamosBibliotecaKataTest extends TestCase
{
    private GestionPrestamosBibliotecaKata $gestionPrestamosBibliotecaKata;
    protected function setUp(): void
    {
        parent::setUp();
        $this->gestionPrestamosBibliotecaKata = new GestionPrestamosBibliotecaKata();
    }

    /**
     * @test
     */
    public function testListProductsIsEmptyInTheStart(): void
    {
        $nuevoLibroVacio = $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("");
        $this->assertEmpty($nuevoLibroVacio);
    }

}
