<!--Time_between-->
<!--https://api.spacexdata.com/v2/launches/latest-->
<!--https://api.spacexdata.com/v2/launches?flight_number=61-->

<!doctype html>
<html lang="en">
    <head>
        <title>Test_05_time_between</title>
    </head>
    <body>
        <?php
            echo "Data:";
            echo "<br>";
            
            $json = file_get_contents('data/all.json');
            $obj = json_decode($json, true);
        
            $object = new stdClass();
                foreach ($obj as $key => $value)
                {
                    $object->$key = $value;
                }
        
            $object = get_object_vars($object);

            $num = 66;
            $time = 0;
        
            function time_cal($a){
                $date_floor = floor($a / 86400);
                $hour = floor(($a - ($date_floor * 86400)) / 3600);
                echo $date_floor." Days ".$hour." Hours"."<br>";
            }
        
            for($i=1; $i<=$num; $i++){
                echo "Mission: ".$i." ".$object[$i]['mission_name']."<br>";
                
                $time_bet = ($object[$i]['launch_date_unix'] - $time); 
                $time = $object[$i]['launch_date_unix']; 
                /*echo ($time_bet / 86400)."<br>";*/
                time_cal($time_bet);
            
            }
        
            time_cal(1494890);
        

            /*print_r($object);*/

        ?>   
    </body>
</html>