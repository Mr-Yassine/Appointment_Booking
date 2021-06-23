<?php

require_once "./model/RdvModel.php";
session_start();


class RdvCont {

	//select
	function index()
	{
		// header('Content-Type: application/json');
		$obj= new RdvModel();
		// $user= array();
		$res = $obj->select()->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($res);
	}

	//insert
	function ajouter(){

		// On récupère les informations envoyées
    	$data = json_decode(file_get_contents("php://input"));

    	$rdv=new RdvModel();

		$value=$rdv->insert($data->date, $data->Horaire, $data->T_Consultation, $data->Reference);

	}



	//edit 
	function edit(){
		
		//On récupère les informations envoyées
		$data = json_decode(file_get_contents("php://input"));

		$rdv=new RdvModel();

		if(!empty($data->Id)){

			$rdv->Id=$data->Id;

			$value=$rdv->edit($data->Id);
			// die(print_r($value));

			if($value){
                // Ici la création a fonctionné
                // On envoie un code 201
                http_response_code(201);
                echo json_encode($value);
			}else{
				// Ici la création n'a pas fonctionné
				// On envoie un code 503
				http_response_code(503);
				echo json_encode(["message" => "edit n'a pas été effectué".$value]);         
			}

		}else{
			//On gère l'erreur
			http_response_code(405);
			echo json_encode(["message" => "La méthode n'est pas autorisée"]);
		}
	}



	//update
	function update()
	{
		// $rdv=new RdvModel();
		// $value=$rdv->edit($Id); 	
		// echo json_encode($value);



		// On récupère les informations envoyées
		$data = json_decode(file_get_contents("php://input"));

		$rdv=new RdvModel();
		// die(print_r($data));
		// die(print_r($data));
		if(!empty($data->Id) && !empty($data->Date) && !empty($data->Horaire) && !empty($data->T_Consultation))
		{
			$rdv->Id = $data->Id;
			$rdv->date=$data->Date;
			$rdv->Horaire=$data->Horaire;
			$rdv->T_cons=$data->T_Consultation;


			$value=$rdv->update($data->Id, $data->Date, $data->Horaire, $data->T_Consultation);

			if($value){
                // Ici la création a fonctionné
                // On envoie un code 201
                http_response_code(201);
                echo json_encode(["message" => "update a été effectué".$value]);

			}else{
				// Ici la création n'a pas fonctionné
				// On envoie un code 503
				http_response_code(503);
				echo json_encode(["message" => "update n'a pas été effectué".$value]);         
			}

		}else{
			// On gère l'erreur
			http_response_code(405);
			echo json_encode(["message" => "La méthode n'est pas autorisée"]);
		}

	}	

	//delete
	function delete()
	{
		// On récupère les informations envoyées
    	$data = json_decode(file_get_contents("php://input"));

    	$rdv=new RdvModel();

		if(!empty($data->Id)){

			$rdv->Id = $data->Id;
			$value=$rdv->delete($rdv->Id);


			if($value){
                // Ici la création a fonctionné
                // On envoie un code 201
                http_response_code(201);
                echo json_encode(["message" => "suppression  a été effectué".$value]);
	        
            }else{
	            // Ici la création n'a pas fonctionné
	            // On envoie un code 503
	            http_response_code(503);
	            echo json_encode(["message" => "suppression n'a pas été effectué".$value]);         
	        }

		}else{
			// On gère l'erreur
		    http_response_code(405);
		    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
		}
	}
}