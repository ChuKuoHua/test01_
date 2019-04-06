<?php
if(isset($_POST["id"])){
	$connect = mysqli_connect("localhost","root","","txt");
	$query ="SELECT*FROM client WHERE id ='".$_POST["id"]."'";
	$result = mysqli_query($connect,$query);
	while($row= mysqli_fetch_array($result))
	{
		$data["name"] = $row["name"];
		$data["phone"] = $row["phone"];
		$data["email"] = $row["email"];
	}
	echo json_encode($data);
}
?>