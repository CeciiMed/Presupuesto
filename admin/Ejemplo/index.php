<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">
<head>
    <title>LOGIN</title>

    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="static/css/index.css" >

</head>
<style type="text/css">
    body{
        background-image: url(static/img/F1.jpg);
    }
</style>
<body>
    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="static/img/user.png" :src="/img/user.png"/>
                </div>
                <form class="col-12" action="iniciarSesion.php" method="get">
                    <div class="form-group" id="user-group">
                        <input type="text" class="form-control" placeholder="Nombre de usuario" name="username"/>
                    </div>
                    <div class="form-group" id="contrasena-group">
                        <input type="password" class="form-control" placeholder="Contrasena" name="password"/>
                    </div>
                   <a href="Admin/index.html"> <button type="submit" class="btn btn-success"><i class="fas fa-sign-in-alt"></i>  Ingresar </button></a>
                </form>
              <!--  <div th:if="${param.error}" class="alert alert-danger" role="alert">
		            Invalid username and password.
		        </div>
		        <div th:if="${param.logout}" class="alert alert-success" role="alert">
		            You have been logged out.
		        </div>-->
            </div>
        </div>
    </div>
</body>
</html>
