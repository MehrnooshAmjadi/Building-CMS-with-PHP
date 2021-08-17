$(document).ready(function() {
    $('#summernote').summernote({
        height:200
    });
  });

  $(document).ready(function() {
    $("#checkbox_all").click(function(){
        if (this.checked){
            $(".checkbox_item").prop("checked", "checked");
        }
        else{
            $(".checkbox_item").removeProp("checked");
        }
    })
  });