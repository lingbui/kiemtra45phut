<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "quan_ly_hoc_sinh";

try {
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Tạo database
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname");
    $pdo->exec("USE $dbname");

    // Tạo bảng
    $sql = "CREATE TABLE IF NOT EXISTS hoc_sinh(
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100),
        age INT,
        grade FLOAT
    )";
    $pdo->exec($sql);

    // Thêm dữ liệu mẫu
    $check = $pdo->query("SELECT COUNT(*) FROM hoc_sinh")->fetchColumn();

    if ($check == 0) {
        $pdo->exec("
            INSERT INTO hoc_sinh(name, age, grade)
            VALUES
            ('Nguyen Van A',18,8.5),
            ('Tran Thi B',17,9.2),
            ('Le Van C',18,7.8)
        ");
    }

    // Hiển thị danh sách học sinh
    echo "<h3>Danh sách học sinh</h3>";

    $students = $pdo->query("SELECT * FROM hoc_sinh");

    foreach ($students as $row) {
        echo "ID: {$row['id']} - ";
        echo "Tên: {$row['name']} - ";
        echo "Tuổi: {$row['age']} - ";
        echo "Điểm: {$row['grade']} <br>";
    }

    // Tìm học sinh điểm cao nhất
    $top = $pdo->query(
        "SELECT * FROM hoc_sinh ORDER BY grade DESC LIMIT 1"
    )->fetch();

    echo "<h3>Học sinh có điểm cao nhất</h3>";
    echo "ID: {$top['id']} - ";
    echo "Tên: {$top['name']} - ";
    echo "Tuổi: {$top['age']} - ";
    echo "Điểm: {$top['grade']}";

} catch(PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}
?>