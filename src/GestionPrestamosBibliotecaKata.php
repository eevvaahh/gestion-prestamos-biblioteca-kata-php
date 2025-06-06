<?php

namespace evahe\GestionPrestamosBiblioteca;

class GestionPrestamosBibliotecaKata
{
    private array $listaLibros;
    public function gestionarLibrosEnBiblioteca(String $accionYLibro): string{
        $accionYLibro = strtolower($accionYLibro);
        $accionYLibroSeparados = explode("-", $accionYLibro);
        $accion = $accionYLibroSeparados[0];
        $libro = $accionYLibroSeparados[1];
        if($accion == "prestar"){
            if(!isset($accionYLibroSeparados[2])){
                $resultadoPrestarLibro = $libro . " x1";
                if(empty($this->listaLibros[$libro])){
                    $this->listaLibros[$libro] = [];
                }
                $this->listaLibros[$libro][] = $resultadoPrestarLibro;
                $imprimirTodosLosLibros = implode(", ", $this->listaLibros[$libro]);
                return $imprimirTodosLosLibros;
            }
        }
        return "";
    }

}