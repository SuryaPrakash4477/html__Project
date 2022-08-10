<html>
<body>
<?php
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $datebirth = $_POST['datebirth'];
    $tech = $_POST['tech'];
    // $resume = $_FILES['resume'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $city = $_POST['city'];

    //database connection
    $conn = new mysql('localhost','root','','job_registration_details');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into registration (firstname, lastname, gender, datebirth, tech, email, number, password, address, city)
        values ('$firstname', '$lastname', '$gender', '$datebirth', '$tech', '$email', '$number', '$password', '$address', '$city')");
        $stmt->bind_param("sssisssisss", $firstname, $lastname, $gender, $datebirth, $tech, $email, $number, $password, $address, $city);
        $stmt->execute();
        echo "Registration Successfully...";
        $stmt->close();
        $conn->close();
    }

?>
</body>
</html>