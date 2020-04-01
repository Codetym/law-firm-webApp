
<html>
    <head>
        <title>Received Messages</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/formValidations.js"></script>
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="css/sign_in.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=roboto[Courgette]Pacificio:400,700">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.min.css">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<!--<link rel="stylesheet" type="text/css" href="css/dmj.css">-->
        <style>
            div{
                margin-left: 20%;
                width: 40%;
            }
            .container{
                align-content: center;
            }
            .horizontal-list{
                width: 100%;
                height: 16%;
                background-color: black;
                color: white;
                padding: 18px;
                margin-top: 0px;
                z-index: 1;
                position: fixed;
            }
            li{
                list-style-type: none;
            }
            li a{
                
                text-decoration: none;
                color: white;
                font-weight: bolder;
                text-align: center;
                margin-left: 50px;
                
            }
            a:hover{
                text-decoration: none;
            }
            .form-inline>*{
                margin-left: 90px;
            }
            h2{
                text-align: center;
                color: green;
                font-weight: bolder;
            }
             #leftbox { 
                float:left;  
                background:#f1f1f1; 
                width:25%; 
                height:500px;
                margin-right: 1%;
            } 
            #middlebox{ 
                float:left;  
                background:#f1f1f1; 
                width:48%; 
                height:500px; 
            } 
            #rightbox{ 
                float:right; 
                background:#f1f1f1; 
                width:25%; 
                height:500px;
                margin-left: 1px;
            } 
            h1{ 
                color:green; 
                text-align:center; 
            } 
            .mySlides {display:inline-block;
            }
        </style>
    </head>
    <body>
        <ul class="horizontal-list">
            <form action="" method="get" class="form-inline">
            <li><button class="btn btn-primary btn-lg"><b><a href="index.php">BACK TO WEBSITE</a></b></button></li>
            <li><button class="btn btn-primary btn-lg"><b><a href="admin_home.php">CONTROL PANEL</a></b></button></li>
            <li><button class="btn btn-danger btn-lg"><b><a href="logout.php">LOGOUT</a></b></button></li>
            </form>
        </ul>
        <br><br><br><br><br>
        
        <h2>Recived Messages</h2>
        <div class="container alert alert-warning">
            <?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    require_once('includes/connection.php');
    include_once('includes/contsct-us-process.php');
    global $con;

     //display Entries
    $entries = mysqli_query($con, "SELECT posted_at, name, email, phone, msg FROM contacts ORDER BY posted_at DESC");

    if(mysqli_num_rows($entries) == 0){
        echo  "<div class='alert alert-danger'>
        <strong>No Messages Yet!</strong>
     </div>";
    }
    else{
        while($entries_row = mysqli_fetch_assoc($entries)){
            $time = $entries_row['posted_at'];
            $name = $entries_row['name'];
            $email = $entries_row['email'];
            $phone = $entries_row['phone'];
            $msg = $entries_row['msg'];

            echo "
                <div class='alert alert-danger'>
                <div class='alert alert-primary container-fluid'><strong>Posted By: <span style='color: red; font-weight: bolder;'>$name</span> <br>
                <b>Email: <span style='color: steelblue; font-weight: bolder;'><a href='#'>$email</a></b><br></span>Phone: <span style='font-weight: bolder;'><a href='#'>$phone</span><br>
                Date: <small>$time</small></strong><br>
                <span style='color: black; font-size: 18px;'>$msg</span>
                </div>
                </div>

            ";
        }
    }
?>
        </div>
        
         <div id = "boxes">
              
            <div id = "leftbox"> 
                <h2>Learn:</h2> 
                <p style="margin: 5px 5px 5px 5px;">It is a good platform to learn programming. 
                It is an educational website. Prepare for 
                the Recruitment drive  of product based  
                companies like Microsoft, Amazon, Adobe  
                etc with a free online placement preparation  
                course.</p> 
            </div>  
              
            <div id = "middlebox">
            <div class="w3-content w3-section">
                  <img class="mySlides" src="hotel.jpg" style="width:100%; height: 100%;">
                  <img class="mySlides" src="room1.jpg" style="width:100%; height: 100%;">
                  <img class="mySlides" src="room2.jpg" style="width:100%; height: 100%;">
                  <img class="mySlides" src="room3.jpg" style="width:100%; height: 100%;">
                  <img class="mySlides" src="room4.jpg" style="width:100%; height: 100%;">
                  <img class="mySlides" src="room5.jpg" style="width:100%; height: 100%;">
            </div>

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 3000); // Change image every 3 seconds
}
</script> 
            </div> 
              
            <div id = "rightbox"> 
                <p style="margin: 5px 5px 5px 5px;">
                Any geeks can help other geeks by writing 
                articles on the GeeksforGeeks, publishing 
                articles follow few steps that are Articles 
                that need little modification/improvement 
                   from reviewers are published first.
                </p> 
            </div> 
        </div>
    </body>
</html>