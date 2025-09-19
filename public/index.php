<?php
require_once "../src/Config/bootstrap.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello, world</title>
</head>

<body>
    <h1>Hello, world</h1>
    <p>
        <?php
        $conn = $db->getConnection();

        $stmt = $conn->query("SELECT NOW() AS date");
        $row = $stmt->fetch();

        echo "Data e hora atuais: " . $row["date"];
        ?>
    </p>
</body>

</html>