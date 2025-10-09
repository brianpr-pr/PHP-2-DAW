$(function(){
    $('#search').keyup(function(){
        let search = $('#search').val();
        $.ajax({
            url : 'taskSearchPDO.php',
            method: 'POST',
            data : {search},
            success: function(response){
                console.log(response);
            }
        })
    })
});