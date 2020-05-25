$(document).ready(function () {

    $(function () {
        $(".draggable").draggable();
      });
    
      $(function() {    
        $( ".draggable" ).draggable({ 
          containment: "window" 
        }); 
      });
    
    $(".item").draggable({
      revert: "invalid", 
      cursor:"move"
    }); 
    
    $(".bg-desktop").droppable({
      accept:".item"
    })
    

});