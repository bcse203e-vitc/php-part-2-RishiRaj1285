<?php
class EmptyArrayException extends Exception {}

function average($arr){
    if (empty($arr)) {
        throw new EmptyArrayException("No numbers provided");
    }
    return array_sum($arr) / count($arr);
}

$error = "";
$result = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Trim input and filter out any empty pieces
    $input = trim($_POST['numbers']);
    $nums = array_filter(array_map('trim', explode(",", $input)), 'strlen');
    $nums = array_map('floatval', $nums);

    try {
        $result = "Average: " . average($nums);
    } catch (EmptyArrayException $e) {
        $error = $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Average of Numbers</title></head>
<body>
<h3>Enter Numbers to Calculate Average</h3>

<?php if($error): ?>
    <p style="color:red;"><?php echo $error; ?></p>
<?php elseif($result): ?>
    <p style="color:green;"><?php echo $result; ?></p>
<?php endif; ?>

<form method="post">
    Numbers (comma separated): <input type="text" name="numbers" value="">
    <input type="submit" value="Calculate">
</form>
</body>
</html>
