<?php 
$errors = '';
$myemail = 'jamie.jansen@live.com';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['message']))
{
    $errors .= "\n Error: Alle velden zijn verplicht!";
}

$name = $_POST['name'];
$surname = $_POST['surname'];
$email_address = $_POST['email']; 
$message = $_POST['message'];
$radio1 = $_POST ['programma'];


if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Ongeldig e-mail adres";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Nieuwe inschrijving van: $name";
	$email_body = "Je hebt een nieuwe inschrijving ontvangen. ".
	"Hier zijn de details:\n Naam: $name \n Email: $email_address \n Bericht: \n $message";
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: contact-form-thank-you.html');
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>