@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
/* Delete Button Styles */
.btn-delete-modern {
    background: #dc3545;
    border: none;
    color: white;
    width: 38px;
    height: 38px;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
}

.btn-delete-modern:hover {
    background: #c82333;
}

.btn-delete-modern:active {
    background: #bd2130;
}
</style>

<div class="container">
    <br>
    <h2 align="center" >Wholesale</h2> 
    @if (session('mensaje'))
    
        <div class="alert alert-success"> 
            {{session('mensaje')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times; </span>
            </button>
        </div>
        
    @endif
    
    <div class="row">
        <div class="col-sm-12">
            <form action="" method="GET">
                <div class="form-row">
                    <div class="col-sm-4 my-1">
                        <input type="text" class="form-control" name="texto" value="">
                    </div>
                    <div class="col-auto my-1">
                        <input type="submit" class="btn btn-dark" value="Buscar">
                    </div>
                    <div class="col-auto my-1">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            Nuevo Wholesale Item
                            </button>
                    </div>
                </div>
            </form>
        </div>
      
        <div class="table-responsive-sm"> 
            <table class="table table-sm">
                <thead >
                    <tr>
                        
                        <th style="vertical-align:middle;">Clave</th>
                        <th style="vertical-align:middle;">Nombre</th>
                        <th style="vertical-align:middle;">Cantidad</th>
                        <th style="vertical-align:middle; text-align: center">Detalles</th>
                        <th style="vertical-align:middle; text-align: center">Wholesale Item</th>
                        <th colspan="1" style="vertical-align:middle; text-align: center">Activo</th>
                        <th colspan="1" style="vertical-align:middle; text-align: center">Eliminar</th>
                     </tr>
                </thead>
                <tbody>
                    @if(count($wholesales)<=0)

                    <tr>
                        <td colspan="7">No hay resultados</td>
                    </tr> 
  
                    @else
                        
                    @foreach ($wholesales as $item)
                    <tr>
                    <td style="vertical-align:middle; ">{{$item->clue}}</td>
                    <td style="vertical-align:middle; ">{{$item->name}}</td>
                    <td style="vertical-align:middle; text-align: center;">{{$item->amount}}</td>
                    <td style="vertical-align:middle; ">{!! $item->details !!}</td>
                    <td style="vertical-align:middle; text-align: center;"><img width="30%" src="{{ url(Storage::url( 'aplicacion/'.$item->application)) }}" alt=""></td>
                    
                    <td style="vertical-align:middle;  text-align:center;">

                        <label class="switch" data-bs-toggle="tooltip" data-bs-placement="right" title="Encender / Apagar">
                            <input value="{{$item->id}}" type="checkbox" onclick="handleClick(this)" {{ $item->activo == 1 ? 'checked' : '' }} >
                            <span class="slider round"></span>
                          </label>

                    </td>
                    <td style="vertical-align:middle;  text-align:center;">
                        <form action="{{ route('deletewholesale', $item->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este item? Esta acción no se puede deshacer.');" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete-modern" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar permanentemente">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>

                    </tr>
                    <!--inicia modal -->
                   

                    @endforeach

                    @endif
                </tbody>
            </table>
            {{$wholesales->links()}}
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nuevo Wholesale Item</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="container-fluid">
                


                <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="clave" placeholder="Clave" class="form-control mb-2  
                        @error('clave')
                        alert alert-danger 
                        @enderror" value="{{ old('clave') }}" required>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2  
                        @error('nombre')
                        alert alert-danger 
                        @enderror" value="{{ old('nombre') }}" required>
                    </div>
                    <div class="col-md-3">
                        <input type="number" name="cantidad" placeholder="Cantidad" class="form-control mb-2  
                        @error('dantidad')
                        alert alert-danger 
                        @enderror" value="{{ old('cantidad') }}" required>
                    </div>
                    
                    <div class="col-md-12">Detalles
                         <textarea class="ckeditor form-control" name="detalles" required></textarea>
                    </div>
                    
                    <div class="col-md-12">Wholesale Item
                        <input type="file" name="material" class="form-control mb-2
                        @error('material')
                        alert alert-danger
                        @enderror" value="{{ old('material') }}" required>
                    </div>
                </div>

        </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary btn-sm">Agregar</button>

        </div>
        </div>
        </form>
    </div>
    </div>


@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    function handleClick(cb) {
    /*alert ("Clicked, new value = " + cb.value);*/
   window.location.href="actwholesale/"+ cb.value ;
   }
   </script>
         <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

