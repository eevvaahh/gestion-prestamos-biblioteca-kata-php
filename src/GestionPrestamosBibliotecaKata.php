<?php

namespace evahe\GestionPrestamosBiblioteca;

class GestionPrestamosBibliotecaKata
{
    private array $listaLibros;
    public function gestionarLibrosEnBiblioteca(String $accionYLibro): string{
        if($accionYLibro == ""){
            return "";
        }
        $accionYLibro = strtolower($accionYLibro);
        $accionYLibroSeparados = explode(" ", $accionYLibro);
        $accion = $accionYLibroSeparados[0];
        if($accion == "prestar"){
            if(isset($accionYLibroSeparados[1])){
                $libro = $accionYLibroSeparados[1];
                if(empty($this->listaLibros[$libro])){
                    $this->listaLibros[$libro] = 0;
                }
                if (!isset($accionYLibroSeparados[2])) {
                    $cantidadTotalLibrosEnBiblioteca = $this->listaLibros[$libro];
                    $cantidadTotalLibrosEnBiblioteca = $cantidadTotalLibrosEnBiblioteca + 1;
                } else {
                    $totalLibrosAInsertar = $accionYLibroSeparados[2];
                    $cantidadTotalLibrosEnBiblioteca = $this->listaLibros[$libro];
                    $cantidadTotalLibrosEnBiblioteca = $cantidadTotalLibrosEnBiblioteca + $totalLibrosAInsertar;
                }
                $this->listaLibros[$libro] = $cantidadTotalLibrosEnBiblioteca;
            }
            else{
                return "Es necesario incluir el libro a prestar";
            }
        }
        else if($accion == "devolver"){
            if(isset($accionYLibroSeparados[1])) {
                $libro = $accionYLibroSeparados[1];
                if(!isset($this->listaLibros[$libro])){
                    return "El libro indicado no esta en prestamo";
                }
                $cantidadTotalLibrosEnBiblioteca = $this->listaLibros[$libro];
                $cantidadTotalLibrosEnBiblioteca = $cantidadTotalLibrosEnBiblioteca - 1;
                $this->listaLibros[$libro] = $cantidadTotalLibrosEnBiblioteca;
            }
            else{
                return "Es necesario incluir el libro a devolver";
            }
        }
        else if($accion == "limpiar"){
            unset($this->listaLibros);
            $this->listaLibros = [];
        }
        else if(($accion != "prestar") && ($accion != "devolver") && ($accion != "limpiar")){
            return "Introduce una opcion valida";
        }

        if(!empty($this->listaLibros)){
            $resultadoBiblioteca = [];
            foreach($this->listaLibros as $librosEnBiblioteca => $cantidadTotalLibrosEnBiblioteca){
                if($cantidadTotalLibrosEnBiblioteca > 0){
                    $resultadoBiblioteca[] = $librosEnBiblioteca . " x" . $cantidadTotalLibrosEnBiblioteca;
                }
            }
            $resultadoBiliotecaEnFormatoString = implode(", ", $resultadoBiblioteca);
            return $resultadoBiliotecaEnFormatoString;
        }
        else{
            return "";
        }
    }

}