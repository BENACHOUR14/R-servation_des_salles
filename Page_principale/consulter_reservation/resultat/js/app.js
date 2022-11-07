
var salle   = document.getElementById("salle").value;
var date    = document.getElementById("date").value;




function Confirm(id)
{
   if(window.confirm('Voulez-vous vraiment supprimer ?'))
    {
       

        window.location.assign('./supprimer.php?id_reserv='+id+'&salle='+salle+'&date='+date+'');
       return true;
       
    }else
    {
        window.location.reload();
        return false;
        
    }

}