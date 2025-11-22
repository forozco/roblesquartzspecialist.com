@extends('plantilla')

@section('seccion')

        <!--esfera-->
        <div class="back-nav-galeria">
            <div class="texture-prog-grup">
                <div class="container-set cent-men-prog-grup">
                    <div class="nav-int-prog-grup">
                        <h1 class="tit-prog-grup" style="color: white !important;">@lang('contenido.galeria')</h1>
                    </div>
                </div>
            </div>
        </div>

        <!--imagenes-->
        <div class="container-set">

            <h1 class="lema-set" style="margin-bottom: 5rem;"></h1>
            <div class="gallery">
                @foreach($materiales as $item) 
                <div class="img-w">
                    <img src="{{ url(Storage::url( 'aplicacion/'.$item->application)) }}" alt="">
                </div>
            @endforeach()
        </div>
            

        </div>
        <!--h1 class="lema-set">Partners</h1-->
        <!--div class="container-set slider-partners">
            
            <div id="hero-slider" style="margin-bottom: 0;">
            
                <div class="hero-slide" style="background-image: url('img/slide-1.png');">
                    <div class="container">
                        <div class="row hero-content ">
                            <div class="col-sm-6" style=" padding: 5rem 0;border-radius: 10px; background-color: #3333334d; ">

                            </div>
    
                        </div>
                    </div>    
                </div>
                <div class="hero-slide" style="background-image: url('img/slide-2.png');">
                    <div class="container">
                        <div class="row hero-content">
                            <div class="col-sm-6" style=" padding: 5rem 0;border-radius: 10px; background-color: #3333334d; ">

                            </div>
                        </div>
                    </div>    
                </div>
                <div class="hero-slide" style="background-image: url('img/slide-3.png');">
                    <div class="container">
                        <div class="row hero-content">
                            <div class="col-sm-6" style=" padding: 5rem 0;border-radius: 10px; background-color: #3333334d; ">

                            </div>
                        </div>
                    </div>    
                </div>
            
            </div>
        </div-->
        <div class="go-top-container show-gt">
            <div class="go-top-button">
                <i class="material-icons">keyboard_arrow_up</i>
            </div>	
        </div>
        <script>
            $(function() {
              $(".img-w").each(function() {
                $(this).wrap("<div class='img-c'></div>")
                let imgSrc = $(this).find("img").attr("src");
                 $(this).css('background-image', 'url(' + imgSrc + ')');
              })
                        
              
              $(".img-c").click(function() {
                let w = $(this).outerWidth()
                let h = $(this).outerHeight()
                let x = $(this).offset().left
                let y = $(this).offset().top
                
                
                $(".active").not($(this)).remove()
                let copy = $(this).clone();
                copy.insertAfter($(this)).height(h).width(w).delay(500).addClass("active")
                $(".active").css('top', y - 8);
                $(".active").css('left', x - 8);
                
                  setTimeout(function() {
                copy.addClass("positioned")
              }, 0)
                
              }) 
              
              
            
              
            })
            
            $(document).on("click", ".img-c.active", function() {
              let copy = $(this)
              copy.removeClass("positioned active").addClass("postactive")
              setTimeout(function() {
                copy.remove();
              }, 500)
            })
                </script>



@endsection