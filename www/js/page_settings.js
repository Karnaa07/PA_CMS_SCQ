$(document).ready(function () {
    let modalBtn = $('.modify')
    let modal = $(".modal")
    let closeBtn = $(".close-btnDelete")
    let show = $('.show')
  
    let deleteBtn = $('.delete')
    let deleteCloseBtn = $('.deleteClose-btn')
    let deleteModal = $(".deleteModal")
    show.click(function(){
        let name = $(this).parents('tr').find('td').eq(1).text().trim()
        name= name.replace(' ', '_')
        window.location.replace("/"+name)
    })
    modalBtn.click(function(){
        //Listeners
        modal.css("display", "block");

        // Datatable Inputs Values
        let id = $(this).parents('tr').find('td').eq(0).text().trim()
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
        let id = $(this).parents('tr').find('td').eq(0).text().trim()
        deleteModal.css("display", "block");
        $("[name='idPage']").val(id)
    })
})