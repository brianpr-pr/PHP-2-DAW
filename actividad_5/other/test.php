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
    ?>
    
    <h2>Registro</h2>
    <?php
    //What to do with the sessions:
    $_SESSION['nombreUsuario'] = $_POST['nombreUsuario'];
    $_SESSION['emailUsuario'] = $_POST['emailUsuario'];
    $_SESSION['contraseñaUsuario'] = $_POST['contraseñaUsuario'];
    $_SESSION['contraseñaUsuarioDos'] = $_POST['contraseñaUsuarioDos'];
    ?>
    <form method="POST">
        <label for="nombreUsuario">Nombre de usuario</label>
        <input type="text" name="nombreUsuario" value='<?php echo $_SESSION['nombreUsuario'];?>'>
        <br>
        <label for="contraseñaUsuario">Contraseña de usuario</label>
        <input type="password" name="contraseñaUsuario" value='<?php echo $_SESSION['contraseñaUsuario'];?>'> 
        <button type="submit">Enviar</button>  
    </form>

    <h2>Datos del array de sesión:</h2>
    <?php echo var_dump($_SESSION);?>
</body>
</html>