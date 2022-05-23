<?php
$servername='localhost';
		$username='u596252984_sabi';
		$password='Nancy3690#';
      $db = 'u596252984_trackingusers';
      #connecting database
      static $conn;
      if ($conn == NULL){ 
      $conn = new mysqli($servername, $username, $password, $db); 
      }
      return $conn;
 ?>