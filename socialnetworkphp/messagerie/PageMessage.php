<!DOCTYPE html>
<html>
<title>Pas de reload</title>
<head>
<script src="http://code.jquery.com/jquery-latest.js"></script>

<link href="PageContact.php">

</head>
<body>
   <?php

   //session_start();
   //$stock=$_SESSION['transmet'];
   //$stock2=$_SESSION['user_id'];
   
   ?>

  <form id="myForm" method="POST">
     
     Name:    <input name="name" id="name" type="text" /><br />
     message:   <input name="message" id="message" type="text" /><br />


    <input name="valider" type="button" id="ButtonValider" value="Submit" />
   </form>


   <div id="results">

   </div>



   <script src="js.js"></script>


</body>
</html>