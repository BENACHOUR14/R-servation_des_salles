function faire(x)
{


    if(x == "reservation")
    {
        document.getElementById("changement").innerHTML = "<br><button><a href='./reservation_par_salle/choisir/date-salle.php'> Reservation Par Salle </a></button> <br><br><br> <button><a href='./reservation/calendrier/calendrier.html'>Reservation Par Date</a></button>"
        $("h1").toggleClass("test"); 
    }
    else if( x == "consultation" )
    {
        document.getElementById("changement").innerHTML = "<br><button><a href='./consulter_reservation/choisir/choisir_date_salle.php'>Consulter Reservation</a></button> <br><br><br> <button><a href='./consulter_ds/choisir/choisir_date.html'>Consulter DS</a></button>"
    }
    else
    {
        document.getElementById("changement").innerHTML = "<br><button><a href=''>Filières</button></a> <br><br>  <button><a href=''>Modules</button></a> <br><br> <button><a href=''>Professeurs</a></button>"
    }

}
