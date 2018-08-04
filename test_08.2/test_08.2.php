<!--https://api.spacexdata.com/v2/launches/latest-->
<!--https://api.spacexdata.com/v2/launches?flight_number=61-->

<!doctype html>
<html lang="en">
    <head>
        <title>Test_08.2_display_in_block_css</title>
        <link rel="stylesheet" type="text/css" href="test_08.2.css">
    </head>
    <body>
        <?php
            echo "<br>";
            
            /*import json file from API*/
            $json = file_get_contents('https://api.spacexdata.com/v2/launches/all');
            
            /*decode the json data*/
            $obj = json_decode($json, true);
        
            /*form the data as the key value pair*/
            $object = new stdClass();
                foreach ($obj as $key => $value)
                {
                    $object->$key = $value;
                }
        
            $object = get_object_vars($object);

            $num = 66;
  
            
        
        
            for($i=0; $i<=$num; $i++){
                
                

                $mission_patch_small = $object[$i]['links']['mission_patch_small'];
                $flight_number = $object[$i]['flight_number'];
                $mission_name = $object[$i]['mission_name'];
                $launch_date_utc = $object[$i]['launch_date_utc'];
                $core_reuse = $object[$i]['reuse']['core'];
                $site_name = $object[$i]['launch_site']['site_name'];
                
                if ($core_reuse == true){
                    $core_reuse = 'Yes';
                }else{
                    $core_reuse = 'No';
                }
                
                echo <<<HTML
                <br>
                <br>
                <div>
                <table>
                    <tr>
                        <th rowspan="3" id="img"><img src="$mission_patch_small"/></th>
                        <th id="number">$flight_number</th>
                        <td id="time">$launch_date_utc</td>
                    </tr>
            
                    <tr>
                        <td colspan="2" id="name">$mission_name</td>
                    </tr>
            
                    <tr>
                        <td colspan="2" id="site">$site_name</td>
                    </tr>
            
            
                </table>
                </div>
HTML;

            }
        
        
        
        
        

        ?>   
    </body>
</html>