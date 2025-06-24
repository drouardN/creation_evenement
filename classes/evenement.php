<?php

	class Evenement {
	
		public function __construct() {
			$this->db = new SQLite3('db_evenement.sqlite');

		}
		
		public function ajouter_evenement($A_donneesFormulaire){
			// $db = new SQLite3('db_evenement.sqlite');
			$S_sql = $this->db->prepare("
				INSERT INTO Evenements(
					nom_organisateur,
					date_evenement,
					type_evenement,
					statut_evenement,
					organisme,
					telephone,
					nom_referent,
					observations
				) VALUES (
					:nom_organisateur,
					:date_evenement,
					:type_evenement,
					:statut_evenement,
					:nom_organisme,
					:telephone_organisme,
					:nom_referent,
					:observations
				)"
			);
			foreach($A_donneesFormulaire as $S_cle => $S_valeur) {
				$S_sql->bindValue(":{$S_cle}", $S_valeur);
			}

			$resultat = $S_sql->execute();
		}
		
		public function recuperer_evenements(){
			$resultat = $this->db->query("SELECT * FROM Evenements");
			$A_evenements = [];
			while ($O_ligne = $resultat->fetchArray()) {
    			$A_evenements[] = $O_ligne;
			}
			return $A_evenements;
		}

		public function recuperer_evenement($I_idEvenement){
			$S_sql = $this->db->prepare(
				"SELECT 
					*
				FROM
					Evenements
				WHERE
					id_evenement = :id_evenement"
			);
			$S_sql->bindValue(":id_evenement", $I_idEvenement);
			$A_resultat = $S_sql->execute();
			$A_evenement = [];
			while ($O_ligne = $A_resultat->fetchArray()) {
    			$A_evenement[] = $O_ligne;
			}
			return $A_evenement;
		}

		public function modifier_evenement($A_donneesFormulaire){
			$S_sql = $this->db->prepare("
				UPDATE
					Evenements
				SET
					nom_organisateur = :nom_organisateur,
					date_evenement = :date_evenement,
					type_evenement = :type_evenement,
					statut_evenement = :statut_evenement,
					organisme = :nom_organisme,
					telephone = :telephone_organisme,
					nom_referent = :nom_referent,
					observations = :observations

				WHERE
					id_evenement = :id_evenement
					"
			);
			foreach($A_donneesFormulaire as $S_cle => $S_valeur) {
				$S_sql->bindValue(":{$S_cle}", $S_valeur);
			}
			return $S_sql->execute();
		}
		
		public function supprimer_evenement($id_evenement){
			$S_sql = $this->db->prepare(
				"DELETE FROM 
					Evenements
				WHERE
					id_evenement = :id_evenement"
			);
			$S_sql->bindValue(":id_evenement", $id_evenement);

			$S_sql->execute(); 

		}
	};
	
	
?>