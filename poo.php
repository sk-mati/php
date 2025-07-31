<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Persona {
    protected $documento;
    protected $nombreCompleto;
    protected $edad;
    protected $nacionalidad;

    public function __construct($documento="", $nombreCompleto="", $edad="", $nacionalidad=""){
        $this->documento = $documento;
        $this->nombreCompleto = $nombreCompleto;
        $this->edad = $edad;
        $this->nacionalidad = $nacionalidad;
    }

    public function __destruct(){
        echo "<br>Destruyendo el objeto " . $this->nombreCompleto . "<br>";
    }

    public function setDocumento($documento) {$this->documento = $documento;}
    public function getDocumento($documento) {return $this->$documento;}

    public function setNombre($nombreCompleto) {$this->nombreCompleto = $nombreCompleto;}
    public function getNombre($nombreCompleto) {return $this->nombreCompleto;}

    public function setEdad($edad) {$this->edad = $edad;}
    public function getEdad($edad) {return $this->edad;}

    public function setNacionalidad($nacionalidad) {$this->nacionalidad = $nacionalidad;}
    public function getNacionalidad($nacionalidad) {return $this->nacionalidad;}


    public function imprimir() {

    } 
    
} 

class Alumno extends Persona {
    private $legajo;
    private $notaPortfolio;
    private $notaPhp;
    private $notaProyecto;
    
    public function __construct()
    {
        $this->notaPortfolio = 0.0;
        $this->notaPhp = 0.0;
        $this->notaProyecto = 0.0;
    }

    public function __destruct() {
        echo "Destruyendo el objeto " . $this->nombreCompleto . "<br>";
    }

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }
    
    public function imprimir(){
        echo "Documento: " . $this->documento . "<br>";
        echo "Nombre: " . $this->nombreCompleto . "<br>";
        echo "Edad: " . $this->edad . "<br>";
        echo "Nacionalidad: " . $this->nacionalidad . "<br>";
        echo "Legajo: " . $this->legajo . "<br>";
        echo "Nota Portfolio: " . $this->notaPortfolio . "<br>";
        echo "Nota PHP: " . $this->notaPhp . "<br>";
        echo "Nota del proyecto: " . $this->notaProyecto . "<br>";
        echo "Promedio: " . number_format($this->calcularPromedio(), 2, ".", ",") . "<br><br>";
    }
    public function calcularPromedio(){
        return ($this->notaPhp + $this->notaPortfolio + $this->notaProyecto)/3;
    }

}

class Docente extends Persona {
    private $especialidad;
    const ESPECIALIDAD_WP = "Wordpress";
    const ESPECIALIDAD_ECO = "Economía aplicada";
    const ESPECIALIDAD_BBDD = "Base de datos";
    
    public function imprimir(){}

    public function imprimirEspecialidadesHabilitadas(){
        echo "Un docente puede tener las siguientes especialidades: <br>";
        echo "Especialidad 1: " . self:: ESPECIALIDAD_WP . "<br>";
        echo "Especialidad 2: " . self:: ESPECIALIDAD_ECO . "<br>"; 
        echo "Especialidad 3: " . self:: ESPECIALIDAD_BBDD;
    }

}

$alumno1 = new Alumno();
$alumno1->documento = "33300012";
$alumno1->nombreCompleto = "Ana Valle";
$alumno1->notaPhp = 9;
$alumno1->notaPortfolio = 8;
$alumno1->notaProyecto = 8;
$alumno1->imprimir();

$alumno2 = new Alumno();
$alumno2->documento = "44400013";
$alumno2->nombreCompleto = "Bernabé";
$alumno2->notaPhp = 10;
$alumno2->notaPortfolio = 7;
$alumno2->notaProyecto = 9;
$alumno2->imprimir();

$docente1 = new Docente();
$docente1->imprimirEspecialidadesHabilitadas();

?>