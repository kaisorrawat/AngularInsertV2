<?

	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	error_reporting(E_ALL ^ E_DEPRECATED);
	$conn = new mysqli("localhost", "root", "root", "data");

	$result = $conn->query("SELECT * FROM customer");

	$outp = "";

	while ($rs = $result->fetch_array(MYSQLI_ASSOC)) {
		if($outp != ""){
			$outp .= ",";
		}
		$outp .= '{"ID":"' .$rs["CustomerID"]. '",';
		$outp .= '"Name":"' .$rs['Name'].'",';
		$outp .= '"Email":"' .$rs['Email'].'",';
		$outp .= '"CountryCode":"' .$rs['CountryCode'].'",';
		$outp .= '"Budget":"' .$rs['Budget'].'",';
		$outp .= '"Used":"' .$rs['Used'].'"}';
	}
	$outp = '{"records":['.$outp.']}';
	$conn->close();

	echo($outp);

?>