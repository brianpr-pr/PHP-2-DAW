<!DOCTYPE html>
<html>
    <head>
        <title>Actividad 2 servidor</title>
    </head>
    <body>
        <?php
            session_start();
        ?>
        <form action="login.php" method='POST'>
            <label>Nombre de usuario:</label>
            <input name="usuario" type="text">
            <label>Contraseña de usuario:</label>
            <input name="contraseña" type="text">
            <button type='submit'>Enviar</button>
        </form>
    </body>
</html>