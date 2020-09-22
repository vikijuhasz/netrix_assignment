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
        <p>A felhasználó feladatainak megtekintéséhez, jelentkezz be a levélben megadott email cím és jelszó segítségével:</p>
        <form method="post" action="app/connect_and_make_request.php">
            <b>E-mail</b>: <input type="text" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"><br><br>
            <b>Jelszó</b>: <input type="password" name="password"><br><br>
            <input type="submit" value="Bejelentkezés">
        </form>
    </div>
    
</body>
</html>