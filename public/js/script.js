/*SLIDER PRINCIPAL*/
$(document).ready(function(){
  var imgItems = $('.slider_principal li').length;
  var imgPos = 1;
  for (var i = 1; i <= imgItems; i++) {
    $('.paginacion').append('<li><span class="fa fa-circle"></span></li>');
  }

  $('.slider_principal li').hide();
  $('.slider_principal li:first').show();
  $('.paginacion li:first').css({'color':'#000000'});
  $('.paginacion li').click(paginacion);
  $('.left span').click(prevSlider);
  $('.right span').click(nextSlider);

  setInterval(function(){
    nextSlider();
  },10000);

  function paginacion(){
    var pagPos = $(this).index() + 1;
    $('.slider_principal li').hide();
    $('.slider_principal li:nth-child('+pagPos+')').fadeIn();
    $('.paginacion li').css({'color':'rgba(211,211,211,.8)'});
    $(this).css({'color':'#000000'});
    imgPos = pagPos;
  }
  function prevSlider(){
    
    if (imgPos <= 1) {
      imgPos=imgItems;
    }else{
      imgPos--;
    }
    $('.slider_principal li').hide();
    $('.slider_principal li:nth-child('+imgPos+')').fadeIn();
    $('.paginacion li').css({'color':'rgba(211,211,211,.8)'});
    $('.paginacion li:nth-child('+imgPos+') ').css({'color':'#000000'});
  }
  function nextSlider(){
    if (imgPos >= imgItems) {
      imgPos = 1;
    }else{
      imgPos++;
    }
    $('.slider_principal li').hide();
    $('.slider_principal li:nth-child('+imgPos+')').fadeIn();
    $('.paginacion li').css({'color':'rgba(211,211,211,.8)'});
    $('.paginacion li:nth-child('+imgPos+') ').css({'color':'#000000'});
  }

/*SUBMENU*/
$(".submenu-prin").click(function () {
  $(this).children("ul").slideToggle();
});
$("ul").click(function (p) {
  p.stopPropagation();
});
/*SCROLL DOWN*/
$( document ).scroll( function(e){
  var scrollPos = $(document).scrollTop();
  if (scrollPos < "100") {
    $(".flecha-subir").css({display: "none"});
  }else{
    $(".flecha-subir").css({display: "block"});
  };
});
$(".flecha-subir").click(function(a){
  $("body,html").animate({scrollTop:"0"}, 1000);
});

});
/*MENU FIXED*/
var stop = document.getElementById('menu-principal');
var altura = 1;
stop.classList.remove('menu-fixed');
window.addEventListener('scroll',function(){
  if (window.pageYOffset > altura) {
    stop.classList.add('menu-fixed');
  }else{
    stop.classList.remove('menu-fixed');
  }
})

