var date = new Date();
var datee = new Date();
function rendreDate()
{


datee.setDate(1);
console.log(datee.getDate())
var day = datee.getDay();
document.getElementById("date_du_jour").innerHTML= date.toDateString();

var mois = ["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décemebre"];
document.getElementById("mois_haut").innerHTML=mois[datee.getMonth()];

var fin_du_mois = new Date(date.getFullYear(),date.getMonth()+1,0).getDate();
console.log(fin_du_mois);

var prevDay = new Date(date.getFullYear(),date.getMonth(),0).getDate();


var jours ="";
for (x = day; x > 0; x--) {
    var a;
    jours+= "<div class='jour_précedent'>" + (prevDay - x +1) + "</div>";
}

var jour_courant = new Date();

for(i=1;i<=fin_du_mois;i++)
{
    classForDay = i == jour_courant.getDate() && datee.getMonth() == jour_courant.getMonth() ? 'jour_courant' : 'days_color';
    jours+= "<div class='"+classForDay+"'><a class='days_color' href='../choix/choix.php?jour="+ i + "&mois="+(datee.getMonth()+1)+"&annee="+(datee.getFullYear())+"'>"+i+"</a></div>";
}
document.getElementsByClassName("jours")[0].innerHTML=jours;

}

function changer(x)
{
   if(x == 'préc')
   {
       datee.setMonth(datee.getMonth()-1);
      /* if(datee.getMonth() < 1 )
       {
           datee.setFullYear(datee.getFullYear()-1);
       }*/
       rendreDate();
   }else if( x == 'suiv')
   {
    datee.setMonth(datee.getMonth()+1);
    rendreDate();
   }
}
