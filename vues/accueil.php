<?php ?>

<h2> Liste des activites</h2>
<div>
    <a href="./ajout_evenement" > Ajouter un nouvel événement </a>
</div>

<div>
    <table class="table">
    <thead class="thead-dark">
        <tr>
        <th scope="col">Nom Organisateur</th>
        <th scope="col">Date de l'évènement</th>
        <th scope="col">Type d'évènement</th>
        <th scope="col">Statut</th>
        <th scope="col">Organisme intervenant</th>
        <th scope="col">Numéro de téléphone</th>
        <th scope="col">Nom de la personne de référence</th>
        <th scope="col">Observations</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <?php 
        foreach ($A_evenements as $O_evenement) {
    ?>
        <tr>  
            <td><?php echo $O_evenement['nom_organisateur']?></td>
            <td><?php echo $O_evenement['date_evenement']?></td>
            <td><?php echo $O_evenement['type_evenement']?></td>
            <td><?php echo $O_evenement['statut_evenement']?></td>
            <td><?php echo $O_evenement['organisme']?></td>
            <td><?php echo $O_evenement['telephone']?></td>
            <td><?php echo $O_evenement['nom_referent']?></td>
            <td><?php echo $O_evenement['observations']?></td>
            <td>
                <?php
                echo "<a href='modifier_evenement?id={$O_evenement['id_evenement']}'/><i 
                class='fa fa-pencil-square-o modification' 
                style='font-size:36px'
                >
                </i></a>";


                echo "<i
                class='fa fa-trash suppression'
                style='font-size:36px'
                valeur ={$O_evenement['id_evenement']}>
                </i>";
                ?>
            </td>
        </tr>
    <?php
        }
    ?>

    </table>
</div>

