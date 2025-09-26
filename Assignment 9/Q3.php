<?php
$emails = ["john@example.com","wrong-email@","me@site","user123@gmail.com"];
foreach($emails as $email){
    if(preg_match("/^[\w\.-]+@[\w\.-]+\.\w{2,}$/",$email)){
        echo "$email is valid<br>";
    }
}
?>
