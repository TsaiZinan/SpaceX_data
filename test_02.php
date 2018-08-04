<!--Print all the key_value as I can-->

<!doctype html>
<html lang="en">
    <head>
        <title>Test_02</title>
    </head>
    <body>
        <?php
            echo "Data:";
            echo "<br>";
        
        /*get the JSON into a value*/
            $json = file_get_contents('https://api.spacexdata.com/v2/launches/latest');
        
        /*way_1 array*/
            $obj = json_decode($json, true);
            /*echo "mission_name： ";
            $m = $obj['mission_name'];
            echo $m;*/
        
 
        
        
            $arrayiter = new RecursiveArrayIterator($obj);
            $iteriter  = new RecursiveIteratorIterator($arrayiter);
            //直接打印即可按照横向顺序打印出来
            foreach ($iteriter as $key => $val){ 
                echo $key.'=>'.$val; 
                echo "<br>";
            }

            /*$s = $data[6];
            echo $S;
            $ss = $iteriter['landing_vehicle'];
            $sss = $iteriter['reused'];
            $ssss = $iteriter['land_success'];
        
        
            echo $ss;
            echo $sss;
            echo $ssss;*/

        ?>
        
        
    </body>
</html>