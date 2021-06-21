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

		if(!empty($data->Date) && !empty($data->Horaire) && !empty($data->T_Consultation) && !empty($data->Reference)){

			$rdv->Date=$data->Date;
			$rdv->Horaire=$data->Horaire;
			$rdv->T_cons=$data->T_Consultation;
			$rdv->Reference=$data->Reference;

			$value=$rdv->insert($rdv->Date, $rdv->Horaire, $rdv->T_cons, $rdv->Reference);

			if($value){

                // Ici la création a fonctionné
                // On envoie un code 201
                http_response_code(201);
                echo json_encode(["message" => "L'ajout a été effectué".$value]);
	        
            }else{
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



	//edit 
	function edit(){
		
		// On récupère les informations envoyées
		$data = json_decode(file_get_contents("php://input"));

		$rdv=new RdvModel();

		if(!empty($data->Id)){

			$rdv->Id=$data->Id;

			$value=$rdv->edit($rdv->Id);
			die(print_r($value));

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
			// On gère l'erreur
			http_response_code(405);
			echo json_encode(["message" => "La méthode n'est pas autorisée"]);
		}
	}

	//update
	function update()
	{
		// On récupère les informations envoyées
		$data = json_decode(file_get_contents("php://input"));

		$rdv=new RdvModel();
		// die(print_r($data));
		if(!empty($data->Id) && !empty($data->Date) && !empty($data->Horaire) && !empty($data->T_Consultation) && !empty($data->Reference))
		{
			$rdv->Id = $data->Id;
			$rdv->Date=$data->Date;
			$rdv->Horaire=$data->Horaire;
			$rdv->T_cons=$data->T_Consultation;
			$rdv->Reference=$data->Reference;

			$value=$rdv->update($rdv->Id, $rdv->Date, $rdv->Horaire, $rdv->T_cons, $rdv->Reference);

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
			// print_r($value);
			// die();

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