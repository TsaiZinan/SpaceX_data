<!--https://api.spacexdata.com/v2/launches/latest-->
<!--https://api.spacexdata.com/v2/launches?flight_number=61-->

<!doctype html>
<html lang="en">
    <head>
        <title>Test_09_patches</title>
        <link rel="stylesheet" type="text/css" href="test_09.css">
        <link rel="stylesheet" href="../CSS/box-shadows.css-master/box-shadows.css">
    </head>
    <body>
        <?php
            
            /*convert the data of json file to variable*/
            function json_to_var($url){
                /*import the json file from url*/
                $json = file_get_contents($url);
            
                /*decode the json data of lastet launch*/
                $obj = json_decode($json, true);
        
                /*form the data as the key value pair*/
                $object = new stdClass();
        
                foreach ($obj as $key => $value){
                    $object->$key = $value;
                }
        
                /*storage all the value in array*/
                $object = get_object_vars($object);
                
                return $object;
            }
        
            /*echo the single lunch data*/
            function single_data($i, $object){
                $mission_patch_small = $object[$i]['links']['mission_patch_small'];
                
                echo <<<HTML
                <div class="bShadow-inset">
                    <img src="$mission_patch_small"/>
                </div>
                
HTML;

            }
            
        
            /*get the number of latest flight*/
            $url = 'https://api.spacexdata.com/v2/launches/latest';
            $object = json_to_var($url);
            $num = $object['flight_number'];
        
            /*get the data of all the flights*/
            $url = 'https://api.spacexdata.com/v2/launches/all';
            $object = json_to_var($url);
        
            
        
            
        
            
        
            for($i=($num-1); $i>=0; $i--){
                single_data($i, $object);
            }

        ?>   
    </body>
</html>