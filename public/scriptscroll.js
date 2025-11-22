


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



document.querySelector('.go-top-container')
.addEventListener('click', () => {

    window.scrollTo({
    top:0,
    behavior: 'smooth'
    
 });
    
});



