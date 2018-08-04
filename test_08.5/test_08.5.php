<!--https://api.spacexdata.com/v2/launches/latest-->
<!--https://api.spacexdata.com/v2/launches?flight_number=61-->

<!doctype html>
<html lang="en">
    <head>
        <title>Test_08.5_display_in_block_with_class</title>
        <link rel="stylesheet" type="text/css" href="test_08.5.css">
        <link rel="stylesheet" href="../CSS/box-shadows.css-master/box-shadows.css">
    </head>
    <body>
        <?php
            /*echo "<br>";*/
        
            $json = file_get_contents('https://api.spacexdata.com/v2/launches/latest');
            
            /*decode the json data of lastet launch*/
            $obj = json_decode($json, true);
        
            /*form the data as the key value pair*/
            $object = new stdClass();
                foreach ($obj as $key => $value)
                {
                    $object->$key = $value;
                }
        
            $object = get_object_vars($object);

            $num = $object['flight_number'];
        
        
        
            
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

            /*echo the single lunch data*/
            function single_data($i, $object){
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
                <div class="bShadow-4 bShadow-1h">
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
                <br>
HTML;

            }
            
        
        
        echo "<h1>Next Launch:</h1>";
        
        /*echo the next launch*/
        single_data($num,$object);
        
        echo "<br>";
        echo "<h1>Previous Launch:</h1>";
        $last = $num - 1;
        single_data($last,$object);
        
        for($i=($last-1); $i>=0; $i--){
            single_data($i, $object);
        }

        ?>   
    </body>
</html>