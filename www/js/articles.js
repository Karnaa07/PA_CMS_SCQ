$(document).ready(function () {
    let modalBtn = $('.modify')
    let deleteBtn = $('.delete')
    let deleteCloseBtn = $('.deleteClose-btn')
    let deleteModal = $(".deleteModal")
    let modal = $(".modal")
    let closeBtn = $(".close-btn")

    modalBtn.click(function(){
        //Listeners

        modal.css("display", "block");

        // Datatable Inputs Values

        let idArticle = $(this).parents('tr').find('td').eq(0).text().trim()
        let title = $(this).parents('tr').find('td').eq(1).text().trim()
        let content = $(this).parents('tr').find('td').eq(2).text().trim()
        let idCategorie= $(this).parents('tr').find('td').eq(3).text().trim()
        let idPage =  $(this).parents('tr').find('td').eq(4).text().trim()

        // Modal Input base Values
        $("[name='idArticle']").val(idArticle)
        $("[name='title']").val(title)
        $("[name='content']").val(content)
        $("[name='idCategory']").val(idCategorie)
        $("[name='idPage']").val(idPage)

    })
    closeBtn.click(()=>{
        modal.css("display", "none");
    })
    deleteBtn.click(function(){
        let id = $(this).parents('tr').find('td').eq(0).text().trim()
        deleteModal.css("display", "block");
        $("[name='idArticle']").val(id)
        
    })
})

