<?php
/**
 * El objetivo del programa es agrupar series de números consecutivos según una serie de número de entrada.
 * Hay que aplicar las siguientes reglas:
 * 	• Los números que aparezcan consecutivos deben de agruparse con el primer número y el último separados por un guión.
 * 	• Los números que aparezcan sin ser consecutivos no se deben agrupar.
 * 	• Los rangos de números no agrupados y agrupados deben separarse con una coma.
 *
 * Ejemplos:
 *	• "1 2 3 5 6 8" => "1-3, 5-6, 8"
 *
 * Información útil:
 * 	• La serie de números de entrada estará ordenada de manera ascendente.
 */
require 'functions.php';

//$_REQUEST['numbers'] = "1 2 3 4 5 8 9 10 11 12 15 18 32 33 34 35 36 37 38";

//Comprobamos que se haya introducido el parametro de entrada
if(!isset($_REQUEST['numbers']))
	die("No ha introducido parametro de entrada 'numbers'.");

//Guardamos los numeros de entrada en un array separando por el caracter espacio " "
$numbers = explode(" ", $_REQUEST['numbers']);

//Comprobamos que el numero de entrada no esté vacío
if(empty($numbers))
	die("El número de entrada está vacío.");

//Llamamos a la función que nos agrupa los números consecutivos
$grouped = agrupar($numbers);

//Llamamos a la función que nos concatena los rango de números separados con una coma
$result = concatenar($grouped);

//Imprimimos el resultado final
echo $result;
?>