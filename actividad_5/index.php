<?php session_start()?>
<!DOCTYPE html>
<html>
<head>
    <title>Actividad 5 PHP</title>
    <meta charset="UTF-8">
</head>
<body>
    <?php
        require_once 'connect.php';
        $validForm = true;
        //What to do with the sessions:
        $_SESSION['nombreUsuario'] = $_POST['nombreUsuario'];
        if(emailValidation( $_POST['emailUsuario'] ) ){
            $_SESSION['emailUsuario'] = $_POST['emailUsuario'];
        } else{
            $_SESSION['emailUsuario'] = null;
            $validForm = false;
        }
        if(passwordValidation($_POST['contraseñaUsuario'],$_POST['contraseñaUsuarioDos'])){
            $_SESSION['contraseñaUsuario'] = $_POST['contraseñaUsuario'];
            $_SESSION['contraseñaUsuarioDos'] = $_POST['contraseñaUsuarioDos'];
        } else{
            $_SESSION['contraseñaUsuario'] = null;
            $_SESSION['contraseñaUsuarioDos'] = null;
            $validForm = false;
        }
    ?>
    
    <h2>Registro</h2>
    
    <form method="POST">
        <label for="nombreUsuario">Nombre de usuario</label>
        <input type="text" name="nombreUsuario" value='<?php echo $_SESSION['nombreUsuario'];?>'>
        <br>
        <label for="emailUsuario">Email de usuario</label>
        <input type="text" name="emailUsuario" value='<?php echo $_SESSION['emailUsuario'];?>'>
        <br>
        <label for="contraseñaUsuario">Contraseña de usuario</label>
        <input type="password" name="contraseñaUsuario" value='<?php echo $_SESSION['contraseñaUsuario'];?>'> 
        <br>
        <label for="contraseñaUsuarioDos">Contraseña de usuario</label>
        <input type="password" name="contraseñaUsuarioDos" value='<?php echo $_SESSION['contraseñaUsuarioDos'];?>'>
        <br>
        <button type="submit">Enviar</button>  
    </form>

    <h2><a href="login.php">Ya tienes cuenta de usuario, pincha aquí</a></h2>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "actividad_5";

        if(isset($_POST['nombreUsuario'], 
        $_POST['contraseñaUsuario'], 
        $_POST['contraseñaUsuarioDos'],
        $_POST['emailUsuario'])){

            if($validForm){
                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

                    // prepare sql and bind parameters
                    $stmt = $conn->prepare("INSERT INTO users (name_user, email_user, password_user)
                    VALUES (:name_user, :email_user, :password_user)");
                    $stmt->bindParam(':name_user', $name);
                    $stmt->bindParam(':email_user', $email);
                    $stmt->bindParam(':password_user', $passwrd);

                    // insert a row
                    $name = $_POST['nombreUsuario'];
                    $email = $_POST['emailUsuario'];
                    $passwrd = password_hash($_POST['contraseñaUsuario'], PASSWORD_DEFAULT);
                    $stmt->execute();

                    echo "<h2>New records created successfully</h2>";

                } catch(PDOException $e) {
                    echo "<br>" . $e->getMessage();
                }
                $conn = null;
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
                    $stmt = $conn->prepare("SELECT email_user FROM users WHERE email_user=:email");
                    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    if(!$row){
                        return true;
                    }
                } catch(PDOException $e) {
                    echo "<br>" . $e->getMessage();
                }
                $conn = null;
        }
        return false;
    }

    function passwordValidation($passwordUno,$passwordDos){
        if($passwordUno == $passwordDos){
            return true;
        }
        return false;
    }
    ?>
</body>
</html>