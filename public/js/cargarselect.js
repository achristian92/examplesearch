 function CargarProductos() {
         var citi = $('#cities').val();
         if (citi != "") {
             $('#fecha').empty();
             $('#nro_dias').empty();
             $.ajax({
                 async: false,
                 type: 'GET',
                 url: 'cargar_fecha_nrodias/' + citi,
                 data: {},
                 dataType: 'json',
                 success: function(data) {
                     $('#fecha').append('<option value="">::Seleccionar::</option>');
                     $('#nro_dias').append('<option value="">::Seleccionar::</option>');
                     $.each(data, function(i, value) {
                         $('#fecha').append('<option value="' + value.fecha_salida + '">' + value.fecha_salida + '</option>');
                         $('#nro_dias').append('<option value="' + value.nro_dias + '">' + value.nro_dias + '</option>');
                     });
                 },
                 error: function(jqXHR, status, err) {
                     alert("Local error callback.");
                 }
             });
         } else {
             $('#fecha').empty();
             $('#nro_dias').empty();
             $('#fecha').append('<option value="">::Seleccionar::</option>');
             $('#nro_dias').append('<option value="">::Seleccionar::</option>');

         }
     }