$(document).ready(function () {
    let modalBtn = $(".login--mdpoublie")
    let modal = $(".modal")
    let closeBtn = $(".close-btn")
    
    modalBtn.click(function(){

        alert("Test")
        //Listeners

        modal.css("display", "block");

        // Datatable Inputs Values
        // let Email = $(this).parents('tr').find('td').eq(0).text().trim()

        // // Modal Input base Values
        // $("[name='Email']").val(Email)

    })
    closeBtn.click(()=>{
        modal.css("display", "none");
    })
})