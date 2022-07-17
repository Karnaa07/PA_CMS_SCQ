$(document).ready(function () {
    for (let i = 0; i < pages.length; i++) {
        $('#selectPage').append('<option value="'+pages[i]['idPage']+'">'+pages[i]['name']+'</option>')
    }
})
