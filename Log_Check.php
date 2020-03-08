<?php
	session_Start();

	if(isset($_REQUEST['login']))
	{
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		$file = fopen("Reg_Info.txt",'r'); 
		
		if(empty($username) || empty($password))
		{
			header("Location: Login.php");
		}
		else
		{
			while(!feof($file))
			{
				$info = fgets($file);
				$data = explode('|',$info);
				$flag = false;

				if($username == $data[1] && $password == $data[3])
				{
					$flag = true;

				   $_SESSION['id'] = trim($data[0]);
                   $_SESSION['username'] = trim($data[1]);
                   $_SESSION['email'] = trim($data[2]);
                   $_SESSION['password'] = trim($data[3]);
                   $_SESSION['gender'] = trim($data[4]);
                   $_SESSION['mobileno'] = trim($data[5]);
                   $_SESSION['address'] = trim($data[6]);
                    $_SESSION['applied'] = trim($data[7]);

					header("Location:dashborad.php");
				}
			}

			if($flag == false)
			{
				echo "Invalid Username or Password."."<br>";
				echo "<a href = "."LearningField.php".">Register Here</a>";
			}
		}
	}
	else
	{
		header("location: Login.php");
	}
?>