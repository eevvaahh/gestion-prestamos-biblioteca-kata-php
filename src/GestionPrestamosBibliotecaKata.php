<?php

namespace evahe\GestionPrestamosBiblioteca;

class GestionPrestamosBibliotecaKata
{
    public function gestionarLibrosEnBiblioteca(String $accionYLibro): string{
        $accionYLibro = strtolower($accionYLibro);
        $accionYLibroSeparados = explode("-", $accionYLibro);
        $accion = $accionYLibroSeparados[0];
        $libro = $accionYLibroSeparados[1];
        if($accion == "prestar"){
            if(!isset($accionYLibroSeparados[2])){
                return "dune x1";
            }
        }
        return "";
    }

}