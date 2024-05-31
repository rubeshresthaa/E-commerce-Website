<?php

include('connection.php');

$stmt=$conn->prepare("SELECT * FROM products WHERE product_category='lehenga' LIMIT 4");
$stmt->execute();

$lehenga_products=$stmt->get_result();

?>