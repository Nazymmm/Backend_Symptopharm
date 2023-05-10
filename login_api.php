<?php
 
 require "config.php";

 if ($_SERVER['REQUEST_METHOD'] == "POST"){

    $response = array();
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query_cek_user = mysqli_query($connection, "SELECT * FROM user WHERE email = '$email' " );
    $cek_user_result = mysqli_fetch_array($query_cek_user);

    if($cek_user_result){
      $query_login = mysqli_query($connection, "SELECT * FROM user WHERE email = '$email' && password = '$password' ");
      if ($query_login){

        $response['value'] = 1;
        $response['messaqe'] = "Yeah,login successfully";
        echo json_encode($response);
      } else{

        $response['value'] = 2;
        $response['messaqe'] = "Oops, login failed";
        echo json_encode($response);
      }
      
    }else {

        $response['value'] = 3;
        $response['message'] = "OOps, data is not registeres";
        echo json_encode($response);
    }
    }

 
 ?>