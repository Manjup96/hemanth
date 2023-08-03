<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'Form') or die("Connection Failed:" . mysqli_connect_error());

    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['bgroup'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $bgroup = $_POST['bgroup'];

        $sql = "INSERT INTO `users` (`name`, `email`, `phone`, `bgroup`) VALUES (?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phone, $bgroup);

        if (mysqli_stmt_execute($stmt)) {
            echo 'Entry Successful';
        } else {
            echo 'Error Occurred';
        }
    }
}
?>
