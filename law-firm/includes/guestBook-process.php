<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    require_once('connection.php');
    global $con;
    
    
    $errors     = array();
    
                
    
    if(isset($_POST['submit'])){
        $time   = time();
        $email  =   htmlentities(mysqli_escape_string($con, $_POST['email']));
        $msg    =   htmlentities(mysqli_escape_string($con, $_POST['message']));
        
        if(empty($email) || empty($msg)){
          $errors[] = "<div class='alert alert-danger'>
                    <strong>All Fields Are Required!</strong>
                </div>";
        }
        
        if(strlen($email) > 25 || strlen($msg) > 255){
            $errors[] = "<div class='alert alert-danger'>
                    <strong>Character Limit Exceeded!</strong>
                 </div>";
        }
        
        if(empty($errors)){
            $sql = "INSERT INTO guest_book (timestamp, email, message) VALUES (NOW(), '$email', '$msg')";
            
            $exec = mysqli_query($con, $sql);
            if($exec){
                echo "<div class='alert alert-danger'>
                    <strong>Posted!</strong>
                 </div>";
                
                
            }
            else{
                foreach($errors as $error){
                echo'<p><strong'.$error.'</strong></p>';
            }
        }
            
            //mysqli_close($con);
        }
        
    }
                //display Entries
                $entries = mysqli_query($con, "SELECT timestamp, email, message FROM guest_book ORDER BY timestamp DESC");
                
                if(mysqli_num_rows($entries) == 0){
                    echo  "<div class='alert alert-danger'>
                    <strong>No Comments Yet!</strong>
                 </div>";
                }
                else{
                    while($entries_row = mysqli_fetch_assoc($entries)){
                        $time = $entries_row['timestamp'];
                        $email = $entries_row['email'];
                        $msg = $entries_row['message'];
                        
                        echo "
                            <div class='alert alert-primary'><strong>Posted By <span style='color: red; font-weight: bolder;'>$email</span> on <small>$time</small></strong><br><span style='color: black;'>$msg</span></div>
                        
                        ";
                    }
                }

?>