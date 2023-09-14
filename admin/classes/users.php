<?php 
    function failed_query($failed_query){
        global $con;
        if(!$failed_query){
            die('QUERY FAILED' . mysqli_error($con));
        }
    }

    function edit_profile($user_id, $firstname, $lastname, $email){
        global $con;

        $edit_profile = $con->query("UPDATE users SET user_firstname = '$firstname', user_lastname = '$lastname', user_email = '$email' WHERE user_id = '$user_id'");

        failed_query($edit_profile);
        header("Location: index.php?page=user_profile");
    }

    function edit_pass($user_id, $userName, $password, $new_pass, $confirm_pass){
        global $con;
        $pass_query = $con->query("SELECT * FROM users WHERE user_id = '$user_id'");
        $pass = $pass_query->fetch_array();

        if($pass['user_password'] != $password){
            // If Old Password is not eqaul to the input Old Password
            header("Location: index.php?page=user_profile");
        }else if($new_pass != $confirm_pass){
            // If New Password is not eqaul to the Confirm Password
            header("Location: index.php?page=user_profile");
        }else{
            $update_pass = $con->query("UPDATE users SET user_password = '$new_pass' WWHERE user_id = '$user_id'");
        }
    }

?>