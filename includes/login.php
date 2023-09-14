<?php 
    include ('../admin/database/db.php');
    session_start();
    if(isset($_POST['login'])){
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

        $user_email = mysqli_escape_string($con, $user_email);
        $user_password = mysqli_escape_string($con, $user_password);

        $login_query = $con->query("SELECT * FROM users WHERE user_email = '$user_email' AND user_password = '$user_password'");
        if(!$login_query){
            die("QUERY FAILED" . mysqli_error($con));
        }

        while($row = $login_query->fetch_array()){
            $db_user_id = $row['user_id'];
            $db_user_firstname = $row['user_firstname'];
            $db_user_lastname = $row['user_lastname'];
            $db_user_role = $row['user_role'];
            $db_user_email = $row['user_email'];
            $db_username = $row['username'];
            $db_user_password = $row['user_password'];
        }

        if($user_email == $db_user_email && $user_password == $db_user_password){
            $_SESSION['user_id'] = $db_user_id;
            $_SESSION['user_firstname'] = $db_user_firstname;
            $_SESSION['user_lastname'] = $db_user_lastname;
            $_SESSION['user_role'] = $db_user_role;
            $_SESSION['user_email'] = $db_user_email;
            $_SESSION['username'] = $db_username;
            header("Location: ../admin");
        }else{
            header("Location: ../index.php");
        }
    

    }


?>