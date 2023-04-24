
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <link rel="stylesheet" href="index.css">
        
        
    </head>
    <body>
        
            



        
        <table>
            <tbody>
                <?php

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "residentinfo";

                    $conn = new mysqli($servername, $username, $password, $database);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT * FROM game WHERE Name='Resident Evil 1'";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("Invalid query: " . $conn->error);
                    }

                    
                        
                    while($row = $result->fetch_assoc()){
                        echo "<h1 style='color:blue'>" . $row["Name"] . "</h1><br><h1>" . $row["Release"] . "</h1>";
                    }
                   

                    $conn->close();
                    
                ?> 
            </tbody>
        </table>
    </body>
</html>
