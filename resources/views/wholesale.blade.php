@extends('plantilla')

@section('seccion')
<style>
* {
	padding: 0;
	margin: 0;
	box-sizing:border-box;
}

body {
	background: #fff;
	font-family: 'Open Sans', sans-serif;
}

.contenedor {
	width: 90%;
	max-width: 1000px;
	margin: 20px auto;
}

.contenedor article {
	line-height: 28px;
}

.contenedor article h1 {
	font-size: 30px;
	text-align: left;
	padding: 50px 0;
}

.contenedor article p {
	margin-bottom: 20px;
}

.contenedor article .btn-abrir-popup {
	padding: 0 20px;
	margin-bottom: 20px;
	height: 40px;
	line-height: 40px;
	border: none;
	color: #fff;
	background: #5E7DE3;
	border-radius: 3px;
	font-family: 'Montserrat', sans-serif;
	font-size: 16px;
	cursor: pointer;
	transition: .3s ease all;
	cursor: pointer;
}

.contenedor article .btn-abrir-popup:hover {
	background: rgba(94,125,227, .9);
}

/* ------------------------- */
/* POPUP */
/* ------------------------- */

.overlay {
	background: rgba(0,0,0,.3);
	position: fixed;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	align-items: center;
	justify-content: center;
	display: flex;
	visibility: hidden;
}

.overlay.active {
	visibility: visible;
}

.popup {
	background: #F8F8F8;
	box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.3);
	border-radius: 3px;
	font-family: 'Montserrat', sans-serif;
	padding: 20px;
	text-align: center;
	width: 600px;

	transition: .3s ease all;
	transform: scale(0.7);
	opacity: 0;
}

.popup .btn-cerrar-popup {
	font-size: 16px;
	line-height: 16px;
	display: block;
	text-align: right;
	transition: .3s ease all;
	color: #BBBBBB;
}

.popup .btn-cerrar-popup:hover {
	color: #000;
}

.popup h3 {
	font-size: 36px;
	font-weight: 600;
	margin-bottom: 10px;
	opacity: 0;
}

.popup h4 {
	font-size: 26px;
	font-weight: 300;
	margin-bottom: 40px;
	opacity: 0;
}

.popup form .contenedor-inputs {
	opacity: 0;
}

.popup form .contenedor-inputs input {
	width: 100%;
	margin-bottom: 20px;
	height: 52px;
	font-size: 18px;
	line-height: 52px;
	text-align: center;
	border: 1px solid #BBBBBB;
}

.popup form .btn-submit {
	padding: 0 20px;
	height: 40px;
	line-height: 40px;
	border: none;
	color: #fff;
	background: #5E7DE3;
	border-radius: 3px;
	font-family: 'Montserrat', sans-serif;
	font-size: 16px;
	cursor: pointer;
	transition: .3s ease all;
}

.popup form .btn-submit:hover {
	background: rgba(94,125,227, .9);
}

/* ------------------------- */
/* ANIMACIONES */
/* ------------------------- */
.popup.active {	transform: scale(1); opacity: 1; }
.popup.active h3 { animation: entradaTitulo .8s ease .5s forwards; }
.popup.active h4 { animation: entradaSubtitulo .8s ease .5s forwards; }
.popup.active .contenedor-inputs { animation: entradaInputs 1s linear 1s forwards; }

@keyframes entradaTitulo {
	from {
		opacity: 0;
		transform: translateY(-25px);
	}

	to {
		transform: translateY(0);
		opacity: 1;
	}
}

@keyframes entradaSubtitulo {
	from {
		opacity: 0;
		transform: translateY(25px);
	}

	to {
		transform: translateY(0);
		opacity: 1;
	}
}

@keyframes entradaInputs {
	from { opacity: 0; }
	to { opacity: 1; }
}
</style>

<body>
    <div class="back-nav-prog-grup">
        <div class="texture-prog-grup">
            <div class="container-set cent-men-prog-grup">
                <div class="nav-int-prog-grup">
                    <h1 class="tit-prog-grup" style="color: white !important;">@lang('contenido.wholesale')</h1>

                </div>
            </div>
        </div>
    </div>
        <!--div class="container-set">
            <h1 class="lema-set">Marmoles</h1>
        </div-->
        <div class="container-set">
            <div class="destinos-set">

                @foreach ($materiales as $item)
                <div class="destino-25" style="background-image:url(/storage/aplicacion/{{$item->application }});">
                    <a class="destino-25-int" id="btn-abrir-popup{{$item->id}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{$item->clue. ' - '.$item->name}}">
                        <!--button id="btn-abrir-popup{{$item->id}}" class="btn-abrir-popup">Abrir Ventana Emergente</button-->
                        <!--a href="#" class="destino-25-int" style="background-image: url(/img/textura-marmol-1.jpg);"-->
                        <div class="overlay-set-des">

                            <div class="tit-set-dest">
                                <p>{{$item->name}}</p>
                            </div>
                        </div>
                    </a>
                </div>



                @endforeach


                <div href="" class="rell-set-f"></div>
            </div>
        </div>

            <div class="go-top-container show-gt">
                <div class="go-top-button">
                    <i class="material-icons">keyboard_arrow_up</i>
                </div>
            </div>

 @foreach ($materiales as $item)


                <div class="overlay" id="overlay{{$item->id}}">
                    <div class="popup" id="popup{{$item->id}}">
                        <a href="#" id="btn-cerrar-popup{{$item->id}}" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
                        <h3>{{$item->clue. ' - '.$item->name}}</h3>



                                <img width="90%"  src="{{ url(Storage::url( 'material/'.$item->material)) }}" alt="">
                                {!! $item->details !!}


                    </div>
                </div>


            <script>
                var btnAbrirPopup{{$item->id}} = document.getElementById('btn-abrir-popup{{$item->id}}'),
            overlay{{$item->id}} = document.getElementById('overlay{{$item->id}}'),
            popup{{$item->id}} = document.getElementById('popup{{$item->id}}'),
            btnCerrarPopup{{$item->id}} = document.getElementById('btn-cerrar-popup{{$item->id}}');

        btnAbrirPopup{{$item->id}}.addEventListener('click', function(){
            overlay{{$item->id}}.classList.add('active');
            popup{{$item->id}}.classList.add('active');
        });

        btnCerrarPopup{{$item->id}}.addEventListener('click', function(e){
            e.preventDefault();
            overlay{{$item->id}}.classList.remove('active');
            popup{{$item->id}}.classList.remove('active');
        });
            </script>

                @endforeach

</body>
</html>

        @endsection
