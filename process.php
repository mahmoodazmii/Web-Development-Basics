<?php
$fullName = $_POST['fullName'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$hobbies = $_POST['hobbies'];

if (!empty($fullName) || !empty($email) || !empty($password) || !empty($gender) || !empty($hobbies)){
    $host = "localhost";
    $dbFullname = "root";
    $dbPassword = "";
    $dbname = "register";

    //create connection
    $conn = new mysqli($host, $dbFullname, $dbPassword, $dbname);

    if (mysqli_connect_error()){
        die ('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
    } else{
        $SELECT = "SELECT email From register Where email = ? Limit 1";
        $INSERT = "INSERT Into register (fullName, email, password, gender, hobbies) values(?, ?, ?, ?, ?)";

        //Prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum-> $stmt->num_row;

        if ($rnum==0) {
            $stmt->close();

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("ssssii", $fullName, $email, $password, $gender, $hobbies);
            $stmt->execute();
            echo "New Record inserted Successfully";
        } else {
            echo "Someone already register with this email";
        }
        $stmt->close();
        $conn->close();
    }
}

?>