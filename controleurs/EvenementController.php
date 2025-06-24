<?php
require("./classes/evenement.php");

class EvenementController{

	public function afficher_formulaire_nouvel_evenement() {
		require("./vues/creer_evenement.php");
	}

	public function ajouter_evenement(){

		if (isset($_POST) && !empty($_POST)) {
			
			$B_formulaire_valide = true;

			
			if ($this->verifier_chaine( $_POST["nom_organisateur"])) {
				$B_formulaire_valide = false;
			}
			
			if ($this->verifier_chaine($_POST["nom_referent"])) {
				$B_formulaire_valide = false;
			}

			if(!$this->validateDate($_POST["date_activite"])){	
					$B_formulaire_valide = false;
			}
				
			if ($B_formulaire_valide) {
				$A_donneesFormulaire = [
					'nom_organisateur' => $_POST['nom_organisateur'],
					'date_evenement' => $_POST["date_activite"],
					'type_evenement' =>  $_POST["type_activite"],
					'statut_evenement' => $_POST["statut"],
					'nom_organisme' => $_POST["nom_organisme"],
					'telephone_organisme' =>  $_POST["telephone_organisme"],
					'nom_referent' =>  $_POST["nom_referent"],
					'observations' => $_POST["observations"],
				];
				try {
					$O_evenement = new Evenement();
					$O_evenement->ajouter_evenement($A_donneesFormulaire);
				} catch(Exception $e){
					echo "Exception".$e->getMessage();
				}
				
				header("Location: ./index.php");
				die();
			}
		}
	}

	public function verifier_chaine($S_chaine){
		return preg_match("[0-9]", $S_chaine);
	}
	
	
	public function validateDate($date, $format = 'Y-m-d') { 
		$d = DateTime::createFromFormat($format, $date); 
		return $d && $d->format($format) === $date;
	}

	public function afficher_evenements() {
		$O_evenement = new Evenement();
		$A_evenements = $O_evenement->recuperer_evenements();

		require("./vues/accueil.php");
	}


	public function supprimer_evenement(){
		$I_idEvenement = $_POST['idEvenement'];
		$O_evenement = new Evenement();
		$O_evenement->supprimer_evenement($I_idEvenement);

	}

	public function afficher_formulaire_modification(){
		$I_idEvenement = $_GET['id'];
		
		$O_evenement = new Evenement();
		$A_evenement = $O_evenement->recuperer_evenement($I_idEvenement);

		if (!empty($A_evenement)) {
			require("./vues/modifier_evenement.php");
		}

	}

	public function modifier_evenement() {

		if (isset($_POST) && !empty($_POST)) {
			
			$B_formulaire_valide = true;

			// exemples de validation de champs
			if ($this->verifier_chaine($_POST['nom_organisateur'])) {
				$B_formulaire_valide = false;
			}
			
			if ($this->verifier_chaine($_POST["nom_referent"])) {
				$B_formulaire_valide = false;
			}

			if(!$this->validateDate($_POST["date_activite"])){	
					$B_formulaire_valide = false;
				}
				
			if ($B_formulaire_valide) {
					$A_donneesFormulaire = [
						'id_evenement' => $_POST['id_evenement'],
						'nom_organisateur' => $_POST['nom_organisateur'],
						'date_evenement' => $_POST["date_activite"],
						'type_evenement' =>  $_POST["type_activite"],
						'statut_evenement' => $_POST["statut"],
						'nom_organisme' => $_POST["nom_organisme"],
						'telephone_organisme' =>  $_POST["telephone_organisme"],
						'nom_referent' =>  $_POST["nom_referent"],
						'observations' => $_POST["observations"],
					];
					
					try {
						$O_evenement = new Evenement();
						$O_evenement->modifier_evenement($A_donneesFormulaire);
					} catch(Exception $e){
						echo "Exception".$e->getMessage();
					}
				
				header("Location: ./index.php");
				die();
			}
		}
	}
			
}
?>