@extends('plantilla')

@section('seccion')

<div id="hero-slider">
    <div class="hero-slide" style="background-image: url('img/slide-1.png');">
        <div class="container">
            <div class="row hero-content ">
                <div class="col-sm-6" style=" padding: 5rem 0;border-radius: 10px; background-color: #3333334d; ">
                    <!--h1 data-animation="fadeInRight" data-delay="0.5s">Titulo</h1-->
                    <p data-animation="fadeInRight" data-delay="0.5s" class="text-banner-set-d"><FONT SIZE=5>@lang('contenido.f1')</FONT></p>
                    <a href="{{ route('productos') }}" class="btn-slider-set" data-animation="fadeInUpBig" data-delay="1s">@lang('contenido.masinfo')</a>
                </div>

            </div>
        </div>    
    </div>
    <div class="hero-slide" style="background-image: url('img/slide-2.png');">
        <div class="container">
            <div class="row hero-content">
                <div class="col-sm-6" style=" padding: 5rem 0;border-radius: 10px; background-color: #3333334d; ">
                    <!--h1 data-animation="fadeInRight" data-delay="0.5s">Titulo</h1-->
                    <p data-animation="fadeInRight" data-delay="0.5s" class="text-banner-set-d"><FONT SIZE=5>@lang('contenido.f2')</FONT></p>
                    <a href="{{ route('productos') }}" class="btn-slider-set" data-animation="fadeInUpBig" data-delay="1s">@lang('contenido.masinfo')</a>
                </div>
            </div>
        </div>    
    </div>
    <div class="hero-slide" style="background-image: url('img/slide-3.png');">
        <div class="container">
            <div class="row hero-content">
                <div class="col-sm-6" style=" padding: 5rem 0;border-radius: 10px; background-color: #3333334d; ">
                    <!--h1 data-animation="fadeInRight" data-delay="0.5s">Titulo</h1-->
                    <p data-animation="fadeInRight" data-delay="0.5s" class="text-banner-set-d"><FONT SIZE=5>@lang('contenido.f3')</FONT></p>
                    <a href="{{ route('productos') }}" class="btn-slider-set" data-animation="fadeInUpBig" data-delay="1s">@lang('contenido.masinfo')</a>
                </div>
            </div>
        </div>    
    </div>
</div>
<img src="img/svg/div.svg" class="division-curva" alt="">
<div class="container">
    <h1 class="lema-set">@lang('contenido.titulo')</h1>
</div>
<div class="container-set">
    <div class="rob-nos">
        <p>@lang('contenido.titulotext') </p>
    </div>
</div>
<div class="container-set">
    <div class="ab">
        <div class="text-sec-1">
            <h1 class="lema-set" style="text-align: justify; margin-bottom: 3rem;">@lang('contenido.mision')</h1>
            <p>@lang('contenido.misiontxt')</p>
        </div>
        <div class="img-sect">
            <img src="img/mision-img.png" alt="">
        </div>
    </div>
</div>
<div class="marmol-negro">
    <div class="container-set">
        <div class="ab">
            <div class="img-sect">
                <img src="img/vision-img.png" alt="">
            </div>
            <div class="text-sec-1">
                <h1 class="lema-set" style="text-align: justify; margin-bottom: 3rem;">@lang('contenido.vision')</h1>
                <p>@lang('contenido.visiontxt')</p>
            </div>
        </div>
    </div>
</div>
<div class="container-set">
    <div class="ab">
        <div class="text-sec-1">
            <h1 class="lema-set" style="text-align: justify; margin-bottom: 3rem;">@lang('contenido.fotaleza')</h1>
            <p>@lang('contenido.fortalezatxt')</p>
        </div>
        <div class="img-sect">
            <img src="img/fortalezas-img.png" alt="">
        </div>
    </div>
</div>
<div class="marmol-negro">
    <div class="container">
        <h1 class="lema-set">@lang('contenido.compromiso')</h1>
    </div>
    <div class="container-set">
        <div class="rob-nos-text">
            <p>@lang('contenido.compromisotxt')</p>
        </div>
    </div>
</div>







        
<div class="go-top-container show-gt">
        <div class="go-top-button">
            <i class="material-icons">keyboard_arrow_up</i>
        </div>	
    </div>





@endsection