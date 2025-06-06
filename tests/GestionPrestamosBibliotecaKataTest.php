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
    /**
     * @test
     */
    public function testPrestarUnNuevoLibro(): void{
        $insertarUnNuevoLibro = $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("prestar dune");
        $insertarUnNuevoLibroResultado = "dune x1";
        $this->assertEquals($insertarUnNuevoLibro,$insertarUnNuevoLibroResultado);
    }
    /**
     * @test
     */
    public function testPrestarDosNuevoLibro(): void{
        $insertarDosNuevoLibro = $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("prestar dune 2");
        $insertarDosNuevoLibroResultado = "dune x2";
        $this->assertEquals($insertarDosNuevoLibro,$insertarDosNuevoLibroResultado);
    }
    /**
     * @test
     */
    public function testPrestarUnNuevoLibroDeDosTipos(): void{
        $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("prestar dune");
        $insertarUnNuevoLibroDeDosTipos = $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("prestar fundacion");
        $insertarUnNuevoLibroDeDosTiposResultado = "dune x1, fundacion x1";
        $this->assertEquals($insertarUnNuevoLibroDeDosTipos,$insertarUnNuevoLibroDeDosTiposResultado);
    }
}
