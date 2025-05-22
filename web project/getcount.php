<?php
            
            $servername = "localhost"; 
            $username = "root"; 
            $password = ""; 
            $dbname = "myshop";
            $connection = new mysqli($servername, $username, $password, $dbname);
            
          
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }
            
            $query = "SELECT COUNT(*) AS total_rows FROM cart";
            $result = $connection->query($query);
            
            if ($result) {
                
                $row = $result->fetch_assoc();
                
          
                $totalRows = $row['total_rows'];
            } else {
               
                $totalRows = 0;
            }
            
         
            $connection->close();
            ?>