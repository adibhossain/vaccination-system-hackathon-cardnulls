<?php 

session_start(); 

include "db_conn.php";



if (isset($_POST['nid']) && isset($_POST['password'])) {


    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $_nid = validate($_POST['nid']);

    $pass = validate($_POST['password']);

    if (empty($_nid)) {

        header("Location: index.php?error=User Name is required");

        exit();

    }else if(empty($pass)){

        header("Location: index.php?error=Password is required");

        exit();

    }else{

        $sql = "SELECT * FROM user WHERE nid='$_nid' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['nid'] === $_nid && $row['password'] === $pass) {

                //echo "Logged in!";

                $_SESSION['nid'] = $row['nid'];

                $_SESSION['user_name'] = $row['user_name'];

                $_SESSION['id'] = $row['id']; 
                
                $_SESSION['user_type'] = $row['user_type'];  

                if($row['user_type'] === '1' )
                {  
                   
                    header("Location: user_home.php");
                }
                else if($row['user_type'] === '0' )
                {
                   
                    header("Location: admin_home.php");
                }
                

                exit();

            }else{

                header("Location: index.php?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: index.php?error=Incorect User name or password");

            exit();

        }

    }

}else{

    header("Location: index.php");

    exit();

}

