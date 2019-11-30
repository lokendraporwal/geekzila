<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "test");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$contact = mysqli_real_escape_string($link, $_REQUEST['contact']);
$company = mysqli_real_escape_string($link, $_REQUEST['company']);
$message =  mysqli_real_escape_string($link, $_REQUEST['message']);

// Attempt insert query execution
$sql = "INSERT INTO contact_us (name,email,contact,company,message) VALUES ('$name', '$email', '$contact','$company','$message')";
if(mysqli_query($link, $sql)){
	echo "<script type='text/javascript'>alert('submitted successfully!'); window.location.replace('http://localhost/geekzila/contactus.html');</script>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>