<!--caculate_times_per_month-->
<!--https://api.spacexdata.com/v2/launches/latest-->
<!--https://api.spacexdata.com/v2/launches?flight_number=61-->
<!--https://api.spacexdata.com/v2/launches/all-->
<!--data/all.json-->


<!doctype html>
<html lang="en">
    <head>
        <title>Test_07.2_caculate_times_per_month</title>
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
        
        
        
        
            /*$date = $object[50]['launch_date_utc'];
        
            echo $date."<br>";
        
            echo "Year: ".substr($date, -20, 4)."<br>";
            echo "Month: ".substr($date, -15, 2)."<br>";
            echo "Date: ".substr($date, -12, 2)."<br>";*/
        
        
            /*transfer the number of month to name*/
            function month_change($mon){
                switch($mon){
                    case '01':
                        return "January";
                        break;
                        
                    case '02':
                        return "February";
                        break;
                        
                    case '03':
                        return "March";
                        break;
                        
                    case '04':
                        return "April";
                        break;
                        
                    case '05':
                        return "May";
                        break;
                        
                    case '06':
                        return "June";
                        break;
                        
                    case '07':
                        return "July";
                        break;
                        
                    case '08':
                        return "August";
                        break;
                        
                    case '09':
                        return "September";
                        break;
                        
                    case '10':
                        return "October";
                        break;
                        
                    case '11':
                        return "November";
                        break;
                        
                    case '12':
                        return "December";
                        break;
                }
            }
        
           /* echo month_change('08');*/

            /*utc time to separate year month day*/
            function year_month_day($object, $utc){
                $date = $object[$utc]['launch_date_utc'];
            
                $array_in[] = substr($date, -20, 4);
                $array_in[] = substr($date, -15, 2);
                $array_in[] = substr($date, -12, 2);
            
                return $array_in;
            }
        
            /*$arr = year_month_day($object, 48);
            echo $arr[0].$arr[1].$arr[2];*/
            
            $count = 1; 
            $num = 60;
        
            for($i=1; $i<=$num; $i++){
                $t = ($i + 1);
                
                $arr_pre = year_month_day($object, $i);
                $arr = year_month_day($object, $t);
                
                /*echo $arr[1]." ".$arr_pre[1]."<br>";*/
                /*if ($arr[1] == ($arr_pre[1] + 1)){
                    echo $arr[1]." ".$arr_pre[1]."<br>";
                        echo ":   "."<br>";
                        }else{
                        echo $arr[1]." ".$arr_pre[1]."<br>";
                            echo ": =="."0"."<br>";
                        }*/
                
                /*echo $arr[1]."<br>";
                echo $arr_pre[1]."<br>";*/
                
                /*if ($arr[1] == $arr_pre[1]){
                    $count = $count + 1;
                }else{
                    if ($arr[1] == ($arr_pre[1] + 1)){
                        echo $arr[1]." ".$arr_pre[1]."<br>";
                        echo "+1"."<br>";
                        $count = 1;
                    }else{
                        echo $arr[1]." ".$arr_pre[1]."<br>";
                        echo "=="."<br>";
                        while($arr[1] > ($arr_pre[1] +1)){
                            echo $arr_pre[1]."++"."<br>";
                            $arr_pre[1]++;
                        }
                    }
                }*/

                
                
                
                
                
                
                
                if ($arr[1] == $arr_pre[1]){
                    $count = $count + 1;
                }else{
                    if ($arr[1] == ($arr_pre[1] + 1)){
                        echo $arr_pre[0]." ".$arr_pre[1].": ".$count."<br>";
                        $count = 1;
                    }else{
                        while($arr[1] >= ($arr_pre[1] +1)){
                            echo $arr_pre[0]." ".($arr_pre[1]).": "."0"."<br>";
                            /*echo $arr_pre[0]." ".($arr_pre[1]).month_change($arr_pre[1]).": "."0"."<br>";*/
                            $arr_pre[1]++;
                        }
                    }
                }   
            }
        
            /*for($i=1; $i<=$num; $i++){
                $t = ($i + 1);
                
                $arr_pre = year_month_day($object, $i);
                $arr = year_month_day($object, $t);
                
                if ($arr[1] == $arr_pre[1]){
                    $count = $count + 1;
                }else{
                    echo $arr_pre[0]." ".$arr_pre[1].month_change($arr_pre[1]).": ".$count."<br>";
                    $count = 1;
                }   
            }*/    
        
        ?>   
    </body>
</html>