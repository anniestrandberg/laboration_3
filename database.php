<?php

class DATABASE {

    // För att slippa återupprepa koden för att ansluta till min databas lägger jag den som en egen funktion.
    function connect(){
        $servername = "localhost";
        $username = "fish_admin";
        $password = "1234";
        $dbname = "fishmarket";

        $conn = new mysqli($servername, $username, $password, $dbname);

        mysqli_set_charset( $conn, 'utf8');

        if ($conn->connect_error) {
            'Det uppstod ett problem vid anslutningen.';
        }    

        return $conn;
    }

    //För att kunna lägga till nya värden och "produkter" skapar jag en function som Raderar alla producter som först finns och sedan uppdaterar databasen med nya värden.

    function add_new_products(){
        $conn = DATABASE::connect();
        
        // Tömmer hela tabellen.
        $deleteAll = "TRUNCATE TABLE `products`";
        $conn->query($deleteAll);

        //Alla mina produkter jag vill lägga till i tabellen.
        $sql = "INSERT INTO `products` (`name`, `category`, `price`, `place`, `calories`)
        VALUES
         ('torsk', 'fisk', 199,'alaska', 100 ),
         ('lax', 'fisk', 159,'östersjön', 345 ),
         ('hälleflundra', 'fisk', 99,'atlanten', 12 ),
         ('öring', 'fisk', 249,'medelhavet', 84 ),
         ('röding', 'fisk', 199,'svarta havet', 90 ),
         ('makrill', 'fisk', 49,'alaska', 110 ),
         ('sill', 'fisk', 59,'alaska', 114 ),
         ('aborre', 'fisk', 199,'stilla havet', 180 ),
         ('svärdfisk', 'fisk', 189,'östersjön', 338 ),
         ('gädda', 'fisk', 119,'östersjön', 328 ),
         ('plattfisk', 'fisk', 119,'indiska oceanen', 368 ),
         ('clownfisk', 'fisk', 199,'nordvästatlanten', 199 ),
         ('blåsfisk', 'fisk', 299,'medelhavet', 233 ),
         ('haj', 'fisk', 119,'östersjön', 38 ),
         ('tonfisk', 'fisk', 119,'svarta havet', 188 ),
         ('räkor', 'skaldjur', 349,'alaska', 89 ),
         ('monsterkrabba', 'skaldjur', 199,'svata havet', 78 ),
         ('romsås', 'tillbehör', 119,'västkusten', 339 ),
         ('dillsås', 'tillbehör', 119,'västkusten', 398 ),
         ('räkröra', 'tillbehör', 199,'västkusten', 312 )";

        if ($conn->query($sql) === TRUE) {
            echo 'Nya produkter tillagda i databasen.';
        } else {
            echo 'Det uppstod ett problem.';
        }

        $conn->close();

    }

    // Det här är funktionen som hämtar den produkt man skickar in som argument.

    function get_products($name){
        $products = [];
        $single_product = false;
        $categories = ['fisk', 'skaldjur', 'tillbehör'];
    
        // Skapar en anslutning till vår databas
        $conn = DATABASE::connect(); 
    
        // En if-sats som gör att det antingen hämtas en produkt, en kategori, eller alla produkter.

        if(!in_array($name, $categories) && $name !== 'alla'){
            // EN PRODUKT
            $single_product = true;
            $sql = "SELECT * FROM `products` WHERE `name`='$name'";
        } elseif (in_array($name, $categories)){
            // EN KATEGORI
            $sql = "SELECT * FROM `products` WHERE `category`='$name'";
        } else {
            // ALLA PRODUKTER
            $sql = "SELECT * FROM `products`";
        }
        
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
    
                // Om det som hämtas bara är en produkt, tilldela $products den produkten.
                if($single_product == true){
                    $products = $row;
                } else {
                    // Om det som hämtas är flera produkter. Använda array_push() för att tilldela $products alla produkter.
                    array_push($products, $row);
                }
    
            }
    
        // Om det inte finns något att hämta i databasen som matchar prouktnamnet.
        } else {
            echo 'Inget kunde hittas i databasen.';
        }

        $conn->close();
        
        // Slutligen, returnera produkten eller produkterna som hämtats från databasen.    
        return $products;
    }
    
}

?>