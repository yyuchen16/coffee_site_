<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "cafe_site";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("連線失敗：" . $conn->connect_error);
}

$sql = "SELECT cafe_name, COUNT(*) as votes FROM votes GROUP BY cafe_name ORDER BY votes DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>投票結果</title>
</head>
<body>
    <h2>目前投票結果：</h2>
    <ul>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row["cafe_name"] . "： " . $row["votes"] . " 票</li>";
        }
        ?>
    </ul>
    <a href="vote.php">回到投票頁面</a>
</body>
</html>

<?php
$conn->close();
?>
