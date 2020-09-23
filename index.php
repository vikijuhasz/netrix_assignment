<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Bejelentkezés</title>
</head>
<body>
    <div>
        <?php 
            if (isset($_SESSION['error'])) {
                echo ($_SESSION['error']); 
            } 
            unset($_SESSION['error']);
        ?>
        <p>A felhasználó feladatainak megtekintéséhez, add meg a levélben megadott email címet és jelszót:</p>
        <form method="post" action="app/controller.php">
            <b>E-mail</b>: <input type="text" name="email"><br><br>
            <b>Jelszó</b>: <input type="password" name="password"><br><br>
            <input type="submit" value="Feladatok megtekintése">
        </form>
    </div>
    
</body>
</html>