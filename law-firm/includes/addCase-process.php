<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    require_once('connection.php');
    global $con;
    
    //assigning variables to null...
    $nameErr = $nameErr1 = $onameErr = $onameErr1 = $phoneErr = $phoneErr1 = $emailErr = $emailErr1 = $genderErr = $genderErr1 = $dateErr = $caseErr = $lawyerErr = "";
    $name = $name1 = $oname = $oname1 = $email = $email1 = $gender = $gender1 = $date = $case = $lawyer = "";

if (isset($_POST['submit'])) {
        $name =     $_POST['psname'];
        $oname =    $_POST['poname'];
        $name1 =    $_POST['dsname'];
        $oname1 =   $_POST['doname'];
        $email =    $_POST['email'];
        $email1 =   $_POST['email1'];
        $gender =   $_POST['gender'];
        $gender1 =  $_POST['gender1'];
        $date =     $_POST['date'];
        $case =     $_POST['case'];
        $lawyer =   $_POST['specialist'];
    //validations.
    if (empty($_POST["psname"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["psname"]);
    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
      $nameErr = "Only letters and white space allowed";
    }
    }

    if (empty($_POST["poname"])) {
    $nameErr = "Name is required";
  } else {
    $oname = test_input($_POST["poname"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $oname)) {
      $onameErr = "Only letters and white space allowed";
    }
    }
    
    if (empty($_POST["dsname"])) {
    $nameErr1 = "Name is required";
  } else {
    if (!preg_match("/^[a-zA-Z ]*$/", $name1)) {
      $nameErr1 = "Only letters and white space allowed";
    }
    }
        
    if (empty($_POST["doname"])) {
    $onameErr1 = "Name is required";
  } else {
    $oname1 = test_input($_POST["doname"]);
    if (!preg_match("/^[a-zA-Z ]*$/", $oname1)) {
      $onameErr1 = "Only letters and white space allowed";
    }
    }
    
    if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
    }
    
    if (empty($_POST["email1"])) {
    $emailErr1 = "Email is required";
  } else {
    $email1 = test_input($_POST["email1"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr1 = "Invalid email format";
    }
    }

    if (empty($_POST["case"])) {
        $caseErr = "Case is required";
      } else {
        if(strlen($case) > 100) {
        $caseErr = "Use 100 characters or less.";
      }
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
      } else {
        $gender = test_input($_POST["gender"]);
        if(strlen($gender) > 10){
            $genderErr = "Gender is too lengthy";
        }
      }

    if (empty($_POST["gender1"])) {
        $genderErr1 = "Gender is required";
      } else {
        $gender = test_input($_POST["gender1"]);
        if(strlen($gender) > 10){
            $genderErr1 = "Gender is too lengthy";
        }
      }
    
     $sql = "INSERT INTO contacts (posted_at, name, email, phone, msg) VALUES (NOW(),'$name', '$email', '$phone', '$msg')";
            
            $exec = mysqli_query($con, $sql);
            if($exec){
                echo "<div class='alert alert-success'>
                    <strong>Thank You For Contacting Us!<br>We Shall Get Back To You Shortly.</strong><br>
                    <button class='btn btn-primary btn-sm'><a href='contact_us.php' class='ok'>OK</a></button>
                 </div>";
                exit();
                
}

function test_input ($data) {
    $data   = trim($data);
    $data   = stripcslashes($data);
    $data   = htmlspecialchars($data);
    return  $data;
}

?>