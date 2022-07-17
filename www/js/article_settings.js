$(document).ready(function () {
    let modalBtn = $('.modify')
    let modal = $(".modal")
    let closeBtn = $(".close-btn")

    modalBtn.click(function(){
        //Listeners

        modal.css("display", "block");

        // Datatable Inputs Values

        let Utilisateur = $(this).parents('tr').find('td').eq(0).text().trim()
        let Titre = $(this).parents('tr').find('td').eq(1).text().trim()
        let Description = $(this).parents('tr').find('td').eq(2).text().trim()
        let Categorie = $(this).parents('tr').find('td').eq(3).text().trim()
        let Date =  $(this).parents('tr').find('td').eq(4).text().trim()

        // Modal Input base Values
        $("[name='Utilisateur']").val(Utilisateur)
        $("[name='Titre']").val(Titre)
        $("[name='Description']").val(Description)
        $("[name='Categorie']").val(Categorie)
        $("[name='Date']").val(Date)

    })
    closeBtn.click(()=>{
        modal.css("display", "none");
    })
})
