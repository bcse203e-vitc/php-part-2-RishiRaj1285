<?php
$lines = file("students.txt", FILE_IGNORE_NEW_LINES);
$errors = [];
echo "<table border='1'><tr><th>Name</th><th>Email</th><th>Age</th></tr>";
foreach($lines as $line){
    $parts = explode(",", $line);
    if(count($parts)!=3){ $errors[]=$line; continue; }
    [$name,$email,$dob] = $parts;
    if(!preg_match("/^[\w\.-]+@[\w\.-]+\.\w{2,}$/",$email)){
        $errors[]=$line; continue;
    }
    $age = date_diff(date_create($dob), date_create('today'))->y;
    echo "<tr><td>$name</td><td>$email</td><td>$age</td></tr>";
}
echo "</table>";
if($errors) file_put_contents("errors.log", implode("\n",$errors));
?>
