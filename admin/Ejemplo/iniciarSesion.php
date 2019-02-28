<?php
$enlace = mysqli_connect("localhost", "root", "", "presupuestos");

if (!$enlace) {
    header('location: index.php');
}
else
{
	echo "Si se conecto";
}


 $Usuario=$_REQUEST["username"];
 $Contraseña=$_REQUEST["password"];
 $sql       = 'SELECT * FROM usuarios';
 $resultado = $enlace->query($sql);

  if (!$resultado) {
      echo "Error de BD, no se pudo consultar la base de datos\n";
      echo "Error MySQL: " . $enlace->connect_error;
      header('location: CodigoError.html');
      exit;
  }
  $row_cont = $resultado->num_rows;
  $contU = 0;
  $contC = 0;
  $cont = 1;


   if($row_cont > 0)
   {
      for($i = 0; $i <$row_cont; $i++)
      {
          mysqli_data_seek ($resultado, $i);
          $extraido= mysqli_fetch_array($resultado);
          if($Usuario == $extraido['Nombre'] && $Contraseña == $extraido['Contra'])
           {
            session_start();
            $_SESSION['usuario']=$extraido['Nombre'];
            $_SESSION['id']=$extraido['id'];
              header('location: Admin/index.php');
            }
        }
   }
mysqli_close($enlace);
?>