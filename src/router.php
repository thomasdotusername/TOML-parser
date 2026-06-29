<?php

namespace ThomasHurst\TOML;

class Router
{
	//public const REQUEST_URI = $_SERVER['REQUEST_URI'];
	//public const REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];
	//public const QUERY_STRING = $_SERVER['QUERY_STRING'];

	public static function parse_line($line)
	{
		var_dump($line);
	}

	public static function ast_from_file(string $filename)
	{
		$file = fopen($filename, 'r');
		$size = filesize($filename);
		$lines = [];

		while (! feof($file)) {
			self::parse_line(fgets($file, $size));
			array_push($lines, fgets($file, $size));
		}

		fclose($file);

		return $lines;
	}

	public static function array_from_ast($ast): array
	{
		return $ast;
	}

	public static function routes_from_toml(string $filename): array
	{
		return self::array_from_ast(self::ast_from_file($filename));
	}
}
/*
if (isset($_SERVER['REQUEST_URI'])) {
	define('REQUEST_URI', (string) $_SERVER['REQUEST_URI']);
} else {
	define('REQUEST_URI', null);
}

if (isset($_SERVER['REQUEST_METHOD'])) {
	define('REQUEST_METHOD', (string) $_SERVER['REQUEST_METHOD']);
} else {
	define('REQUEST_METHOD', null);
}

if (isset($_SERVER['QUERY_STRING'])) {
	define('QUERY', (string) $_SERVER['QUERY_STRING']);
} else {
	define('QUERY_STRING', null);
}

function parse_line() {
}

function ast_from_file($filename) {
	$file = fopen($filename, 'r');
	$size = filesize($filename);
	$lines = [];

	while (! feof($file)) {
		parse_line(fgets($file, $size));
		array_push($lines, fgets($file, $size));
	}

	fclose($file);

	return $lines;
}

function array_from_ast($ast) {
	return $ast;
}

function routes_from_array() {
	return array_from_ast(ast_from_file('routes.toml'));
}

define('ROUTES', routes_from_array());
*/
