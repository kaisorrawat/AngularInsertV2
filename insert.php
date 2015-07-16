<?
	
	include'config.php';
	
		?><script>console.log(<? echo "Step1" ?>); alert('Step1');</script> <?
		print_r('Step1');

		//$web = file_get_contents('insert.php');

		$url = file_get_contents("php://input");
		$data = json_decode($url);
		// $customer = mysql_real_escape_string($data->customer);
		// $names = mysql_real_escape_string($data->names);
		// $email = mysql_real_escape_string($data->email);
		// $countrycode = mysql_real_escape_string($data->countrycode);
		// $budget = mysql_real_escape_string($data->budget);
		// $used = mysql_real_escape_string($data->used);
	
		$customer = $data->customer;
		//$names = $data->names;
		$FLname = $data->names;
		$email = $data->email;
		$countrycode = $data->countrycode;
		$budget = $data->budget;
		$used = $data->used;

		print_r($data);

		// $name = $_POST['name'];
		// $email = $_POST['email'];
		// $countrycode = $_POST['countrycode'];
		// $budget = $_POST['budget'];
		// $used = $_POST['used'];

		?><script>console.log(<? echo "Step2" ?>); alert('Step2');</script> <?
		print_r('Step2');

		$sql = 'INSERT INTO customer (CustomerID,Name,Email,CountryCode,Budget,Used) VALUES ("'.$customer.'", "'.$FLname.'", "'.$email.'", "'.$countrycode.'", "'.$budget.'", "'.$used.'")';
		
		?><script>console.log(<? echo "Step3" ?>); alert('Step3');</script> <?
		
		$qry_res =  mysql_query($sql);
		
		
		if($qry_res){
			$arr = array('msg' => "", "User Create Successfully!!!", 'error' => '');
			$jsn = json_encode($arr);
			print_r($jsn);
		}else{
			$arr = array('msg' => "", 'error' => 'Error In inserting record');
			$jsn = json_encode($arr);
			print_r($jsn);
		}
		?><script>console.log(<? echo "Step4" ?>); alert('Step4');</script> <?
		echo "Your information has been successfully added to the database.";

	

	

?>