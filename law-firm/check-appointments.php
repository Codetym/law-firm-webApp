<?php
    session_start();
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
     include_once('includes/connection.php');

    if (!isset($_SESSION['user_email'])) {
            header("Location:officials.php");
            exit();
	}
	else {
?>
<!doctype html>
<html>
    <head>
    <title>Appointments</title>
        <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=roboto[Courgette]Pacificio:400,700">
    
    <link rel="stylesheet" type="text/css" href="../css/sign_up.css">
	<link rel="stylesheet" type="text/css" href="../css/home.css">
    <link rel="stylesheet" type="text/css" href="../css/dmj.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.min.css">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src="jquery3.4.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/admin_home.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        .bs-example{
            margin-right: 0px;
        }
        .container{
            margin-left: 80px;
        }
    
        h2{
            align-content: center;
            color: green;
            font-weight: bolder;
            background-color: #333;
        }
        .edit{
            font-size: 48px;
            color: blue;
            border-radius: circle;
            display: block;
        }
        .edit:hover{
            color: red;
        }
        .delete{
            font-size: 48px;
            color: black;
            border-radius: circle;
            display: block;
        }
        .delete:hover{
            color: red;
        }
        .table table-bordered table-striped{
            padding: 10px;
        }
	</style>
        <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
    </head>
    <body>
        <center>
        <h2>Booked Appointments</h2>
            
         <!--<div class="bs-example">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                    </div>-->
                    <?php
                    require_once 'includes/connection.php';
                    global $con;
                    $result = mysqli_query($con, "SELECT appointment_ID, full_name, phone, appointment_date, appointment_time, specialist, office, gender, email, today FROM appointments ORDER BY appointment_ID DESC");
                    $id = $_post['appointment_ID'];
                    ?>
 
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                      <table class='table table-bordered table-striped' style="margin-left: 10px;">
                       
                      <tr style="color: #000; font-weight: bold;">
                        <th>Serial No</th>
                        <th>Full Name</th>
                        <th>Phone</th>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <th>Specialist</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Booking Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr style="font-weight: normal; text-size: small;">
                        <th><?php echo $row["appointment_ID"]; ?></th>
                        <th><?php echo $row["full_name"]; ?></th>
                        <th><?php echo $row["phone"]; ?></th>
                        <th><?php echo $row["appointment_date"]; ?></th>
                        <th><?php echo $row["appointment_time"]; ?></th>
                        <th><?php echo $row["specialist"]; ?></th>
                        <th><?php echo $row["gender"]; ?></th>
                        <th><?php echo $row["email"]; ?></th>
                        <th><?php echo $row["today"]; ?></th>
                        
                        <th><?php echo "<a href='includes/update.php?id=".$row['appointment_ID']."'><i class='fa fa-edit edit'></i></a>"; ?></th>
                        
                        <th><?php echo "<a href='includes/delete.php?id=".$row['appointment_ID']."'><i class='fa fa-trash delete'></i></a>"; ?></th>
                        
                        <?php
                            include_once('includes/connection.php');
                            global $con;
                            if (isset($_GET['delete'])) {
                                $del = $_GET['delete'];
                                $sql = "DELETE FROM appointments WHERE appointment_ID=" . $del;
                                mysqli_query($con, $sql);
                                exit();
                              }

                        
                        ?>
                    </tr>
                    
                    <?php
                    $i++;
                    }
                    ?>
                    <tr style="color: #000; font-weight: bold;">
                        <th>Serial No</th>
                        <th>Full Name</th>
                        <th>Phone</th>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <th>Specialist</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Booking Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </table>
                     <?php
                    }
                    else{
                        echo "No result found";
                    }
                    ?>
               <!-- </div>
            </div>
    </div>-->
            
        </center>
        
    
    </body>
</html>
<?php } ?>