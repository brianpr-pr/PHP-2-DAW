<?php
session_start();
error_reporting(E_ALL & ~E_WARNING); // Show all errors except warnings
?>
<!DOCTYPE html>
<html>
<head>
    <title>Actividad 5 PHP</title>
    <meta charset="UTF-8">
</head>
<body>
    <?php
        $validForm = true;        
        if(emailValidation( $_POST['emailUsuario'] ) ){
            $_SESSION['emailUsuario'] = $_POST['emailUsuario'];
        } else{
            $_SESSION['emailUsuario'] = null;
            $validForm = false;
        }
    ?>
    
    <h2>Inicio de sesión</h2>
    
    <form method="POST">
        <label for="emailUsuario">Email de usuario</label>
        <input type="text" name="emailUsuario" value='<?php echo $_SESSION['emailUsuario'];?>'>
        <br>
        <label for="contraseñaUsuario">Contraseña de usuario</label>
        <input type="password" name="contraseñaUsuario"> 
        <br>
        <button type="submit">Enviar</button>  
    </form>

    <?php
        if(isset($_POST['contraseñaUsuario']) && $validForm){
            if(userLogin($_POST['emailUsuario'],$_POST['contraseñaUsuario'])){
                $_SESSION['logged'] = true;
                header("Location: logged.php");
            } else{
                echo "You aren't logged";
            }
        }

    function emailValidation($email){
        $resultado = filter_var($email, FILTER_VALIDATE_EMAIL);
        if($resultado){
            $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "actividad_5";
            try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    // prepare sql and bind parameters
                    $stmt = $conn->prepare("SELECT name_user, email_user FROM users WHERE email_user=:email LIMIT 1");
                    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                    $stmt->execute();

                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($row){
                        $_SESSION['nombreUsuario'] = $row['name_user'];
                        echo $row;
                        return true;
                    }
                } catch(PDOException $e) {
                    echo "<br>" . $e->getMessage();
                }
                $conn = null;
        }
        return false;
    }


    function userLogin($email,$passwordUser){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "actividad_5";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // prepare sql and bind parameters
            $stmt = $conn->prepare("SELECT email_user, password_user FROM users WHERE email_user=:email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            //echo var_dump($user);
            if($user && password_verify($passwordUser, $user['password_user'])){
                return true;
            }
        } catch(PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
        $conn = null;
        return false;
    }
    ?>
</body>
</html>