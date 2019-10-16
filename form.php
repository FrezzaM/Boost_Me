<?php

  $displaymessage = "";

  if ($_POST){

    if (!$_POST["sender"]) {
        $displaymessage .= "A name is required.<br>";
    }
    if (!$_POST["senderEmail"]) {
        $displaymessage .= "An email address is required.<br>";
    }
    if (!$_POST["message"]) {
        $displaymessage .= "The message field is required.<br>";
    }
    if ($_POST['senderEmail'] && filter_var($_POST["senderEmail"], FILTER_VALIDATE_EMAIL) === false) {
        $displaymessage .= "The email address is invalid.<br>";
    }
    if ($displaymessage != "") {
        $displaymessage = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form:</p>' . $displaymessage . '</div>';
    }
    else {
      $recipient="boost.me.ptyltd@gmail.com";
      $webname="Boost Me";
      $webemail="boostme@boostmeptyltd.com";
      $subject="Email message from Boost Me website.";
      $sender=$_POST["sender"];
      $senderEmail=$_POST["senderEmail"];
      $message=$_POST["message"];

      $mailBody="Name: $sender\nEmail: $senderEmail\n\n$message";

      if(mail($recipient, $subject, $mailBody, "From: $webname <$webemail>")){
        $displaymessage = "Thank you! Your message has been sent. We will contact you within 24 hours.";
      }
      else{
        $displaymessage = "Your message couldn\'t be sent - please try again";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Boost Me</title>

  <!-- Bootstrap Scripts -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="css/styles.css">
  <link rel="icon" href="icon.ico">
  <link href="https://fonts.googleapis.com/css?family=Questrial|Vollkorn+SC:700" rel="stylesheet">
</head>

<body>
  <hr class = "bluehr"/>
  <hr />
  <div class="top-container">
    <img class="logo-image" src="images/boostmelogo.png" alt="Boost Me Logo">
    <br />
  </div>
  <hr />
  <hr class = "bluehr"/>

  <div class="content-container">

    <p>
     <? echo $displaymessage; ?>
    </p>

  </div>

  <div class="footer-container">
    <p class="copyright">© Copyright 2019 Boost Me Pty Ltd.</p>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>

</html>
