<?php
class PasswordException extends Exception {}

function validatePassword($pwd){
    if(strlen($pwd) < 8) throw new PasswordException("Password must be at least 8 characters long");
    if(!preg_match("/[A-Z]/", $pwd)) throw new PasswordException("Password must contain an uppercase letter");
    if(!preg_match("/\d/", $pwd)) throw new PasswordException("Password must contain a digit");
    if(!preg_match("/[@#$%]/", $pwd)) throw new PasswordException("Password must contain a special character (@,#,$,%)");
}

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];
    try {
        validatePassword($password);
        $success = "Password is valid!";
    } catch (PasswordException $e) {
        $error = $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Password Validation</title>
</head>
<body>
    <h3>Enter a Password</h3>

    <?php if($error): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <?php if($success): ?>
        <p style="color:green;"><?php echo $success; ?></p>
    <?php endif; ?>

    <form method="post">
        Password: 
        <input type="password" name="password" value="">
        <input type="submit" value="Validate">
    </form>
</body>
</html>
