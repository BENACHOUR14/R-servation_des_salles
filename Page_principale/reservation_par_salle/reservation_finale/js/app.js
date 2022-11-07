function get_type_reservation() {
    var salle = document.getElementById('salle').value;
    var type_reservation = document.getElementById('type_reservation');
    var option_selected = type_reservation.options[type_reservation.selectedIndex].value;
    
    var xhr = new XMLHttpRequest();
    xhr.open('GET', './ajax/get_capacite.php?option_selected='+option_selected+'&salle='+salle, true);

    xhr.onload = function(){
      document.getElementById('capacite_salle').value = this.responseText;
      
    }

    xhr.send();
}


function get_modules() {
    var filieres = document.getElementById('filieres');
    var option_selected = filieres.options[filieres.selectedIndex].value;
    console.log(option_selected);
    var xhr = new XMLHttpRequest();
    xhr.open('GET', './ajax/get_modules.php?option_selected='+option_selected, true);

    xhr.onload = function(){
     // document.getElementById('capacite_salle').value = this.responseText;
        document.getElementById('modules').innerHTML = this.responseText;
    }

    xhr.send();
}


function valider()
{

     var type_reserv = document.getElementById('type_reservation').value;
     var professeurs = document.getElementById('profs').value;
     var fill = document.getElementById('filieres').value;

     if(type_reserv =="null")
     {
         alert("Vous devez choisir le type de réservation");
         return false;
    }
    else if( professeurs == "null")
     {
         alert("Vous devez choisir le professeur");
         return false;
     }
     else if( fill == "null")
     {
         alert("Vous deves choisir la filliere");
         return false;
     }
    else
     {
         if (confirm("est-ce-que vous êtes sur de reserver ?"))
         return true;
         else
         return false;
     }


}