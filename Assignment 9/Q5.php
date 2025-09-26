<?php
$logFile = "access.log";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_POST['username'];
    $action   = $_POST['action'];
    $entry = "$username – ".date("Y-m-d H:i:s")." – $action\n";
    file_put_contents($logFile, $entry, FILE_APPEND);
    echo "Log saved.<br>";
}
if(file_exists($logFile)){
    $logs = file($logFile, FILE_IGNORE_NEW_LINES);
    echo "<h3>Last 5 Entries</h3>";
    foreach(array_slice($logs,-5) as $l) echo $l."<br>";
}
?>
<form method="post">
Username: <input name="username">
Action: <input name="action">
<input type="submit" value="Add Log">
</form>
