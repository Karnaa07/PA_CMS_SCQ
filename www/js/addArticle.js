for (let i = 0; i < parsecontent.length; i++) {
    $('select#idPage').append('<option value="'+parsecontent[i]['idPage']+'">'+parsecontent[i]['name']+' </option>')
}
   