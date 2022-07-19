$(document).ready(function () {
    $("[name='name']").before('<label for="name">Nom du template : </label>')
    $("[name='bgcolor']").before(' <label for="bgcolor">Couleur de fond du template : </label> ')
    $("[name='fontcolor']").before(' <label for="fontcolor">Couleur ce la police d\'ecritures : </label> ')
    $("[name='font']").before(' <label for="font">Police d\'écriture : </label> ')
    $('.btn--submit').before('<br>')
  })
  