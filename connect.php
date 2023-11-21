<?php

$ownername = filter_input(INPUT_POST, 'ownername');
$petname = filter_input(INPUT_POST, 'petname');
$selectappointmentdate = filter_input(INPUT_POST, 'selectappointmentdate');
$selecttimeslot = filter_input(INPUT_POST, 'timeslot');
if(!empty($ownername)){
	if (!empty($petname)){
		$host = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "petcare";

		$conn = new mysqli ($host,$dbusername,$dbpassword,$dbname);
		if (mysqli_connect_error()){
			die('Connect Error('.mysqli_connect_errno().')' . mysqli_connect_error());


		}
		else {
			$sql = "INSERT  INTO petdatabase1 (ownername,petname,selectappointmentdate,timeslot) values ('$ownername','$petname','$selectappointmentdate','$selecttimeslot')";
			if ($conn->query($sql)) {
				echo "new record inserted";

			}
			else{
				echo "Error:". $sql . "<br>". $conn->error;
			}
			$conn->close();
		}
	}
	else{
		echo "owner should not be empty";
		die();
	}
}
else{
	echo "petname should not be empty";
	die();
}

?>