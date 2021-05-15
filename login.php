<?php
    $title = 'Inicio sesión'; 

    require_once 'includes/header.php'; 
    require_once 'db/conn.php'; 
    
    //If data was submitted via a form POST request, then...
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = strtolower(trim($_POST['username']));
        $password = $_POST['password'];
        $new_password = md5($password.$username);

        $result = $user->getUser($username,$new_password);
        if(!$result){
            echo '
            <div class="container mt-5">
                <div class="alert alert-danger">
                    Nombre de usuario o contraseña incorrecta, por favor vuelva a intentarlo. 
                </div>            
            </div>';
        }else{
            $_SESSION['username'] = $username;
            $_SESSION['userid'] = $result['id'];
            header("Location: viewrecords.php");
        }

    }
?>

<div class="container mt-5 mb-2">
    <h1 class="text-center"><?php echo $title ?> </h1>
    
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
            <table class="table table-sm">
                <tr>
                    <td><label for="username">Usuario: * </label></td>
                    <td><input type="text" name="username" class="form-control" id="username" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>">
                    </td>
                </tr>
                <tr>
                    <td><label for="password">Contraseña: * </label></td>
                    <td><input type="password" name="password" class="form-control" id="password">
                    </td>
                </tr>
            </table><br/><br/>
            <input type="submit" value="Entrar" class="btn btn-primary btn-block"><br/>
            <a href="#">Olvidé contraseña</a>
              
        </form>
</div>  

