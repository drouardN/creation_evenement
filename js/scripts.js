jQuery( document ).ready(function(){
    $(".suppression").click(function(){
        let idEvenement = $(this).attr("valeur");

        if(confirm("Voulez vous vraiment supprimer cet événement?")){
            $.ajax({
                url: "supprimer_evenement",
                method: "POST",
                data: {idEvenement : idEvenement},
            }).done(function() {
                location.href = "./index.php";

            });
        }
    });

});  


    
   