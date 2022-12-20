<?php 
    function generate_index()
    {
        $min = 0;
        $max = 9999999;
        $result = mt_rand($min,$max);
        return $result;
    }    
?>