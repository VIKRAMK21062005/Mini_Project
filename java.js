



const AREA = document.body;
const CIRCLE = document.querySelector('.cursors');

function mouseCoordinates(e) {

    var horizontalPosition = e.clientX - 26;
    var verticalPosition= e.clientY - 26;

    // Set horizontal and vertical position.
    CIRCLE.style.left = horizontalPosition + 'px';
    CIRCLE.style.top = verticalPosition + 'px';
}
AREA.addEventListener('mousemove', mouseCoordinates, false);

function menuToggle(){
  const menuToggle = document.querySelector('.dropdown') ;
  menuToggle.classList.toggle('active_menu')
}







window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("banner").style.top = "0";

  } else {
    document.getElementById("banner").style.top = "-100px";
  
   
    
  }
}

window.addEventListener('load', () => {
  const preload = document.getElementById('preloader');
  setTimeout( function() {
      preload.classList.add('preload-finish');
  }, 1000 );
});

window.addEventListener("scroll", function(){
    var header =document.getElementById("nav");
    header.classList.toggle("scroll", window.scrollY > 0);
  })


  let circle = document.getElementById('circle');
        const onMouseMove = (e) =>{
          circle.style.left = e.pageX + 'px';
          circle.style.top = e.pageY + 'px';
          
        }
        document.addEventListener('mousemove', onMouseMove); 




        let slideIndex = 1;
        showSlides(slideIndex);
        
        function plusSlides(n) {
          showSlides(slideIndex += n);
        }
        
        function currentSlide(n) {
          showSlides(slideIndex += n);
        }
        
        function showSlides(n) {
          let i;
          let slides = document.getElementsByClassName("mySlides");
          let dots = document.getElementsByClassName("dot");
          if (n > slides.length) {slideIndex = 1}    
          if (n < 1) {slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
            
          }
          for (i = 0; i < dots.length; i++) {
            
            dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";  
          dots[slideIndex-1].className += " active";
        }


       