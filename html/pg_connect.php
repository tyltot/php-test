<html>
   <head>
      <title>Check Postgres Server Connection</title>
   </head>
   <body>
      <?php
         $host        = "host = docker.for.mac.host.internal";
         $port        = "port = 5432";
         $dbname      = "dbname = schaeffer_order";
         $credentials = "user = jtoth password=";
        //  $dbname      = "dbname = elements";
        //  $credentials = "user = elements password=";

         echo "<p>In PhP</p>";
         
         $conn = pg_connect( "$host $port $dbname $credentials"  );
         if(!$conn) {
            echo "Error : Unable to open database\n";
         } else {
            echo "<p>Opened database successfully</p>";
            // echo the connection response
            echo "<p>
            \$Connection: ". $conn. "
            </p>";
         }
      ?>
   </body>
</html>
