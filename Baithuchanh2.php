<?php
// Tạo mảng học sinh
$students = [
    [
        "id" => 1,
        "name" => "Nguyen Van A",
        "age" => 18,
        "grade" => 8.5
    ],
    [
        "id" => 2,
        "name" => "Tran Thi B",
        "age" => 17,
        "grade" => 9.2
    ],
    [
        "id" => 3,
        "name" => "Le Van C",
        "age" => 18,
        "grade" => 7.8
    ]
];

// Hiển thị tất cả học sinh
echo "<h3>Danh sách học sinh</h3>";

foreach ($students as $student) {
    echo "ID: " . $student["id"] . "<br>";
    echo "Tên: " . $student["name"] . "<br>";
    echo "Tuổi: " . $student["age"] . "<br>";
    echo "Điểm: " . $student["grade"] . "<br><br>";
}

// Hàm tìm học sinh có điểm cao nhất
function findTopStudent($students) {
    $topStudent = $students[0];

    foreach ($students as $student) {
        if ($student["grade"] > $topStudent["grade"]) {
            $topStudent = $student;
        }
    }

    return $topStudent;
}

$topStudent = findTopStudent($students);

echo "<h3>Học sinh có điểm cao nhất</h3>";
echo "ID: " . $topStudent["id"] . "<br>";
echo "Tên: " . $topStudent["name"] . "<br>";
echo "Tuổi: " . $topStudent["age"] . "<br>";
echo "Điểm: " . $topStudent["grade"];
?>