<?php  

    session_start();

    if(isset($_POST['submit'])) {

        $u = $_POST['usermail'];  
        $p = $_POST['password']; 
        
        include("connection.php");
        $_SESSION['success'] = "";
             
        $sql = "select * from users where usermail = '$u' and password = '$p'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_assoc($result);  
        $count = mysqli_num_rows($result);  
        
        if($count == 1){  

                $_SESSION['success'] = true;
                $_SESSION['usermail']=$_POST['usermail'];
		 
        }  
        else{  
                echo "<h1> Login failed. Invalid username or password.</h1>";  
        } 

	header("location:/works/ShoppingWebsite") ;
    }

?>




