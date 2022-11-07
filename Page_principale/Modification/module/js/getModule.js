function get_modules()
{


    var filiere=document.getElementById('nom_filiere');
    var option_selected=filiere.options[filiere.selectedIndex].value;

   
    
    var xhr= new XMLHttpRequest();

    

    xhr.open('GET','./ajax/get_modules.php?option_selected='+option_selected,true);

    xhr.onload=function(){
        document.getElementById('modules').innerHTML=this.responseText;
    }

    xhr.send();
}


