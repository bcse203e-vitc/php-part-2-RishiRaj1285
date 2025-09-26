<?php
$data = file_get_contents("data.txt");
preg_match_all("/\b\d{10}\b/",$data,$matches);
file_put_contents("numbers.txt", implode("\n",$matches[0]));
echo "Numbers extracted to numbers.txt";
?>
