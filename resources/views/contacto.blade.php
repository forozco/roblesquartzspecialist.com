@extends('plantilla')

@section('seccion')

<div class="fondo-contact-set">
    <div class="overlay-set-contact">
        <div class="container-set center-text-banner">
            <div>
                <h1 class="contact-tit">@lang('contenido.contacto')</h1>
                <div class="line-set-cont"></div>
                <p class="banner-descrip">@lang('contenido.contactotxt')</p>
            </div>
        </div>
    </div>
</div>
<img src="img/svg/div.svg" class="division-curva-c" alt="">
<div class="container-set">
    <div class="contact-cont">
        <div class="con-info-cont-morado">
            <div class="circulo-morado-cont">
                <img class="icono-cont-cont" src="img/tel-blanco.png" alt="">
            </div>
            <h3 class="info-tit-cont">@lang('contenido.tel')</h3>
            <p class="info-text-cont">@lang('contenido.hora')</p>
        </div>
        <div class="con-info-cont-azul">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3223.9393576082107!2d-115.19008192428349!3d36.0949662724566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c8c5d5dd3f68b9%3A0xbf2c3c235de276f0!2s5216%20S%20Procyon%20St%2C%20Las%20Vegas%2C%20NV%2089118%2C%20USA!5e0!3m2!1sen!2smx!4v1700948903456!5m2!1sen!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        
    </div>
    
</div>
<div class="fondo-formulario">
    <div class="container-set">
        <div class="formulario-set">
            <h1 class="tit-formulario">@lang('contenido.contacto')</h1>
            <form action="{{ route('contactoenvio') }}" method="POST" >
                @csrf
                <div class="cont-name">
                    <div class="name-lastname">
                        <p>@lang('contenido.nombre')</p>
                        <input name="nombres" id="nombres" class="contac-form" type="text">
                    </div>
                    <div class="name-lastname">
                        <p>@lang('contenido.apellido') </p>
                        <input name="apellidos" id="apellidos" type="text" class="contac-form">
                    </div>
                </div>
                <div class="asunto">
                    <p>@lang('contenido.titform')</p>
                    <input name="asunto" id="asunto" type="text" class="contac-form">
                </div>
                <div class="prog-int">

                </div>
                <div class="cont-name">
                    <div class="tel-corr">
                        <p>@lang('contenido.telm')
                        </p>
                        <input name="tel" id="tel" class="contac-form" type="text">
                    </div>
                    <div class="tel-corr">
                        <p>@lang('contenido.correo')  </p>
                        <input name="correo" id="correo" type="text" class="contac-form">
                    </div>
                </div>
                <div class="mensaje-set">
                    <p>@lang('contenido.mensaje') </p>
                    <textarea name="mensaje" id="mensaje"  class="contac-form text-mensaje"></textarea>
                </div>
                <button type="submit"  class="enviar-form">@lang('contenido.btnenviar')</button>
            </form>
        </div>
    </div>
</div>
<div class="go-top-container show-gt">
    <div class="go-top-button">
        <i class="material-icons">keyboard_arrow_up</i>
    </div>	
</div>


@endsection