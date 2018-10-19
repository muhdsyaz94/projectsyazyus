<?php

//fetch.php

$connect = new PDO("mysql:host=localhost;dbname=yusfenlh_dashaempire", "yusfenlh_user", "P(}D6kEmi6AR");

$query = "SELECT * FROM tbl_product";
$statement = $connect->prepare($query);
$statement->execute();
while($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	$data[] = $row;
}

echo json_encode($data);

?>