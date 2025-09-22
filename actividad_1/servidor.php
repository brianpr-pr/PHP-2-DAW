<?php
if($_POST['box'] != null){
    $num1 = 0;
    $numprev=0;
    for($i = 0; $i < $_POST['box'] ;$i++){
        if($i==0){
            echo $num1 . "<br>";
            $num1++;
        } elseif ($i==1){
            echo $num1 . "<br>";
            $numprev = 1;
        } else{
            echo $num1 . "<br>";
            $prov = $num1;
            $num1 = $num1 + $numprev;
            $numprev = $prov;
        }
    }
}