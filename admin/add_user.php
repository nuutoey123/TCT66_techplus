<?php
// เริ่ม session
session_start();

// ตรวจสอบว่าผู้ใช้เป็น admin หรือไม่
if ($_SESSION['role'] != 'admin') {
    die('คุณไม่มีสิทธิ์ในการเพิ่มผู้ใช้');
}

// เชื่อมต่อฐานข้อมูล
include __DIR__ . '/../config/config.php';  

// รับข้อมูลจากฟอร์ม
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับข้อมูลจากฟอร์ม
    $username = $_POST['username'];
    $password = $_POST['password']; // รหัสผ่านที่กรอกเข้ามา
    $role = $_POST['role']; // เลือกว่าเป็น admin หรือ viewer

    // แฮชรหัสผ่าน
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);  // ใช้ BCRYPT เพื่อแฮชรหัสผ่าน

    // ตรวจสอบว่าผู้ใช้ซ้ำในระบบหรือไม่
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "ชื่อผู้ใช้นี้มีอยู่แล้ว!";
    } else {
        // เพิ่มผู้ใช้ใหม่
        $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss', $username, $hashed_password, $role);  // ส่งค่าที่รับมาและแฮชรหัสผ่าน
        if ($stmt->execute()) {
            echo "เพิ่มผู้ใช้สำเร็จ!";
        } else {
            echo "เกิดข้อผิดพลาดในการเพิ่มผู้ใช้!";
        }
    }
}
?>
