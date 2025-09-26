<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_FILES['file'])
    && is_uploaded_file($_FILES['file']['tmp_name'])) {

    $tmp  = $_FILES['file']['tmp_name'];
    $orig = basename($_FILES['file']['name']);

    // create backup name: originalName_YYYY-MM-DD_HH-MM.txt
    $backup = pathinfo($orig, PATHINFO_FILENAME) . "_" . date("Y-m-d_H-i") . ".txt";

    if (copy($tmp, $backup)) {
        echo "Backup created as <strong>$backup</strong>";
    } else {
        echo "Failed to create backup.";
    }
}
?>

<form method="post" enctype="multipart/form-data">
    Select file to backup: <input type="file" name="file" required>
    <input type="submit" value="Create Backup">
</form>
