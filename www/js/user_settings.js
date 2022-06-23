$(document).ready(function () {
    let modalBtn = $('.modify')
    let modal = $(".modal")
    let closeBtn = $(".close-btn")
    
    modalBtn.click(function(){
        //Listeners

        modal.css("display", "block");

        // Datatable Inputs Values
        let Mail = $(this).parents('tr').find('td').eq(0).text().trim()
        let Firstname = $(this).parents('tr').find('td').eq(1).text().trim()
        let Lastname = $(this).parents('tr').find('td').eq(2).text().trim()

        // Modal Input base Values
        $("[name='email']").val(Mail)
        $("[name='firstname']").val(Firstname)
        $("[name='lastname']").val(Lastname)
    })
    closeBtn.click(()=>{
        modal.css("display", "none");
    })
})
