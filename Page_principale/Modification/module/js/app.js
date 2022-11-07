function  getModal()
{
    $('#addmoduleModal').modal('show');

    var id=document.getElementById("adt").innerText;

    // console.log(id);
    $('#hidden_id').val(id);

}

function deleteModal(x)
{

    $('#deletemodal').modal('show');

    var id_module=x;

    
    $('#delete_id').val(id_module);
}

function editModal(y)
{
    $('#editmodal').modal('show');
    var id_moduley=y;
    
    console.log(id_moduley);
    
    $('#edit_id').val(id_moduley);

}







