$(document).ready(function () {
    let modalBtn = $('.modify')
    let modal = $(".modal")
    let modalDelete = $(".modalDelete")
    let closeBtn = $(".close-btnDelete")
    let closeBtnDelete = $(".close-btn")
    let modalDeleteBtn = $('.delete')

    modalBtn.click(function(){
        //Listeners

        modal.css("display", "block");

        // Datatable Inputs Values
        let id = $(this).parents('tr').find('td').eq(0).text().trim()
        let name = $(this).parents('tr').find('td').eq(1).text().trim()

        // Modal Input base Values
        $("[name='id']").val(id)
        $("[name='name']").val(name)
    })

    modalDeleteBtn.click(function(){
        //Listeners

        modalDelete.css("display", "block");

        // Datatable Inputs Values
        let id = $(this).parents('tr').find('td').eq(0).text().trim()

        // Modal Input base Values
        $("[name='id']").val(id)
    })
    closeBtn.click(()=>{
        modal.css("display", "none");
    })
    closeBtnDelete.click(()=>{
        modalDelete.css("display", "none");
    })
})