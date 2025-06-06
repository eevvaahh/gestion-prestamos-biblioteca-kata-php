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
    /**
     * @test
     */
    public function testDevolverUnLibroBorraSoloUnLibro(): void{
        $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("prestar dune 2");
        $devolverUnLibro =$this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("devolver dune");
        $devolverUnLibroResultado = "dune x1";
        $this->assertEquals($devolverUnLibro,$devolverUnLibroResultado);
    }
    /**
     * @test
     */
    public function testDevolverUnLibroNoPrestado(): void{
        $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("prestar dune 2");
        $devolverUnLibro =$this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("devolver fundacion");
        $devolverUnLibroResultado = "El libro indicado no esta en prestamo";
        $this->assertEquals($devolverUnLibro,$devolverUnLibroResultado);
    }
    /**
     * @test
     */
    public function testLimpiarBiblioteca(): void{
        $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("prestar dune 2");
        $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("devolver dune");
        $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("prestar fundacion 4");
        $limpiarBiblioteca = $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("limpiar");
        $limpiarBibliotecaResultado = "";
        $this->assertEquals($limpiarBiblioteca,$limpiarBibliotecaResultado);
    }
}
