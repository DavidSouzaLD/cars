<?php
include ("./connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Carros</title>
</head>

<body>
    <h1>Painel de buscas</h1>
    <form method="GET">
        <input name="search" type="text" placeholder="Searching..."
            value="<?php if (isset($_GET["search"]))
                echo $_GET["search"]; ?>">
        <button type="submit">Search</button>
    </form>
    <table border="1">
        <tr>
            <th>Manufacturer</th>
            <th>Model</th>
            <th>Vehicle</th>
        </tr>
        <?php
        if (!isset($_GET["search"])) {
            ?>
            <tr>
                <td colspan="3">Search not found!</td>
            </tr>
            <?php
        } else {
            $search = $mysqli->real_escape_string($_GET["search"]);
            $sql_code = "SELECT * 
            FROM veiculo 
            WHERE fabricante LIKE '%$search%' 
            OR modelo LIKE '%$search%'
            OR veiculo LIKE '%$search%'";

            $sql_query = $mysqli->query($sql_code) or die("Error in resultas!" . $mysqli->error);

            if ($sql_query->num_rows == 0) {
                ?>
                <tr>
                    <td colspan="3">No results found!</td>
                </tr>
                <?php
            } else {
                while ($data = $sql_query->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $data["fabricante"] ?></td>
                        <td><?php echo $data["veiculo"] ?></td>
                        <td><?php echo $data["modelo"] ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
            <?php
        }
        ?>
    </table>
</body>

</html>