<?php
$lines = file("Q2.txt", FILE_IGNORE_NEW_LINES);
$products = [];
foreach($lines as $line){
    list($name, $price) = explode(",", $line);
    $products[] = ["name"=>$name, "price"=>(int)$price];
}
usort($products, fn($a,$b)=>$a['price']<=>$b['price']);

echo "<table border='1' cellpadding='5'><tr><th>Product</th><th>Price</th></tr>";
foreach($products as $p){
    echo "<tr><td>{$p['name']}</td><td>{$p['price']}</td></tr>";
}
echo "</table>";
?>
