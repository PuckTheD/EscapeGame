$( document ).ready(function() {

  $(function() {    
    $( ".item" ).draggable({ 
      containment: "window",
    }); 
  });

  $(".item").draggable({
    cursor:"move", 
    backgroundColor: "red"

  }); 

  $(".wrap-folders").droppable({
    accept:".item",
  })
  
}); 