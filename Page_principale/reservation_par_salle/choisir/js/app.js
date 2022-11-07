
function valider()
{
    var salle = document.getElementById('salle').value;

    if( salle =="null")
    {

        alert("Vous Devez Choisir Une salle");
        return false;
    }
    else
    {

        return true;

    }

}