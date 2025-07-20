<?php
$user=["vs","Git","Github","Css","React"];
echo "total count : ". count($user)."<br>";
$s ="vs";
if(in_array($s,$user)){
    echo $s ." : is founded" ."<br>";
}
echo"Keys : ";
print_r(array_keys($user));
echo "<br>";

echo "Values : ";
print_r(array_values($user));
echo "<br>";

$x=0;
for($i=0 ;$i<10;$i++){
    if(isset($user[$i])){
        $x++;
    }
}
echo $x ."<br>";

array_push($user,"zoma");
print_r(array_values($user));
echo "<br>";

array_unshift($user,"Bor5a");
print_r(array_values($user));
echo "<br>";
array_pop($user);
print_r(array_values($user));
?>