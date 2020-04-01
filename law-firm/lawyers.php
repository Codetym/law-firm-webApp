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
    <title>Lawyers</title>
        <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width-device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=roboto[Courgette]Pacificio:400,700">
    
    <link rel="stylesheet" type="text/css" href="../css/sign_up.css">
	<link rel="stylesheet" type="text/css" href="../css/home.css">
    <link rel="stylesheet" type="text/css" href="../css/dmj.css">
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
            margin: 20px;
            padding: 5px;
        }
    
        h2{
            align-content: center;
            color: green;
            font-weight: bolder;
            background-color: #333;
        }
        .delete{
            font-size: 48px;
            color: black;
            border-radius: circle;
            align-self: center;
            margin-left: 40%;
        }
        .delete:hover{
            color: red;
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
        <h2>List Of All Lawyers In The Company</h2>
            
         <div class="bs-example">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                    </div>
                    <?php
                    require_once 'includes/connection.php';
                    global $con;
                    $result = mysqli_query($con, "SELECT user_id, user_name, user_email, user_country, user_gender FROM users");
                    ?>
 
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                      <table class='table table-bordered table-striped'>
                       
                      <tr>
                        <th>Serial No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>Gender</th>
                         <th>Delete User</th>
                      </tr>
                    <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <th><?php echo $row["user_id"]; ?></th>
                        <th><?php echo $row["user_name"]; ?></th>
                        <th><?php echo $row["user_email"]; ?></th>
                        <th><?php echo $row["user_country"]; ?></th>
                        <th><?php echo $row["user_gender"]; ?></th>
                         <th><?php echo "<a href='includes/delete-users.php?id=".$row['user_id']."'><i class='fa fa-trash delete'></i></a>"; ?></th>
                    </tr>
                    <?php
                    $i++;
                    }
                    ?>
                    </table>
                     <?php
                    }
                    else{
                        echo "No result found";
                    }
                    ?>
                </div>
            </div>        
        </div>
    </div>
            
        </center>
        
    
    </body>
</html>
<?php } ?>