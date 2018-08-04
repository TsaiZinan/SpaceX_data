<!--Url-->
<!--https://api.spacexdata.com/v2/launches/latest-->
<!--https://api.spacexdata.com/v2/launches?flight_number=61-->

<!doctype html>
<html lang="en">
    <head>
        <title>Test_03_url</title>
    </head>
    <body>
        <?php
            echo "Data:";
            echo "<br>";
            
            $json = file_get_contents('https://api.spacexdata.com/v2/launches/latest');
            $obj = json_decode($json, true);
            $num = $obj['flight_number'];
        
            for($i=59; $i<=$num;$i++){
                $url = "https://api.spacexdata.com/v2/launches?flight_number=".$i;
                /*echo $url;*/
                echo "<br>";
                $json = file_get_contents($url);
                
                $obj = str_replace('[{"flight','{"flight',$json);
                $obj = str_replace('."}]','."}',$obj);
                $obj = json_decode($obj, true);
                
                echo "Number: ";
                echo $i;
                echo "<br>";
                
                echo "Name: ";
                echo $obj['mission_name'];
                echo "<br>";
                
                echo "Time: ";
                echo $obj['launch_date_utc'];
                echo "<br>";
                
                echo "----------------------------------";
            }
        ?>   
    </body>
</html>