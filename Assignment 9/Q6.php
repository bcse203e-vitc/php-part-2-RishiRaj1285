<?php
date_default_timezone_set('Asia/Kolkata');
echo "Current Date/Time: ".date("d-m-Y H:i:s")."<br>";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['dob'])) {
    $dob = $_POST['dob'];
    $next = strtotime(date("Y") . "-" . date("m-d", strtotime($dob)));
    if ($next < time()) {
        $next = strtotime("+1 year", $next);
    }
    $days = ceil(($next - time()) / 86400);
    echo "Days until next birthday: $days";
}
?>

<form method="post">
Date of Birth (YYYY-MM-DD): 
<input type="date" name="dob" required>
<input type="submit" value="Calculate">
</form>
