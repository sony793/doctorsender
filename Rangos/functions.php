<?php
/**
 * Agrupa números consecutivos
 * @param <array> $numbers Un array de números
 * @return <array> Devuelve un array con los números consecutivos agrupados
 */
function agrupar($numbers)
{
	//Declaramos la variable en la que vamos a agrupar la serie numerica.
	$grouped = array();

	//Ordenamos el array de entrada de manera ascendente
	sort($numbers, SORT_NUMERIC);

	//En la variable $firstNum guardaremos el primer numero del agrupamiento
	$firstNum = $numbers[0];
	//En la variable $lastNum guardaremos el último numero del agrupamiento
	$lastNum = $numbers[0];

	for ($i=1; $i < sizeof($numbers); $i++) { 
		//Si el numero actual - el número anterior es mayor que 1 significa que no son consecutivos
		if($numbers[$i]-$lastNum > 1){ 
			//Si $firstNum y $lastNum no coinciden significa que existen mas de 1 número consecutivo
			if($firstNum !== $lastNum)
				$grouped[] = $firstNum."-".$lastNum;
			else
				$grouped[] = $lastNum;

			//Guardamos el numero actual como primer número de la siguiente serie consecutiva
			$firstNum = $numbers[$i]; 
		}

		//Guardamos el numero actual como último número de la siguiente serie consecutiva
		$lastNum = $numbers[$i];
	}

	//Añadimos la última serie consecutiva
	if($firstNum !== $lastNum)
		$grouped[] = $firstNum."-".$lastNum;
	else
		$grouped[] = $lastNum;

	return $grouped;
}

/**
 * Concatena un array separados por comas
 * @param <array> $array
 * @return <string> Devuelve $array en una cadena separada por comas
 */
function concatenar($array)
{
	$result = "";

	foreach($array as $temp){
		if($result === "")
			$result .= $temp;
		else
			$result .= ", " . $temp;
	}

	return $result;
}
?>