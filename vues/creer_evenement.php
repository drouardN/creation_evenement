<?php ?>
<h2> Créer un événement</h2>
	
	<form method = "POST" class="row g-3" action="./ajout_evenement">
		<fieldset>  
			<legend>Informations de base de l'évènement:</legend>  
			 <div class="col-md-6">
				<label  class="form-label" for="nom_organisateur">Evenement proposé par:</label><br>  
				<input type="text" id="nom_organisateur" name="nom_organisateur" class="form-control"><br>
			</div>
			<div class="col-md-6">	
				<label  class="form-label" for="date_activite">Date évènement</label><br>  
				<input
					type="date"
					id="start"
					name="date_activite"
					value="2018-07-22"
					min="2021-01-01"
					max="2035-12-31" 
					class="form-control"
				/>
			</div>
			<div class="col-md-6">
				<label  class="form-label" for="type_activite"> Type évènement </label><br>
				<select name="type_activite" class="form-select">
					<option value="concert"> Concert </option>
					<option value="manuelle"> Activites manuelles </option>
					<option value="videoludique"> Activites videoludiques </option>
					<option value="intellectuel"> Activites intellectuelles (scrabble, bibliothèque) </option>
					<option value="visite"> Visite animaux </option>
					<option value="autre"> Autre </option> 
				</select>
			</div>
			<div class="form-check col-md-6">
				<input type="radio" name="statut" value="nouveau" checked/> Nouveau
				<input type="radio" name="statut" value="en_cours"/> En cours d'organisation
				<input type="radio" name="statut" value="termine"/> Terminé
				<input type="radio" name="statut" value="annule"/> Annulé
			</div>
		</fieldset>
		<fieldset>
			<legend> Organisme de l'évènement </legend>
			<div class="col-md-6">
				<label  class="form-label" for="nom_organisme"/> Nom de l'organisme </label><br>
				<input class="form-control" type="text" name="nom_organisme"><br>
			</div>
			<div class="col-md-6">
				<label  class="form-label" for="telephone"/> Numéro de téléphone </label><br>
				<input class="form-control" type="text" name="telephone_organisme"/><br>
			</div>
			<div class="col-md-6">
				<label  class="form-label" for="referent"/> Nom référent </label><br>
				<input class="form-control" type="text" name="nom_referent"/><br>
			</div>
			
		</fieldset>
		<div class="col-md-6">
			<label  class="form-label" for="obervations"> Observations </label><br>
			<textarea class="form-control" name="observations"> </textarea><br>
		
			<button type="submit" value="soumettre" class="btn btn-primary"> Envoyer </button> 
		</div>	
	</form>


	