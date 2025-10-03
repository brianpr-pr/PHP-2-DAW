<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <body>
        <h2>Press this button to log out</h2>
        <form>
            <button type="submit">salir de la cuenta</button>
        </form>
       <?php
            if(!$_SESSION['logged']){
                header("login.php");
            } 
            echo "<hw>Congratulations you are logged</h2>";
        ?> 
    </body>
</html>