<?php
$A_options = [
    "concert" => "Concert",
    "manuelle" => "Activites manuelles",
    "videoludique" => "Activites videoludiques",
    "intellectuel" => "Activites intellectuelles (scrabble, bibliothèque)",
    "visite" => "Visite animaux",
    "autre"  => "Autre",
];
$A_statuts = [
    "nouveau" => "Nouveau",
    "en_cours" => "En cours",
    "annule" => "Annulé",
    "termine" => "Terminé",
];
?>
<h2> Modifier une activité</h2>
	
	<form method = "POST" action="./modifier_evenement" class="row g-3">
        <input type="hidden" name ="id_evenement" value= <?php echo "{$A_evenement[0]['id_evenement']}"?> />
		<fieldset>  
			<legend>Informations de base de l'évènement:</legend>  
			<div class="col-md-6">
				<label class="form-label" for="nom_organisateur">Evenement proposé par:</label><br>  
				<input class="form-control" type="text" id="nom_organisateur" name="nom_organisateur" <?php echo "value= {$A_evenement[0]['nom_organisateur']}"?>><br>
			</div>
			<div class="col-md-6">
				<label class="form-label" for="date_activite">Date évènement</label><br>  
				<input
					type="date"
					id="date_activite"
					name="date_activite"
					value="<?php echo $A_evenement[0]['date_evenement']?>"
					min="2021-01-01"
					max="2035-12-31" 
					class="form-control"
				/>
			</div>
			<div class="col-md-6">
				<label class="form-label" for="type_activite"> Type évènement </label><br>
				<select name="type_activite" class="form-select">
                	<?php foreach ($A_options as $S_cle => $S_valeur){
                    	$S_selected = $S_cle === $A_evenement[0]['type_evenement'] ? "selected = selected" : "";
				    	echo "<option value={$S_cle} {$S_selected} > {$S_valeur} </option>";
                	}?>
				</select>
			</div>
			<div class="col-md-6">
				<?php foreach($A_statuts as $S_cle => $S_valeur) {
					$S_checked = $S_cle === $A_evenement[0]['statut_evenement'] ? "checked" : "";
					echo "<input type='radio' name='statut' value='{$S_cle}' {$S_checked}/> {$S_valeur}";
				}
				?>
			</div>

		</fieldset>
		<fieldset>
			<legend> Organisme de l'évènement </legend>
			<div class="col-md-6">
				<label class="form-label" for="nom_organisme"/> Nom de l'organisme </label><br>
				<input class="form-control" type="text" name="nom_organisme" value = <?php echo $A_evenement[0]['organisme']; ?> /><br>
			</div>
			<div class="col-md-6">
				<label class="form-label" for="telephone"/> Numéro de téléphone </label><br>
				<input class="form-control" type="text" name="telephone_organisme" value = <?php echo $A_evenement[0]['telephone']; ?> /><br>
			</div>
			<div class="col-md-6">
				<label class="form-label" for="referent"/> Nom référent </label><br>
				<input class="form-control" type="text" name="nom_referent" value = <?php echo $A_evenement[0]['nom_referent']; ?> /><br>
			</div>
		</fieldset>
		<div class="col-md-6">
			<label class="form-label" for="obervations"> Observations </label><br>
			<textarea class="form-control" name="observations"> <?php echo $A_evenement[0]['observations']; ?> </textarea><br>
		
			<button type="submit" value="soumettre" class="btn btn-primary"> Envoyer </button> 
		</div>
			
	</form>


	