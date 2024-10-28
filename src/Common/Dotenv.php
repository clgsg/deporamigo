<?php

declare(strict_types=1);

namespace Common;

class Dotenv
{
	public function load(string $path) : void 
	{
		# Recuperar valores de .entorno ignorando los retornos de linea
		$lines = file($path, FILE_IGNORE_NEW_LINES);

		foreach ($lines as $line) {
			# Para cada línea, hacer una lista que separe los valores antes y después de un igual en cada línea
			list($name, $value) = explode("=", $line, 2);
			# Introducimos en el parámetro $name de la variable global $_ENV el valor de cada línea
			$_ENV[$name] = $value;

		}
	}
}