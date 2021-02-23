<?php
    $host = 'localhost';
    $username = 'root';
    $password = 'pavan07254';
    $dbname = 'student_login';

    //creat connection

    $conn = mysqli_connect($host,$username,$password,$dbname);

    //check connection 

    if(mysqli_connect_errno())
    {
        echo 'fail to connect';
        exit();
    }
    echo "conaction sucsseful";

    // tack input from user

    $uname = $_POST['username'];
    $pass = $_POST['password'];

    //write a query for login

    $sql = "SELECT * FROM student_info WHERE name='$uname' and pass = '$pass'";

    if(!mysqli_query($conn , $sql))
    {
        echo 'unalbe to login';
    }
    $result = mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //$active = $row['active'];
    
    $count = mysqli_num_rows($result);
    
    
    if($count == 1)
    {
       // session_register("name");
        //$_SESSION['login_user']= $uname;
        echo '<br> welcom';
        header("location: main_page.html");
    }
    else {
        $error = " Your Login Name or Password is invalid";
        echo "<br>plz check";
    }
    
?>