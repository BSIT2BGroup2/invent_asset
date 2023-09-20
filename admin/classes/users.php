<?php 
    function failed_query($failed_query){
        global $con;
        if(!$failed_query){
            die('QUERY FAILED' . mysqli_error($con));
        }
    }

    function edit_profile($user_id, $firstname, $lastname, $email){
        global $con;

        $stmt = $con->prepare("UPDATE users SET user_firstname = ?, user_lastname = ?, user_email = ? WHERE user_id = ?");
        $stmt->bind_param('sssi', $firstname, $lastname, $email, $user_id);
        $stmt->execute();
        $stmt->close();
        #$edit_profile = $con->query("UPDATE users SET user_firstname = '$firstname', user_lastname = '$lastname', user_email = '$email' WHERE user_id = '$user_id'");

        failed_query($stmt);
        header("Location: index.php?page=user_profile");
    }

    function edit_pass($user_id, $userName, $password, $new_pass, $confirm_pass){
        global $con;
        $pass_query = $con->query("SELECT * FROM users WHERE user_id = '$user_id'");
        $pass = $pass_query->fetch_array();

        if($pass['user_password'] != $password){
            // If Old Password is not eqaul to the input Old Password
            echo "old password";
            header("Location: index.php?page=user_profile");
        }else if($new_pass != $confirm_pass){
            // If New Password is not eqaul to the Confirm Password
            echo "Not same password";
            header("Location: index.php?page=user_profile");
        }else{
            $stmt = $con->prepare("UPDATE users SET user_password = ? WHERE user_id = ?");
            $stmt->bind_param('si', $new_pass, $user_id);
            $stmt->execute();
            $stmt->close();
            #$update_pass = $con->query("UPDATE users SET user_password = '$new_pass' WHERE user_id = '$user_id'");
            failed_query($stmt);
            header("Location: index.php?page=user_profile");
        }
    }

    function change_role($user_id, $select_role){
        global $con;
        if($select_role != 'Delete'){
            foreach($user_id as $key => $value){
                $stmt = $con->prepare("UPDATE users SET user_role=? WHERE user_id=?");
                $stmt->bind_param('si', $select_role, $value);
                $stmt->execute();
                $stmt->close();

                if(!$stmt){
                    die('QUERY FAILED' . mysqli_error($con));
                }
            }
            header('Location: index.php?page=users');
        }else if($select_role == 'Delete'){
            foreach($user_id as $key => $value){
                $stmt = $con->prepare("DELETE FROM users WHERE user_id=?");
                $stmt->bind_param('i', $value);
                $stmt->execute();
                $stmt->close();

                if(!$stmt){
                    die('QUERY FAILED' . mysqli_error($con));
                }
            }
            header('Location: index.php?page=users');
        }
    }

?>