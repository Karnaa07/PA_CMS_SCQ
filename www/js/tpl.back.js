$(document).ready(function () {
  $('nav li').on("click", function()
  {
    $("li").removeClass("cta-button");
    this.classList.add("cta-button");
  });  

})

