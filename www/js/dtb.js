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
        prompt()

        $.ajax({
            type: 'POST',           //La méthode cible (POST ou GET)
            url : 'Controller.php', //Script Cible
            data: userDatas,
            dataType: 'json'
         });
    })

    $('button.delete').click(function(){
        var userDatas = [
            $(this).parents('tr').find('td').eq(0).text().trim(),
            $(this).parents('tr').find('td').eq(1).text().trim(),
            $(this).parents('tr').find('td').eq(2).text().trim()
        ]
        // console.log(userDatas)
        $.ajax({
            url:"/delete_user",
            type: 'POST',
            data: 'test'
        })  
    })
});