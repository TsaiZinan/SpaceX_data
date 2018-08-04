<!--https://api.spacexdata.com/v2/launches/latest-->
<!--https://api.spacexdata.com/v2/launches?flight_number=61-->

<!doctype html>
<html lang="en">
    <head>
        <title>Test_08.1_display_in_block</title>
    </head>
    <body>
        <?php
            echo "Data:";
            echo "<br>";
            
            $json = file_get_contents('https://api.spacexdata.com/v2/launches/all');
            $obj = json_decode($json, true);
        
            $object = new stdClass();
                foreach ($obj as $key => $value)
                {
                    $object->$key = $value;
                }
        
            $object = get_object_vars($object);

            $num = 60;
  
            /*function time_show($a){
                $date_floor = floor($a / 86400);
                $hour = floor(($a - ($date_floor * 86400)) / 3600);
                for($s=0; $s<=$date_floor; $s++){
                    echo "|||";
                }
                echo "$date_floor";
            }*/
        
            /*for($i=1; $i<=$num; $i++){
                $t = ($i + 1);
                echo "Mission: ".$i." ".$object[$i]['mission_name']."<br>";
                
                $time_bet = ($object[$t]['launch_date_unix'] - $object[$i]['launch_date_unix']); 

                time_show($time_bet);
                echo "<br>";   
            }*/
        
        
            for($i=10; $i<=$num; $i++){
                
                echo "Mission: ".$i." ".$object[$i]['mission_name']."<br>";
                
                
                echo "
                <table border='1'>
                    <tr>
                        <th rowspan='4'><img src='".$object[$i]['links']['mission_patch_small']."'</th>
                        <th>Mission ".$object[$i]['flight_number'].": </th>
                        <td>".$object[$i]['mission_name']."</td>
                    </tr>
            
                    <tr>
                        <td colspan='2'>".$object[$i]['launch_date_utc']."</td>
                    </tr>
            
                    <tr>
                        <th>Core: </th>
                        <td>".$object[$i]['rocket']['cores']['core_serial']."</td>
                    </tr>
            
                    <tr>
                        <th>Site: </th>
                        <td>".$object[$i]['launch_site']['site_name']."</td>
                    </tr>
            
            
                </table>
                
                ";
                
                
                
                
                
                
                
                
                
                
                
                
                echo "<br>";   
            }
        
        
        
        
        

        ?>   
    </body>
</html>