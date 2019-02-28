<?php
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	$query_perfil=mysqli_query($con,"select * from perfil where id=1");
	$rw=mysqli_fetch_assoc($query_perfil);
	$sql=mysqli_query($con, "select LAST_INSERT_ID(id) as last from presupuestos order by id desc limit 0,1 ");
	$rws=mysqli_fetch_array($sql);
	$numero=$rws['last']+1;
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Script PHP para control de notas de gastos" />
    <meta name="author" content="Obed Alvarado" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Presupuesto de trabajo - <?php echo $rw['nombre_comercial'];?></title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- Libreria de Bootstrap XD -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <!-- CUSTOM STYLE CSS -->

    <link href="assets/css/style.css" rel="stylesheet" />
	<link rel=icon href='http://obedalvarado.pw/img/logo-icon.png' sizes="32x32" type="image/png">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
</head>
<body >
<!-- Estilos que nos permite personalizar colores y formas -->
<style type="text/css">
	
	.azul{
		background-color: #5A75FC; 
	}
</style>
<!-- Acaban Estilos-->

<!-- Barra de Navegacion u operaciones -->

<nav class="navbar navbar-expand-sm azul navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link text-white" data-toggle="modal" data-target="#ModalClientes">Registrar clientes</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" data-toggle="modal" data-target="#ModalPresupuestos">Consultar presupuestos</a>
    </li>
  </ul>
</nav>

<!--Termina Barra de Navegacion -->

<!--Empieza Modal para clientes -->

<div class="modal" id="ModalClientes">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Esto es la cabezera/Titulo del modal -->
      <div class="modal-header azul">
        <h4 class="modal-title text-white">Registrar Clientes</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button><!-- El icono de cerrar-->
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      		<!-- Formulario para el registro del usuario-->
	      		<form action="/action_page.php">
	      			<!-- TextBox para el primer elemento del cliente que es nombre-->
					  <div class="form-group">
					    <label for="nombre">Nombre del cliente:</label>
					    <input type="text" class="form-control" id="nombre" placeholder="Nombre">
					  </div>
					  <!-- Acaba Textbox del nombre -->

					  <!-- Textbox para el segundo elemento del cliente que es el telefono-->
					  <div class="form-group">
					    <label for="telefono">Telefono:</label>
					    <input type="text" class="form-control" id="telefono" placeholder="834-457-5740">
					  </div>
					  <!-- Acaba Textbox del telefono -->

					   <!-- Textbox para el Tercer elemento del cliente que es el email-->
					  <div class="form-group">
					    <label for="email">Email:</label>
					    <input type="email" class="form-control" id="email" placeholder="Ejemplo@example.com"> 
					  </div>
					  <!-- Acaba Textbox del Email -->

					   <!-- Textbox para el Cuarto elemento del cliente que es la direccion-->
					  <div class="form-group">
					    <label for="direccion">Direccion:</label>
					    <input type="text" class="form-control" id="direccion" placeholder="678, Lamen Trees Lane,Boston Bay"> 
					  </div>
					  <!-- Acaba Textbox del Email -->

					  <button type="submit" class="btn btn-primary">Registrar</button>
				</form>
      		<!-- Termina el formulario del registro del usuario -->
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<!-- Termina Modal para clientes -->

<!-- Empieza Modal para presupustos -->

<div class="modal" id="ModalPresupuestos">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header azul">
        <h4 class="modal-title text-white">Consultar Presupuestos</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      		<!-- Formulario para el registro del usuario-->
	      		<form action="/action_page.php">

	      			<!-- TextBox para el primer elemento de como buscar presupuestos que es nombre-->
					  <div class="form-group">
					    <label for="nombre">Nombre del cliente:</label>
					    <input type="text" class="form-control" id="nombre" placeholder="Nombre">
					  </div>
					  <!-- Acaba Textbox del nombre -->

					  <!-- TextBox para el segundo elemento de como buscar presupuestos que es la fecha-->
					  <div class="form-group">
					    <label for="fecha">Fecha del presupuesto:</label>
					    <input type="date" class="form-control" id="fecha">
					  </div>
					  <!-- Acaba Textbox del Fecha -->
					  

					

					  <button type="submit" class="btn btn-primary">Consultar</button>
				</form>
      		<!-- Termina el formulario del registro del usuario -->
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<!-- Termina Modal para presupuestos -->

	<!-- No Modificar despues de este comentario -->
    <div class="container outer-section" >
        
       <form class="form-horizontal" role="form" id="datos_presupuesto" method="post">
        <div id="print-area">
                  <div class="row pad-top font-big">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <a href="https://obedalvarado.pw/" target="_blank">  <img src="assets/img/logo.png" alt="Logo sistemas web" /></a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <strong>E-mail : </strong> <?php echo $rw['email'];?>
                    <br />
                    <strong>Teléfono :</strong> <?php echo $rw['telefono'];?> <br />
					<strong>Sitio web :</strong> <?php echo $rw['web'];?> 
                   
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <strong><?php echo $rw['nombre_comercial'];?>  </strong>
                    <br />
                    Dirección : <?php echo $rw['direccion'];?> 
                </div>

            </div>
          
            
            

            <div class="row ">
			<hr />
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <h2>Detalles del cliente :</h2>
                     <select class="cliente form-control" name="cliente" id="cliente" required>
						<option value="">Selecciona el cliente</option>
					</select>
                    <span id="direccion"></span>
                    <h4><strong>E-mail: </strong><span id="email"></span></h4>
                    <h4><strong>Teléfono: </strong><span id="telefono"></span></h4>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <h2>Detalles del presupuesto de trabajo :</h2>
                    <h4><strong>Presupuesto #: </strong><?php echo $numero;?></h4>
                    <h4><strong>Fecha: </strong> <?php echo date("d/m/Y");?></h4>
				
								
                    <textarea  class="form-control" id="descripcion" name="descripcion"  required placeholder="Ingresa la descripción del proyecto" ></textarea>
                    
                  
                </div>
            </div>
            
         
            <div class="row">
			<hr />
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped  table-hover">
                            <thead>
                                <tr>
                                    <th class='text-center'>Item</th>
									<th>Descripción</th>
									<th class='text-center'>Cantidad</th>
                                    <th class='text-right'>Precio unitario</th>
                                    <th class='text-right'>Total</th>
									<th class='text-right'></th>
                                </tr>
                            </thead>
                            <tbody class='items'>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
           
           
            
		
        </div>
       <div class="row"> <hr /></div>
        <div class="row pad-bottom  pull-right">
		
            <div class="col-lg-12 col-md-12 col-sm-12">
                <button type="submit" class="btn btn-success ">Guardar presupuesto</button>
             
              

                
            </div>
        </div>
		</form>
    </div>
	<form class="form-horizontal" name="guardar_item" id="guardar_item">
			<!-- Modal -->
			<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Nuevo Ítem</h4>
				  </div>
				  <div class="modal-body">
					
					  <div class="row">
						<div class="col-md-12">
							<label>Descripción del producto/servicio</label>
							<textarea class="form-control" id="descripcion" name="descripcion"  required></textarea>
							<input type="hidden" class="form-control" id="action" name="action"  value="ajax">
						</div>
						
					  </div>

					  <div class="row">
						<div class="col-md-6">
							<label>Cantidad</label>
							<input type="text" class="form-control" id="cantidad" name="cantidad" required>
						</div>
						
						<div class="col-md-6">
							<label>Precio unitario</label>
						  <input type="text" class="form-control" id="precio" name="precio" required>
						</div>
						
					  </div>
				
					
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-info" >Guardar</button>
					
				  </div>
				</div>
			  </div>
			</div>
	</form>
	
   
</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $( ".cliente" ).select2({        
    ajax: {
        url: "ajax/clientes_json.php",
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                q: params.term // search term
            };
        },
        processResults: function (data) {
            return {
                results: data
            };
        },
        cache: true
    },
    minimumInputLength: 2
}).on('change', function (e){
		var email = $('.cliente').select2('data')[0].email;
		var telefono = $('.cliente').select2('data')[0].telefono;
		var direccion = $('.cliente').select2('data')[0].direccion;
		$('#email').html(email);
		$('#telefono').html(telefono);
		$('#direccion').html(direccion);
})
});

	function mostrar_items(){
		var parametros={"action":"ajax"};
		$.ajax({
			url:'ajax/items.php',
			data: parametros,
			 beforeSend: function(objeto){
			 $('.items').html('Cargando...');
		  },
			success:function(data){
				$(".items").html(data).fadeIn('slow');
		}
		})
	}
	function eliminar_item(id){
		$.ajax({
			type: "GET",
			url: "ajax/items.php",
			data: "action=ajax&id="+id,
			 beforeSend: function(objeto){
				 $('.items').html('Cargando...');
			  },
			success: function(data){
				$(".items").html(data).fadeIn('slow');
			}
		});
	}
	
	$( "#guardar_item" ).submit(function( event ) {
		parametros = $(this).serialize();
		$.ajax({
			type: "POST",
			url:'ajax/items.php',
			data: parametros,
			 beforeSend: function(objeto){
				 $('.items').html('Cargando...');
			  },
			success:function(data){
				$(".items").html(data).fadeIn('slow');
				$("#myModal").modal('hide');
			}
		})
		
	  event.preventDefault();
	})
	$("#datos_presupuesto").submit(function(){
		  var cliente = $("#cliente").val();
		  var descripcion = $("#descripcion").val();
		 
		  
		  if (cliente>0)
		 {
			VentanaCentrada('./pdf/documentos/presupuesto.php?cliente='+cliente+'&descripcion='+descripcion,'Presupuesto','','1024','768','true');	
		 } else {
			 alert("Selecciona el cliente");
			 return false;
		 }
		 
	 });
		

		mostrar_items();
		
		
</script>
</html>
