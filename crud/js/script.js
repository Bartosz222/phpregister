var modal = document.getElementById("myModal");

var btn = document.getElementById("myBtn");

var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  modal.style.display = "block";
  $('.title').html('Dodaj auto');
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

const editBtn = document.getElementById('edit-btn');

editBtn.onclick = function() {
  modal.style.display = "block";
  $('.title').html('Edytuj auto');
}

$(document).on('click', '.delete-btn', function(){
  let id = $(this).attr('data-id');
    $.ajax({
      url: 'functions/delRecord.php',
      type: 'POST',
      data: {id:id},
      success: function(){
        window.location.reload(true);
    }
  });
});

$(document).on('click', '#edit-btn', function(){
  $('.title').html('Edytuj dane');
  let id = $(this).attr('data-id');
  $("#mainBtn").removeClass("add");
  $("#mainBtn").addClass("editBtn");

  
  $.ajax({
    url: 'functions/editRecord.php',
    type: 'POST',
    data: {id:id},
    dataType: "json",
    success: function(data){
     
   
      console.log(data);
      $("#myModal").show();
      $("#id").val(data.id);
      $("#mark").val(data.mark);
      $("#model").val(data.model);
      $("#year").val(data.year);
      $("#color").val(data.color);
      $("#gearbox").val(data.gearBox);
    },
  });
});
  
$(document).on('click', '.editBtn', function(){

  let id = $("#id").val();
  let Mark = $("#mark").val();
  let Model = $("#model").val();
  let Color = $("#color").val();
  let Year = $("#year").val();
  let Gearbox = $("#gearbox").val();

$.ajax({

  url: 'functions/update.php',
  type: 'POST',
  data: {
    id:id,
    mark: Mark,
    model: Model,
    color: Color,
    year: Year,
   gearbox: Gearbox

  },
  success:function(){
    // location.reload();
  }
});



});

