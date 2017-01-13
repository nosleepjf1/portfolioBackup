 <?php

 $EmailFrom = Trim(stripslashes($_POST['Email']));
 $EmailTo = "jonnyfewkes@hotmail.com";
 $Subject = "Coming from my Portfolio Website";
 $Name = Trim(stripslashes($_POST['Name']));
 $Email = Trim(stripslashes($_POST['Email']));
 $Message = Trim(stripslashes($_POST['Message']));

 // validation
 $validationOK=true;
 if (!$validationOK) {
   print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
   exit;
 }

 // prepare email body text
 $Body = "";
 $Body .= "Name: ";
 $Body .= $Name;
 $Body .= "\n";
 $Body .= "Email: ";
 $Body .= $Email;
 $Body .= "\n";
 $Body .= "Message: ";
 $Body .= $Message;
 $Body .= "\n";


 // Check if name has been entered
         if (!$_POST['name']) {
             $errName = 'Please enter your name';
         }

         // Check if email has been entered and is valid
         if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
             $errEmail = 'Please enter a valid email address';
         }

         //Check if message has been entered
         if (!$_POST['message']) {
             $errMessage = 'Please enter your message';
         }


 // send email
 $success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

 // redirect to success page
 if ($success){
   print "<meta http-equiv=\"refresh\" content=\"0;URL=index.html\">";
 }
 else{
   print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
 }
 ?>