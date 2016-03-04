$(document).ready(function(){
  $(".reparer").css("visibility", "hidden");
  $("img").css("visibility", "hidden");
  console.log(rand);

  for(var i=1; i<5; i++){
    var rand = Math.random();
    if(rand < 0.26){
      $("#m"+i+"").css("background-color", "red");
      $("#m"+i+" + .reparer").css("visibility", "visible");
    }
  }
  $(".reparer").click(function(){
    Command: toastr["success"]("L'ordinateur a été réparé avec  succès.", "Machine réparée")

    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": true,
      "progressBar": false,
      "positionClass": "toast-top-center",
      "preventDuplicates": false,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "4000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
    $(this).prev().css("background-color", "rgb(30,210,26)");
    $(this).css("visibility", "hidden");
  })

  jQuery('.tabs .tab-links a').on('click', function(e)  {
          var currentAttrValue = jQuery(this).attr('href');

          // Show/Hide Tabs
          jQuery('.tabs ' + currentAttrValue).show().siblings().hide();

          // Change/remove current tab to active
          jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

          e.preventDefault();
      });

}) ;
