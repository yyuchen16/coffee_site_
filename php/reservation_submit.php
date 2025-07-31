<?php
// 資料庫連線資訊
$host = "localhost";
$username = "root";
$password = "";
$dbname = "cafe_site";

// 建立連線
$conn = new mysqli($host, $username, $password, $dbname);

// 檢查連線
if ($conn->connect_error) {
    die("連線失敗: " . $conn->connect_error);
}

// 接收表單資料
$cafe_name = $_POST['cafe_name'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$time_slot = $_POST['time_slot'];

// 插入資料到資料表
$sql = "INSERT INTO reservations (cafe_name, name, phone, time_slot) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $cafe_name, $name, $phone, $time_slot);

if ($stmt->execute()) {
    echo "預約成功！<a href='reservation_form.php'>回預約表單</a>";
} else {
    echo "預約失敗：" . $stmt->error;
}

$stmt->close();
$conn->close();
?>
