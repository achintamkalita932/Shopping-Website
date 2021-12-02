<?php      

    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "login";  
      
    $con = mysqli_connect($host, $user, $password, $db_name); 

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $email = $_POST['usermail'];
        $pass = $_POST['password'];
        

        $sql = "insert into signup (usermail, password) values('$email', '$pass')";

        $result = mysqli_query($con, $sql);

        if ($result){
                echo "Thanks";
        }
    } 

    header("location:/works/ShoppingWebsite")
?>
