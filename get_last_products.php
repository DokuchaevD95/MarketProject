<?php
	if(isset($_POST['start']) && isset($_POST['count']))
	{
		$sql = "select * from products where is_selled=false offset ".$_POST['start']." limit ".$_POST['count'].";";
		require "db_connect.php";
		$result = pg_query($conn, $sql);
		require "db_close.php";

		if($result)
		{
			if($result = pg_fetch_all($result))
			{
				for($i = 0; $i < count($result); $i++)
				{
					$result[$i]['id'] = (integer)$result[$i]['id'];
					$result[$i]['seller'] = (integer)$result[$i]['seller'];
					$result[$i]['is_selled'] = $result[$i]['is_selled']=="f" ? false: true;
					$result[$i]['buyer'] = $result[$i]['buyer'] ? (integer)$result[$i]['price'] : null;
					$result[$i]['price'] = (double)$result[$i]['price'];
				}
				echo json_encode($result);
			}
			else
			{
				echo json_encode(array('error' => 'Неверно сформирован запрос!'));
			}
		}
		else
		{
			echo json_encode(array('error' => 'Проблема с подключением к бд!'));
		}
	}
	else
	{
		echo json_encode(array('error' => 'Неверно оформлен запрос!'));
	}
	
?>