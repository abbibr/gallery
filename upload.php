<?php 

if(isset($_POST['submit']))
{

	include 'db_conn.php';

	$name = $_FILES['my_image']['name'];
	$type = $_FILES['my_image']['type'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];
	$size = $_FILES['my_image']['size'];

	$ext = explode('.', $name);
	$actual = strtolower(end($ext));
	$allow = array('jpg', 'jpeg', 'png');

	if(in_array($actual, $allow))
	{
		if($error == 0)
		{
			if($size > 5757575)
			{
				echo "Your image size is big!";
			}
			else
			{
				$newname = uniqid('',true).".".$actual;
				$papka = dirname(__FILE__)."/uploads/".$newname;
				$result = move_uploaded_file($tmp_name, $papka);

				if($result == true)
				{
					$sql = "INSERT INTO images(image_url) 
				        VALUES('$newname')";
					$conn->query($sql);
					header("Location: view.php");
					exit();
				}
				else
				{
					echo "Error";
				}

			}
		}
		else
		{
			echo "You have got error!";
		}
	}
	else
	{
		echo "You will upload only images!";
	}

}

?>