<?php

require_once "./model/UsersModel.php";

//login & signin classe
class UsersCont {

	 
	//select
	// function index(){

	// 	// header('Content-Type: application/json');
	// 	$obj= new UsersModel();
	// 	// $user= array();
	// 	$res = $obj->selectAll()->fetchAll(PDO::FETCH_ASSOC);
	// 	echo json_encode($res);
	// }
	

	//insert
	function add(){

		// On récupère les informations envoyées
    	$data = json_decode(file_get_contents("php://input"));

    	$ref=new UsersModel();

		$value=$ref->insert($data->Reference, $data->Nom, $data->Prenom, $data->Email, $data->Tel, $data->Age);

	}

	function selectRef(){

		$data = json_decode(file_get_contents("php://input"));

		$ref=new UsersModel();

		if(!empty($data->Reference)){


			$value=$ref->select($data->Reference);

			if($value)
			{
			// Ici la création a fonctionné
			// On envoie un code 201
			http_response_code(201);
			echo json_encode($value);
			}else
			{
				// Ici la création n'a pas fonctionné
				// On envoie un code 503
				http_response_code(503);
				echo json_encode(["message" => "Reference non effectuée"]);         
			}

		} else {
			// On gère l'erreur
			http_response_code(405);
			echo json_encode(["message" => "La méthode n'est pas autorisée"]);
		}

	}

	//insert
	function ajouter()
	{
		// On récupère les informations envoyées
		$data = json_decode(file_get_contents("php://input"));

		// session_start();
		// $sign=new LoginModel();
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$result = '';
		
        for ($i = 0; $i < 5; $i++)
		$result .= $characters[mt_rand(0, 61)];

		$rdv=new UsersModel();

		if(!empty($data->Reference.$result) && !empty($data->Nom) && !empty($data->Prenom) && !empty($data->Email) && !empty($data->Tel) && !empty($data->Age))
		{
			

			// $value=$rdv->insert($rdv->Reference.$result, $rdv->Nom, $rdv->Prenom,$rdv->Email, $rdv->Tel, $rdv->Age);
			$value=$rdv->insert($data->Reference, $data->Nom, $data->Prenom,$data->Email, $data->Tel, $data->Age);

			if($value){
                // Ici la création a fonctionné
                // On envoie un code 201
                http_response_code(201);
                echo json_encode(["message" => "L'ajout a été effectué".$value]);
				

            
            } else {
                // Ici la création n'a pas fonctionné
                // On envoie un code 503
                http_response_code(503);
                echo json_encode(["message" => "L'ajout n'a pas été effectué".$value]);         
            }
		}else{
			// On gère l'erreur
			http_response_code(405);
			echo json_encode(["message" => "La méthode n'est pas autorisée"]);
		}
	}
}

