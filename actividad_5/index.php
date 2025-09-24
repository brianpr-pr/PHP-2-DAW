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
    
    <form method="POST">
        <label for="nombreUsuario">Nombre de usuario</label>
        <input type="text" name="nombreUsuario">
        <br>
        <label for="emailUsuario">Email de usuario</label>
        <input type="email" name="emailUsuario">
        <br>
        <label for="contraseñaUsuario">Contraseña de usuario</label>
        <input type="text" name="contraseñaUsuario"> 
        <br>
        <button type="submit">Enviar</button>  
    </form>

    <?php
    
    if(isset($_POST['nombreUsuario'], 
    $_POST['contraseñaUsuario'], $_POST['emailUsuario'])){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "actividad_5";

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

        echo "New records created successfully";
        $_SESSION['nombreUsuario'] = $_POST['nombreUsuario'];
        $_SESSION['emailUsuario'] = $_POST['emailUsuario'];
        $_SESSION['contraseñaUsuario'] = $_POST['contraseñaUsuario'];

    } catch(PDOException $e) {
        echo "<br>" . $e->getMessage();
    }

    $conn = null;
    }
    ?>
</body>
</html>