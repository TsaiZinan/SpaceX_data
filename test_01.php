<!--Basic funtion-->

<!doctype html>
<html lang="en">
    <head>
        <title>Test_01</title>
    </head>
    <body>
        <?php
            echo "Data:";
            echo "<br>";
        
        /*get the JSON into a value*/
            $json = file_get_contents('https://api.spacexdata.com/v2/launches/latest');
        
        /*output all the key-value Fail*/
            /*var_dump(json_decode($json));
            echo "<br><br>";
            var_dump(json_decode($json, true));*/
        
        /*way_1 array*/
            $obj = json_decode($json, true);
            echo "mission_name： ";
            $m = $obj['mission_name'];
            echo $m;
        
        /*search value by key*/
            /*$c = array_search('B1046',$obj);
            echo $c;*/
        
        /*foreach all the key-value*/
            /*foreach($obj as $x=>$x_value)
            {
                echo "Key=" . $x . ", Value=" . $x_value;
                echo "<br>";
            }*/
            
        /*way_2: object*/
            /*$obj = json_decode($json);
            echo "flight_number:";
            echo $obj->launch_site->site_id;*/
            
        ?>
        
        
    </body>
</html>