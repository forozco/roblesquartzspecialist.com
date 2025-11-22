<!doctype html>
<html lang="es">
  <head>
    <title>Robles - Quartz Specialist</title>
    <meta charset="UTF-8">
    <link href="styles.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <script src="https://code.jquery.com/jquery-3.5.0.slim.js" integrity="sha256-sCexhaKpAfuqulKjtSY7V9H7QT0TCN90H+Y5NlmqOUE=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="shortcut icon" href="./img/fav-icon.png">
    <script src="https://kit.fontawesome.com/26b4b47fca.js" crossorigin="anonymous"></script>

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.4.0/animate.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>

    
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"-->
    
    
    
  </head>
  <body>
    <header class="header">
        <div class="cont-head">
            <div class="container-set header-flex">
                <div></div>
                <div>
                    <!--a href="#" class="red-header"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="red-header"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="red-header"><i class="fa-brands fa-youtube"></i></a-->
                </div>
            </div>
        </div>
        <div class="container-set logo-nav-container">
            <div class="logo-nav-container">
            <a class="logo" href="https://roblesquartzspecialist.com/"><img src="./img/logo.png" alt=""></a>
            <span class="menu-icon">
                <button class="menu-b" onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'))" aria-label="Main Menu">
                    <svg width="25" height="25" viewBox="0 0 100 100">
                      <path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                      <path class="line line2" d="M 20,50 H 80" />
                      <path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
                    </svg>
                  </button>
            </span>
            </div>
            <nav class="navigation">
                <ul class="menu" data-animation="bonus">
                    <li><a href="{{ route('inicio') }}">@lang('contenido.inicio')</a></li>
                    <li><a href="{{ route('productos') }}">@lang('contenido.prod')</a></li>
                    <li><a href="{{ route('proyectos') }}">@lang('contenido.projpart')</a></li>
                    <li><a href="{{ route('contacto') }}">@lang('contenido.contactanos')</a></li>
                </ul>
            </nav>
        </div>
    </header>

  
    <div class="conteiner">
        @yield('seccion')
    </div>

            <!--seleccionador de idiomas-->
            <div class="container">
                <div class="float-id">
                    <div class="contenedor">
                        <form action="">
                            <div class="selectbox">
                                <div class="select" id="select">
                                    <div class="contenido-select">
                                        <div class="contenido-opcion">
                                            <img src="img/@lang('contenido.imagen').png" alt="">
                                            <div class="textos">
                                                <h1 class="titulo-idioma">@lang('contenido.idioma')</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </div>
                                <div class="opciones" id="opciones">
                                    <a href="{{ route('locale','en') }}" class="opcion">
                                    <div class="contenido-opcion">
                                            <img src="img/USA.png" alt="">
                                            <div class="textos">
                                                <h1 class="titulo-idioma">English</h1>
                                            </div>
                                        </div>
            
                                    </a>
                                    <a href="{{ route('locale','es') }}" class="opcion">
                                        <div class="contenido-opcion">
                                                <img src="img/MEX.png" alt="">
                                                <div class="textos">
                                                    <h1 class="titulo-idioma">Español</h1>
                                                </div>
                                            </div>
                
                                        </a>
                                    </div>
                                </div>
                    
                                <input type="hidden" name="pais" id="inputSelect" value="">
                            </form>
                    
                        </div>
                        </div>
                </div>

        <!--seleccionador de idiomas-->
    <a href="https://api.whatsapp.com/send?phone=17022367937" class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
    </a>
    
    <footer>
        <!--script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script-->
        <script src='https://cdn.jsdelivr.net/jquery.slick/1.5.7/slick.min.js'></script>
        <script src="script.js"></script>

        <div class="container">
            <div class="cont-footer">
                <div class="fott-sect logo-footer-set">
                    <img src="img/logo.png" alt="" style="width: 100%; ">
                </div>
                <div class="fott-sect oclt">

                </div>
                <div class="fott-sect">
                    <p class="titulo-footer-set">@lang('contenido.nave')</p>
                    <ul class="menu-footer-set" >
                        <li><a href="{{ route('inicio') }}">@lang('contenido.inicio')</a></li>
                        <li><a href="{{ route('productos') }}">@lang('contenido.prod')</a></li>
                        <li><a href="{{ route('proyectos') }}">@lang('contenido.projpart')</a></li>
                        <li><a href="{{ route('contacto') }}">@lang('contenido.contactanos')</a></li>
                    </ul>
                </div>
                <div class="fott-sect">
                    <p class="titulo-footer-set">@lang('contenido.sigue')</p>
                    <div>
                        <!--a href="#" class="red-header"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#" class="red-header"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="red-header"><i class="fa-brands fa-youtube"></i></a-->
                    </div>
                    <br>
                    <a class="terminos" href="#">@lang('contenido.terminos')</a><br>
                    <a class="terminos" href="#">@lang('contenido.condiciones')</a>
                </div>
                
            </div>
            <div class="firma">
                <p>@lang('contenido.derechos')</p>
            </div>
        </div>
       
    </footer>


  </body>
</html>