<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "cafe_site";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("連線失敗：" . $conn->connect_error);
}

if (isset($_POST['cafe'])) {
    $cafe = $_POST['cafe'];

    // 將投票資料寫入 votes 資料表
    $stmt = $conn->prepare("INSERT INTO votes (cafe_name) VALUES (?)");
    if ($stmt === false) {
        die("SQL 準備失敗：" . $conn->error);
    }

    $stmt->bind_param("s", $cafe);
    
    if ($stmt->execute()) {
        echo "感謝你的投票！<br>";
        echo '<a href="results.php">查看投票結果</a>';
    } else {
        echo "投票失敗：" . $stmt->error;
    }

    $stmt->close();
} else {
    echo "請選擇一間咖啡廳再投票。";
}

$conn->close();
?>
