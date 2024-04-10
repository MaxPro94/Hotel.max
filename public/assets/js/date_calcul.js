const aff_resultat = document.querySelector('#resultat_nuit')
const submit_date = document.querySelector('#valid_date')
const prix = document.querySelector('#prix').value
const php_resultat = document.querySelector('#php')
const id_chambre = document.querySelector('#id_chambre').value

let date_fin_reservation = ""
let date_debut_reservation = ""

submit_date.addEventListener("click", function(){

    let value_start = document.querySelector('#date_start').value
    let value_end = document.querySelector('#date_end').value
    if(value_start !== ''  && value_end !== ''){

        const start_value = new Date(value_start); // Pour calculer des dates nous sommes apprement obligé de les transformer en objet
        const end_value = new Date(value_end);
    
        document.querySelector('#error').innerHTML = ""


        if(start_value < end_value){
            
            const difference = end_value - start_value
            const nbnuit = difference / (1000 * 60 * 60 *24)

            const prix_total = nbnuit * prix


            aff_resultat.innerHTML = `${prix_total} €`;
            php_resultat.value = `${prix_total}`;
            
            if(id_chambre > 0){
                fetch('/data.php?action=check_date&id_chambre=' + id_chambre)
                .then(function(response){
                    return response.json()
                })
                .then(function(resultats){


                    if(resultats){
                        resultats.forEach(resultat => {
                            let date_debut_reservation = new Date(resultat.date_start); // Pour calculer des dates nous sommes apprement obligé de les transformer en objet
                            let date_fin_reservation = new Date(resultat.date_end);
    
                            if(start_value.getTime() < date_debut_reservation.getTime() && end_value.getTime() > date_debut_reservation.getTime() && end_value.getTime() < date_fin_reservation.getTime() || start_value.getTime() > date_debut_reservation.getTime() && start_value.getTime() < date_fin_reservation.getTime() && end_value.getTime() > date_debut_reservation.getTime() && end_value.getTime() > date_fin_reservation.getTime() || start_value.getTime() > date_debut_reservation.getTime() && start_value.getTime() < date_fin_reservation.getTime() && end_value.getTime() > date_debut_reservation.getTime() && end_value.getTime() < date_fin_reservation.getTime() || start_value.getTime() === date_debut_reservation.getTime() && end_value.getTime() === date_fin_reservation.getTime() || start_value.getTime() < date_debut_reservation.getTime() && end_value.getTime() > date_fin_reservation.getTime()){
                                aff_resultat.innerHTML = "";
                                document.querySelector('#error').innerHTML = "Les dates choisies entrent en conflit avec d'autres réservations, veuillez les modifier."
                                document.querySelector('#validation').innerHTML = ""
                               // document.querySelector('#erreur_php').innerHTML =""
                            } else {
                               // document.querySelector('#erreur_php').innerHTML =""
                                document.querySelector('#error').innerHTML = ""
                                document.querySelector('#validation').innerHTML = "Les dates demandées sont disponibles."
                            }
                            
                        });
                    } else {
                        document.querySelector('#error').innerHTML = ""
                        document.querySelector('#validation').innerHTML = "Les dates demandées sont disponibles."
                    }

                })
            }
        
        } else {
            aff_resultat.innerHTML = "";
            document.querySelector('#error').innerHTML = "La date de départ doit être postérieure à la date d'arrivée."
        }

    } else {
        aff_resultat.innerHTML = "";
        document.querySelector('#error').innerHTML = "Veuillez renseigner une date de départ et une date de fin pour votre séjour."
    }
})
