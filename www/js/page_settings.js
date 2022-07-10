$(document).ready(function () {
    let modalBtn = $('.modify')
    let modal = $(".modal")
    let closeBtn = $(".close-btnDelete")
  
    let deleteBtn = $('.delete')
    let deleteCloseBtn = $('.deleteClose-btn')
    let deleteModal = $(".deleteModal")

    modalBtn.click(function(){
        //Listeners
        console.log('truc')
        modal.css("display", "block");

        // Datatable Inputs Values
        let id = $(this).parents('tr').find('td').eq(0).text().trim()
        console.log(id)
        let name = $(this).parents('tr').find('td').eq(1).text().trim()

        // Modal Input base Values
        $("[name='idPage']").val(id)
        $("[name='name']").val(name)
    })

    closeBtn.click(()=>{
        modal.css("display", "none");
    })
    deleteCloseBtn.click(()=>{
        deleteModal.css("display", "none");
    })
    deleteBtn.click(function(){
        console.log('pipi')
        let id = $(this).parents('tr').find('td').eq(0).text().trim()
        deleteModal.css("display", "block");
        $("[name='idPage']").val(id)
    })
})