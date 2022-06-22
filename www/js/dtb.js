$(document).ready( function () {
    $('#table_id').DataTable({
        "bInfo":false,
        //"bFilter":false,
        language:{
            url:'https://cdn.datatables.net/plug-ins/1.11.5/i18n/fr-FR.json'
        }
    });  
    $('button.view').click(function(){
        let userDatas = [
            $(this).parents('tr').find('td').eq(0).text().trim(),
            $(this).parents('tr').find('td').eq(1).text().trim(),
            $(this).parents('tr').find('td').eq(2).text().trim()
        ]
        $.ajax({
            type: 'POST',          //La méthode cible (POST ou GET)
            url : 'Controller.php', //Script Cible
            data: userDatas,
            dataType: 'json'
         });
    })
    $('button.delete').click(function(){
        let userDatas = [
            $(this).parents('tr').find('td').eq(0).text().trim(),
            $(this).parents('tr').find('td').eq(1).text().trim(),
            $(this).parents('tr').find('td').eq(2).text().trim()
        ]
        console.log("test")
        $.ajax({
            type: 'POST',
            url: '/dashboard',
            data: userDatas            
         });
    })
});