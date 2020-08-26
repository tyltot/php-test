<html>
   <head>
      <title>Fetching Data from Postgres Server</title>
   </head>
   <body>
        <style>
         td,th {
            border: solid black 1px;
            font-size: 30px;
            width: 200px;
         }
        </style>
        <table>
         <tr>
            <th>Name</th>
            <th>Email</th>
         </tr>
      <?php
         $host        = "host = docker.for.mac.host.internal";
         $port        = "port = 5432";
         $dbname      = "dbname = schaeffer_order";
         $credentials = "user = jtoth password=";
        //  $dbname      = "dbname = elements";
        //  $credentials = "user = elements password=";

         error_log("In PHP", 0);
         
         $conn = pg_connect( "$host $port $dbname $credentials"  );
         if(!$conn) {
            echo "Error : Unable to open database\n";
            error_log("ERROR: Unable to open database, $conn", 0);
         } else {
            error_log("Opened database successfully! Connection, $conn", 0);
         }

         // pass the connect instance to the pg_query() method
         $response = pg_query($conn, "SELECT * FROM ce_acl_account");

         // iterate through a row of results
         // print name
         // & external_id to table
         while ($row = pg_fetch_array($response)) {
            echo
                "<tr>
                <td>{$row['name']}</td>
                <td>{$row['external_id']}</td>
                </tr>";
         }

         pg_close($conn);
      ?>
   </body>
</html>
