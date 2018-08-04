<!--Time_between-->
<!--https://api.spacexdata.com/v2/launches/latest-->
<!--https://api.spacexdata.com/v2/launches?flight_number=61-->

<!doctype html>
<html lang="en">
    <head>
        <title>Test_07_cut_the_date</title>
    </head>
    <body>
        <?php
            echo "Data:";
            echo "<br>";
            $json = file_get_contents('data/all.json');
            /*$json = file_get_contents('https://api.spacexdata.com/v2/launches/all');*/
            $obj = json_decode($json, true);
        
            $object = new stdClass();
                foreach ($obj as $key => $value)
                {
                    $object->$key = $value;
                }
        
            $object = get_object_vars($object);

            echo "Date: "." ".$object[50]['launch_date_utc']."<br>";
        
            $date = $object[50]['launch_date_utc'];
        
            echo $date."<br>";
        
            echo "Year: ".substr($date, -20, 4)."<br>";
            echo "Month: ".substr($date, -15, 2)."<br>";
            echo "Date: ".substr($date, -12, 2)."<br>";
        
            if(substr($date, -12, 2) > 16){
                echo "true";
            }else{
                echo "false";
            }
            
        
        
        
        
        
        
        
        
        
        
            

        ?>   
    </body>
</html>