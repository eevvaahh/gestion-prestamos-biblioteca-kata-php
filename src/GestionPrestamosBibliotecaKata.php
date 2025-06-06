<?php

namespace evahe\GestionPrestamosBiblioteca;

class GestionPrestamosBibliotecaKata
{
    private array $listaLibros;
    public function gestionarLibrosEnBiblioteca(String $accionYLibro): string{
        $accionYLibro = strtolower($accionYLibro);
        $accionYLibroSeparados = explode(" ", $accionYLibro);
        $accion = $accionYLibroSeparados[0];
        $libro = $accionYLibroSeparados[1];
        if($accion == "prestar"){
            if(empty($this->listaLibros[$libro])){
                $this->listaLibros[$libro] = 0;
            }
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
        if($accion == "devolver"){
            if(!isset($this->listaLibros[$libro])){
                return "El libro indicado no esta en prestamo";
            }
            $cantidadTotalLibrosEnBiblioteca = $this->listaLibros[$libro];
            $cantidadTotalLibrosEnBiblioteca = $cantidadTotalLibrosEnBiblioteca - 1;
            $this->listaLibros[$libro] = $cantidadTotalLibrosEnBiblioteca;
            $resultadoLibros = [];
            foreach($this->listaLibros as $librosEnBiblioteca => $cantidadTotalLibrosEnBiblioteca){
                $resultadoLibros[] = $librosEnBiblioteca . " x" . $cantidadTotalLibrosEnBiblioteca;
            }
            $resultadoBiliotecaEnFormatoString = implode(", ", $resultadoLibros);
            return $resultadoBiliotecaEnFormatoString;
        }
        if($accion == "limpiar"){
            return "";
        }

        return "";
    }

}