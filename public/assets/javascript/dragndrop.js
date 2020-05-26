$(document).ready(function () {

    $(function () {
        $(".draggable").draggable();
      });
    
      $(function() {    
        $( ".draggable" ).draggable({ 
          containment: "window" 
        }); 
      });  

});