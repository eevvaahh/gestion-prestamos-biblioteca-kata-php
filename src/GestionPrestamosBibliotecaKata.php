<?php

namespace evahe\GestionPrestamosBiblioteca;

class GestionPrestamosBibliotecaKata
{
    private array $listaLibros;
    public function gestionarLibrosEnBiblioteca(String $accionYLibro): string{
        var_dump("Hola");
        $accionYLibro = strtolower($accionYLibro);
        $accionYLibroSeparados = explode(" ", $accionYLibro);
        $accion = $accionYLibroSeparados[0];
        var_dump("La accion es: " . $accion);
        $libro = $accionYLibroSeparados[1];
        if(empty($this->listaLibros[$libro])){
            $this->listaLibros[$libro] = 0;
        }
        if($accion == "prestar"){
            if(!isset($accionYLibroSeparados[2])) {
                $cantidadTotalLibrosEnBiblioteca = $this->listaLibros[$libro];
                $cantidadTotalLibrosEnBiblioteca = $cantidadTotalLibrosEnBiblioteca + 1;
            }
            else {
                $totalLibrosAInsertar = $accionYLibroSeparados[2];
                $cantidadTotalLibrosEnBiblioteca = $this->listaLibros[$libro];
                $cantidadTotalLibrosEnBiblioteca = $cantidadTotalLibrosEnBiblioteca + $totalLibrosAInsertar;
            }
            $this->listaLibros[$libro] = $cantidadTotalLibrosEnBiblioteca;
            $resultadoLibros = [];
            foreach($this->listaLibros as $librosEnBiblioteca => $cantidadTotalLibrosEnBiblioteca){
                $resultadoLibros[] = $librosEnBiblioteca . " x" . $cantidadTotalLibrosEnBiblioteca;
            }
            $resultadoBiliotecaEnFormatoString = implode(", ", $resultadoLibros);
            return $resultadoBiliotecaEnFormatoString;
        }
        return "";
    }

}