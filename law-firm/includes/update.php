<?php
// Include config file
require_once "connection.php";
 
// Define variables and initialize with empty values
$phone	= $appDate	= $appTime   = $email = "";
$phone_err	= $appDate_err	= $appTime_err   = $email_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["appointment_ID"]) && !empty($_POST["appointment_ID"])){
    // Get hidden input value
    $appointment_ID = $_POST["appointment_ID"];
    
    // Validate email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter an Email";
    } elseif(!filter_var($input_email, FILTER_VALIDATE_EMAIL)){
        $email_err = "Please enter a valid Email.";
    } else{
        $email = $input_email;
    }
    
    // Validate aphone number
    $input_phone = trim($_POST["phone"]);
    if(empty($input_phone)){
        $phone_err = "Please enter a Phone Number.";     
    } else{
        $phone = $input_phone;
    }
    
    // Validate appointment date
    $input_appDate = trim($_POST["appointment_date"]);
    if(empty($input_appDate)){
        $appDate_err = "Please enter Date Of Appointment.";     
    } 
    else{
        $appDate = $input_appDate;
    }
    
    // Validate appointment time
    $input_appTime = trim($_POST["appointment_time"]);
    if(empty($input_appTime)){
        $appTime_err = "Please enter Time Of Appointment.";     
    } 
    else{
        $appTime = $input_appTime;
    }
    
    // Check input errors before inserting in database
    if(empty($email_err) && empty($phone_err) && empty($appDate_err) && empty($appTime_err)){
        // Prepare an update statement
        $sql = "UPDATE appointments SET email=?, phone=?, appointment_date=?, appointment_time=? WHERE appointment_ID=?";
         
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_email, $param_phone, $param_appDate, $param_appTime, $param_appointment_ID);
            
            // Set parameters
            $param_email = $email;
            $param_phone = $phone;
            $param_appDate = $appDate;
            $param_appTime = $appTime;
            $param_appointment_ID = $appointment_ID;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: ../check-appointments.php");
                exit();
            } else{
                echo "Oops! Couldn't Update Now. Try Again Later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($con);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["appointment_ID"]) && !empty(trim($_GET["appointment_ID"]))){
        // Get URL parameter
        $appointment_ID =  trim($_GET["appointment_ID"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM appointments WHERE appointment_ID = ?";
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_appointment_ID);
            
            // Set parameters
            $param_appointment_ID = $appointment_ID;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $email = $row["email"];
                    $phone = $row["phone"];
                    $appDate = $row["appointment_date"];
                    $appTime = $row["appointment_time"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: ../check-appointments.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($con);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: ../check-appointments.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Appointment</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Appointment</h2>
                    </div>
                    <p>Please edit the input values and submit to update the Appointment.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                            <label>Phone</label>
                            <input type="phone" name="phone" class="form-control"<?php echo $phone; ?>>
                            <span class="help-block"><?php echo $phone_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($appDate_err)) ? 'has-error' : ''; ?>">
                            <label>Appointment Date</label>
                            <input type="date" name="appointment_date" class="form-control" value="<?php echo $appDate; ?>">
                            <span class="help-block"><?php echo $appDate_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($appTime_err)) ? 'has-error' : ''; ?>">
                            <label>Appointment Time</label>
                            <input type="time" name="appointment_time" class="form-control" value="<?php echo $appTime; ?>">
                            <span class="help-block"><?php echo $appTime_err;?></span>
                        </div>
                        <input type="hidden" name="appointment_ID" value="<?php echo $appointment_ID; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../check-appointments.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>