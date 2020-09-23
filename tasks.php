<?php
session_start();
if (isset($_SESSION['tasks'])) {
    $tasks = $_SESSION['tasks'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Feladatok</title>
</head>

<body>
    <div>
        <?php
        if (isset($tasks)) :
        ?>
            <p>
                <h3>A felhasználó 20 legutóbb módosított feladata</h3>
            </p>
            <table>
                <tr>
                    <th>Feladat neve</th>
                    <th>Feladat leírása</th>
                    <th>Feladat utolsó módosításának dátuma</th>
                </tr>
                <?php
                foreach ($tasks as $updated_on => $task) :
                    $date = new DateTime("@$updated_on");
                    $timezone = new DateTimeZone('Europe/Budapest');
                    $date->setTimezone($timezone);
                    $updated_on = $date->format('Y-m-d H:i:s');
                ?>
                    <tr>
                        <td><?= $task['name'] ?></td>
                        <td><?= $task['body'] ?></td>
                        <td><?= $updated_on ?></td>
                    </tr>
            <?php
                endforeach;
            else :
                echo 'A feladatokat nem lehet megjeleníteni';
            endif;
            ?>
            </table>
    </div>

</body>

</html>