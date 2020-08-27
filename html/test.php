<?php

   $host        = "host = docker.for.mac.host.internal";
   $port        = "port = 5432";
   $dbname      = "dbname = elements";
   $credentials = "user = elements password=";

   echo "In PhP\n";
   error_log("In PhP", 0);

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database\n";
      error_log("Unable to open database", 0);
   } else {
      echo "Opened database successfully\n";
      error_log("Opened database successfully $db", 0);
   }

   echo $_POST["name"];
   echo $_POST["email"];
   echo $_POST["subject"];
   echo $_POST["message"];
?>