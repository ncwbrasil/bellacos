<?php require_once("ctracker.php");
require_once("parametros.php");
error_reporting(1);
date_default_timezone_set('America/Sao_Paulo');

//FUNÇÃO JSON PARA O APP
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS, POST');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
class Json
{
	public function encode($vetor)
	{
		echo json_encode($vetor, 128);
	}
}

$JSON = new JSON;

define( 'MYSQL_HOST', 'bellacos.com.br' );
define( 'MYSQL_PORT', '3306' );
define( 'MYSQL_USER', 'bellacos_site' );
define( 'MYSQL_PASSWORD', 'bellacos@2021' );
define( 'MYSQL_DB_NAME', 'bellacos_site' );

// define( 'MYSQL_HOST', '192.168.0.11' );
// //define('MYSQL_HOST', 'bd-mogicomp.sytes.net');
// define('MYSQL_PORT', '3030');
// define('MYSQL_USER', 'root');
// define('MYSQL_PASSWORD', 'm0507c1106');
// define('MYSQL_DB_NAME', 'bellacos');


try {
	$PDO 				= new PDO('mysql:host=' . MYSQL_HOST . ';port=' . MYSQL_PORT . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD);
} catch (PDOException $e) {
	echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
}
$PDO->exec("SET CHARACTER SET utf8");
$PDO->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
