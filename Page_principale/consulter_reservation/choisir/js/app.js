
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

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [year, month, day].join('-');
}
var datee = new Date();
console.log(formatDate(datee));
document.getElementById("date").value = formatDate(datee) ;


