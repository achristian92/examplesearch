<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script src="{{url('js/cargarselect.js')}}" type="text/javascript">
        </script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!-- Styles -->

        <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script> 
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
     
        <script type="text/javascript">
            $(document).ready(function(){  

            CargarProductos();

            $('#cities').select2();
        });
            </script>
<script>
$(document).ready(function(){
$("input[name=destino]").click(function () {   
var destino = $('input:radio[name=destino]:checked').val(); 
console.log(destino);
if(destino){
$('#cities').empty();
    $.ajax({
        async: false,
        type: 'GET',
        url: 'cargarcitios/' + destino,
        data: {},
        dataType: 'json',
        success: function(data) {
            console.log(data);
            $('#cities').append('<option value="">::Seleccionar::</option>');
            $.each(data, function(i, value) {
                console.log(value);
                $('#cities').append('<option value="' + value.name + '">' + value.name + '</option>');
            });
            
        },
        error: function(jqXHR, status, err) {
            alert("Local error callback.");
        }
    });
    
    }else{
        console.log("vacio");
    }
      
    });  

    }); 
         </script>
    </head>
 
    <body>
   
        @foreach ($destinations as $destino)
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="destino" id="destino" value="{{$destino->id}}">
        <label class="form-check-label" for="inlineRadio1">{{$destino->name}}</label>
        </div>
        @endforeach
        <form id="myForm" method="GET" action="{{route('page.search')}}">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="exampleFormControlSelect1">Destino</label>
                    <select class="form-control" id="cities" name="citiesname" onchange="CargarProductos(this.value);">
                      <option>.::Seleccionar::.</option>
                    </select>
                </div>
              <div class="form-group col-md-3">
                <label for="inputPassword4">Fecha</label>
                <select class="form-control" id="fecha" name="fechaname">
                        <option>.::Seleccionar::.</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="inputPassword4">Dias</label>
                <select class="form-control" id="nro_dias">
                        <option>.::Seleccionar::.</option>
                </select>
                <div id="respuesta"></div>
            </div>
            </div>
            <button type="submit" value="buscar">buscar</button>
        </form>
    </body>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>




    
 
    

    </html>
