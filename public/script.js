  /*select*/


const select = document.querySelector('#select');
const opciones = document.querySelector('#opciones');
const contenidoSelect = document.querySelector('#select .contenido-select');
const hiddenInput = document.querySelector('#inputSelect');

document.querySelectorAll('#opciones > .opcion').forEach((opcion) => {
	opcion.addEventListener('click', (e) => {
        
		//e.preventDefault();
		contenidoSelect.innerHTML = e.currentTarget.innerHTML;
        
		select.classList.toggle('active');
		opciones.classList.toggle('active');
		hiddenInput.value = e.currentTarget.querySelector('.titulo').innerText;

	});
});

select.addEventListener('click', () => {
	select.classList.toggle('active');
	opciones.classList.toggle('active');
});


/*-*/
  /*go to top*/
  window.onscroll = function (){
    if(document.documentElement.scrollTop > 50){
        document.querySelector('.go-top-container')
        .classList.add('show-gt')
    }else{
        document.querySelector('.go-top-container')
        .classList.remove('show-gt')
    }
}

jQuery('document').ready(function($){

	var menuBtn = $('.menu-icon'),
		menu = $('.navigation ul');

	menuBtn.click(function() {
		
		if( menu.hasClass('show')){
		menu.removeClass('show');	
		}else{
		menu.addClass('show');
		}

	
		
	});			   
});



document.querySelector('.go-top-container')
.addEventListener('click', () => {

    window.scrollTo({
    top:0,
    behavior: 'smooth'
    
 });
    
});





/**/
$(document).ready(function() {
    $('#hero-slider').on('init', function(e, slick) {
        var $firstAnimatingElements = $('div.hero-slide:first-child').find('[data-animation]');
        doAnimations($firstAnimatingElements);    
    });
    $('#hero-slider').on('beforeChange', function(e, slick, currentSlide, nextSlide) {
              var $animatingElements = $('div.hero-slide[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
              doAnimations($animatingElements);    
    });
    $('#hero-slider').slick({
       autoplay: true,
       autoplaySpeed: 10000,
       dots: true,
       fade: true
    });
    function doAnimations(elements) {
        var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        elements.each(function() {
            var $this = $(this);
            var $animationDelay = $this.data('delay');
            var $animationType = 'animated ' + $this.data('animation');
            $this.css({
                'animation-delay': $animationDelay,
                '-webkit-animation-delay': $animationDelay
            });
            $this.addClass($animationType).one(animationEndEvents, function() {
                $this.removeClass($animationType);
            });
        });
    }
});
/**/
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  // Close the dropdown menu if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }
  



/*-*/

