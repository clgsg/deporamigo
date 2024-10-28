<?php

declare(strict_types=1);

namespace Common;
use ErrorException;
use Throwable;

class ErrorHandler
{
	public static function handleError(
		int $errno,
		string $errstr,
		string $errfile,
		int $errline
	): bool
	{
		throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
	}

	public static function handleException(Throwable $exception):void
	{
		if(http_response_code(404)) {
			$template = "404.php";
		} else {
			http_response_code(500);
			$template = "error.php";
		}
	
		# To log errors in default file
		ini_set("log_errors", "1");
		# Set to '0' To avoid showing information about our app if there's an error
		ini_set("display_errors", "1");
		
		# To show our custom view with an error message
		require "views/common/$template";
	
		throw $exception;
	}
}
;


