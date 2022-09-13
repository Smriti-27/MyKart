<?php
if(isset($_GET['pid']))
{
    $pro_id = $_COOKIE['cart'];   
    $pro_id = explode(',', $pro_id);
    $pro_id=array_unique($pro_id);
    $l= array_search($_GET['pid'], $pro_id);
    unset($pro_id[$l]);
    $pro_id=implode(",",$pro_id);
    
}
header("location:Home.php?id=$pro_id");
?>

