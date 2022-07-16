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

        let Id = $(this).parents('tr').find('td').eq(0).text().trim()
        let Mail = $(this).parents('tr').find('td').eq(1).text().trim()
        let Firstname = $(this).parents('tr').find('td').eq(2).text().trim()
        let Lastname = $(this).parents('tr').find('td').eq(3).text().trim()
        let Role =  $(this).parents('tr').find('td').eq(4).text().trim()

        // Modal Input base Values
        $("[name='id']").val(Id)
        $("[name='email']").val(Mail)
        $("[name='firstname']").val(Firstname)
        $("[name='lastname']").val(Lastname)
        $("[name='role_id']").val(Role)

    })
    closeBtn.click(()=>{
        modal.css("display", "none");
    })
    deleteBtn.click(function(){
        let id = $(this).parents('tr').find('td').eq(0).text().trim()
        deleteModal.css("display", "block");
        $("[name='id']").val(id)

    })
})

