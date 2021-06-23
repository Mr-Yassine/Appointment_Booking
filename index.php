<?php


// Headers requis
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
    http_response_code(202);
    exit;
}
$params=explode('/',$_GET['p']);

if (isset($params[0]) & !empty($params[0])) {
    
	$controller=ucfirst($params[0]);
	if (file_exists("controller/".$controller.".php")) {

		require_once 'controller/'.$controller.".php";
		$obj=new $controller();

		if (isset($params[1]) & !empty($params[1])) {

			if (method_exists($obj,$params[1] )) {
				$action=$params[1];
				
				if (isset($params[2]) & !empty($params[2])) {
					$obj->$action($params[2]);
				} else {
					$obj->$action();
				}

			} else {
				echo "this method does not exist";
			}

		} else {
			$action="index";
			$obj->$action();
		}

	} else {
		echo "this page does not exsit";
	}
	
} else {
	require_once "controller/rdvCont.php";
	$obj=new RdvCont();
	$obj->index();
}