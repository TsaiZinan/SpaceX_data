<!--data all demo-->
<!--https://api.spacexdata.com/v2/launches/latest-->
<!--https://api.spacexdata.com/v2/launches?flight_number=61-->

<!doctype html>
<html lang="en">
    <head>
        <title>Test_04_data_all_demo</title>
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
        
            for($i=1; $i<=$num; $i++){
                echo "Mission: ".$i."<br>";
                $site_id = $object[$i]['launch_site']['site_id'];
                echo $site_id."<br>";
            
            }
        
        
        
/*
        
            $site_id = $object[60]['launch_site']['site_id'];
            echo $site_id;
*/
            print_r($object);

        ?>   
    </body>
</html>