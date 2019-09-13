<?php
    session_start();
    # connect to db
    include 'Dbconnection.php';
    $con = OpenCon();
if(isset($_POST['Submit'])){
    
    $error1="";
    $error2="";
    $error3="";
    $error4="";
    $error5="";
    $error6="";
    $error7="";


    $fname = $_POST['FirstName'];
    $lname = $_POST['LastName'];
    $email= $_POST['Email'];
    $phone= $_POST['Phone'];
    $comments=$_POST['Comments'];
    

if(empty($fname))
 {
  $error1= "Enter your fisrt name !";
 }
 else if(!ctype_alpha($fname))
 {
  $error2 = "\r\n"."Alphabets only For first Name!";
   }
if(empty($lname))
 {
  $error3 = "\r\n"."Enter your last name !";
 }
else if(!ctype_alpha($lname))
 {
  $error4 = "\r\n"."Alphabets only  for Last Name!";
   }
 if(empty($email))
 {
  $error5 = "\r\n"."enter your email !";
  
 }
 else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email))
 {
  $error6= "\r\n"."Not valid email !";
 }
  if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone))
 {
  $error7 = "\r\n"."Enter 10 digit phone number in required pattern!";
  
 }

 if ($error1!="" ||$error2!=""||$error3!=""||$error4!=""||$error5!="" ||$error6!=""||$error7!="" )
 {

			 echo $error1.$error2.$error3.$error4.$error5.$error6.$error7;
   }


else
{

 	mysqli_autocommit($con,FALSE);
	$query="INSERT INTO contactus (fname,lname,email,phone,comments) VALUES ('$fname','$lname','$email','$phone','$comments')";
    mysqli_query($con,$query);
	echo "Data inserted Successfully..!!";


    # commit
    mysqli_commit($con);
}
}
    #close connection
    CloseCon($con);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/pet.css">
	<meta name="meta" content="width=device-width">
<!--<script type="text/javascript" >
	function validateForm() {
			if(document.myForm.FirstName.value == "" )
			{
				alert( "Please provide FirstName name!" );
                 document.myForm.FirstName.focus() ;
                 return false;
			}
		else if (!/^[a-zA-Z]*$/g.test(document.myForm.FirstName.value)) 
			{
        alert("Invalid characters in FirstName");
        document.myForm.FirstName.focus();
        return false;
		}
		else if (document.myForm.LastName.value == "" )
			{
				alert( "Please provide your Lastname!" );
                 document.myForm.LastName.focus() ;
                 return false;
			}
		else if (!/^[a-zA-Z]*$/g.test(document.myForm.LastName.value)) 
			{
        alert("Invalid characters in Last Name");
        document.myForm.LastName.focus();
        return false;
		}
		else if (!myForm.Email.value) {
          alert("Please enter your Email Address");
            myForm.Email.focus();
             return false;
   }
     
         else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g.test(myForm.Email.value))
        {
   
      alert("You have entered an invalid email address!");
    return (false);
         }

      else if(document.myForm.Phone.value=="")
            	{
            		return (true);
            	}
   
    else if ((!/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/g.test(myForm.Phone.value)))
           {
           
            	alert("Please enter valid Phone Number");
            	myForm.Phone.focus();
            	return (false);
            }
            

        return (true);
    }
	</script>-->
	<title>Pet Store Website</title>
</head>
<body>
<div id= wrapper>
	<h1>Pet Store</h1>
	<div class= "row">
	<div class= "leftcolumn" style="background-color: #90C7E3">
	<nav>
		<a href="index.php">Home</a>  
		<a href=" AboutUs.php">  About Us</a> 
		<a href="contactUs.php" >Contact Us</a> 
		<a href="client.php"  >Client</a> 
		<a href="service.php">Service</a>
		<a href="Login.php">Login</a>		
	</nav>
</div>
<div class= "rightcolumn">
	<img src="images/petstoreimage4.png" alt="petstoreimage" width="100%">
	<form  name= "myForm" method ="POST" action="#" onsubmit="return (validateForm());">	
		<h2>Contact Us</h2>
		<p>Required Information is marked with an asterisk(*)</p>
	<table class= "container" cellspacing="15" >
		<tr>
			<td >* First Name:</td>
			<td>
				<input type="text" name="FirstName" required /></td>
		</tr>
		<tr>
			<td>* Last Name:</td>
			<td>
				<input type="text" name="LastName" required /></td>
			</td>
		</tr>
		<tr>
			<td>* E-mail:</td>
			<td>
				<input type="email" name="Email" required /></td>
			</td>
		</tr>
		<tr>
			<td>Phone:</td>
			<td>
				<input type="text" name="Phone"  /></td>
			</td>
		</tr>
		<tr >
			<td style="padding-bottom: 35px;">* Comments:</td>
			<td>
				<textarea rows="3" cols="25" name="Comments"></textarea>
			</td>
		</tr>
		<tr>
			<td>
				<input type="Submit" name="Submit" value="Submit"/></td>
			</td>
		</tr>
		
	</table>
</form>
	
	<footer>
		<p><small><em>Copyright &copy;2018 Pet Store<br>
			<a href="mailto:navyasree@atluri.com"onmouseover="this.style.color='blue';"><u>navyasree@atluri.com</u></a></em></small></p>
	</footer> </div>
</div>
</div>
</body>
</html>