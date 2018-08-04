<!--Time_between-->
<!--https://api.spacexdata.com/v2/launches/latest-->
<!--https://api.spacexdata.com/v2/launches?flight_number=61-->

<!doctype html>
<html lang="en">
    <head>
        <title>Test_06_time_draw_file</title>
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
  
            function time_show($a){
                $date_floor = floor($a / 86400);
                $hour = floor(($a - ($date_floor * 86400)) / 3600);
                for($s=0; $s<=$date_floor; $s++){
                    echo "|||";
                }
                echo "$date_floor";
            }
        
            for($i=1; $i<=$num; $i++){
                $t = ($i + 1);
                echo "Mission: ".$i." ".$object[$i]['mission_name']."<br>";
                
                $time_bet = ($object[$t]['launch_date_unix'] - $object[$i]['launch_date_unix']); 

                time_show($time_bet);
                echo "<br>";
                
            }

        ?>   
    </body>
</html>