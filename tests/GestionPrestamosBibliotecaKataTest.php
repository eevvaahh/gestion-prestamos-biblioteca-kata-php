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
    public function testInsertarInstruccionVaciaDevuelveStringVacio(): void
    {
        $instruccionVacia = $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("");

        $this->assertEmpty($instruccionVacia);
    }

    /**
     * @test
     */
    public function testPrestarUnNuevoLibro(): void{
        $prestarUnNuevoLibro = $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("prestar dune");

        $this->assertEquals($prestarUnNuevoLibro,"dune x1");
    }

    /**
     * @test
     */
    public function testPrestarElMismoLibroDosVeces(): void{
        $prestarDosVecesMismoLibro = $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("prestar dune 2");

        $this->assertEquals($prestarDosVecesMismoLibro,"dune x2");
    }

    /**
     * @test
     */
    public function testPrestarUnNuevoLibroConDosTitulosDistintos(): void{
        $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("prestar dune");

        $prestarDosTitulosDistintos = $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("prestar fundacion");

        $this->assertEquals($prestarDosTitulosDistintos, "dune x1, fundacion x1");
    }

    /**
     * @test
     */
    public function testDevolverUnLibroBorraSoloUnLibro(): void{
        $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("prestar dune 2");

        $devolverUnLibro = $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("devolver dune");

        $this->assertEquals($devolverUnLibro,"dune x1");
    }

    /**
     * @test
     */
    public function testDevolverUnLibroNoPrestado(): void{
        $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("prestar dune 2");

        $devolverUnLibro = $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("devolver fundacion");

        $this->assertEquals($devolverUnLibro,"El libro indicado no esta en prestamo");
    }

    /**
     * @test
     */
    public function testLimpiarBiblioteca(): void{
        $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("prestar dune 2");
        $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("devolver dune");
        $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("prestar fundacion 4");

        $limpiarBiblioteca = $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("limpiar");

        $this->assertEquals($limpiarBiblioteca,"");
    }

    /**
     * @test
     */
    public function testProbarEjemploDeFlujo(): void{
        $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("prestar dune");
        $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("prestar fundacion 2");
        $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("prestar DUNE 2");
        $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("devolver 1984");

        $probar = $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("devolver Dune");

        $this->assertEquals($probar, "dune x2, fundacion x2");
    }

    /**
     * @test
     */
    public function testPrestarUnLibroDespuesDeLimpiarBiblioteca(): void{
        $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("prestar dune 2");
        $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("devolver dune");
        $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("prestar fundacion 4");
        $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("limpiar");

        $prestarNuevoLibro = $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("prestar dune 2");

        $this->assertEquals($prestarNuevoLibro, "dune x2");
    }

    /**
     * @test
     */
    public function testDevolverTodosLosEjemplaresDeLibroPrestadoYDevolverElLibroYaNoPrestado(): void{
        $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("prestar dune 2");
        $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("devolver dune");
        $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("devolver dune");

        $devolverLibroNoPrestado = $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("devolver dune");

        $this->assertEquals($devolverLibroNoPrestado, "");
    }

    /**
     * @test
     */
    public function testIncluirUnComandoInvalido(): void{
        $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("prestar dune 2");

        $comandoInvalido = $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("crear dune");

        $this->assertEquals($comandoInvalido, "Introduce una opcion valida");
    }

    /**
     * @test
     */
    public function testIncluirUnComandoIncompleto(): void{
        $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("prestar dune 2");

        $comandoIncompleto = $this->gestionPrestamosBibliotecaKata->gestionarLibrosEnBiblioteca("prestar");

        $this->assertEquals($comandoIncompleto, "Es necesario incluir el libro a prestar");
    }
}
