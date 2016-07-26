<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


  </head>
  
  <body>
    
      <br><br><br><br><br>
      <div class="col-md-5"></div>
      <center>
      <form method="POST" action="../php/validar.php">
        <div class = "container">
          <div class="wrapper">
            <div class="col-md-3">
              <div class="panel panel-danger">
              <form action="" method="post" name="Login_Form" class="form-signin">       
                <h3 class="form-signin-heading">Bienvenido Confecciones Virtual</h3>
                <hr class="colorgraph"><br>
                <input type="text" class="form-control" name="user" placeholder="Usuario" required=""/>
                <input type="password" class="form-control" name="passw" placeholder="Contraseña" required=""/>          
                <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit"><span class="glyphicon glyphicon-log-in"></span> Login</button>
              </form>
              </div>     
            </div>
          </div>
        </div>
        </center>
      </form>
  </body>
</html>