<?php
 $arr =[
   "user1"=>[ ["name"=>"Mohamed","age" =>22]],
     "user2"=>[ ["name"=>"Amer","age"=>21]]
    ];
echo $arr["user2"][0]["name"];

$color =["red","blue","yellow"];
foreach ($color as $x) {
    echo $x ."<br>";
}
 $arr =[
    ["name"=>"Mohamed","age" =>22],
    ["name"=>"Amer","age"=>21]
    ];
foreach ($arr as $k =>$x) {
    echo $k ." is : ".$x['name']. " ".$x['age']."<br>"  ;
}
$arr =
    ["name"=>"Mohamed","age" =>22];
    foreach($arr as $k=>$x){
        echo $k."<br>";
    }
?>