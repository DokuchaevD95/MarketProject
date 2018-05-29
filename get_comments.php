<?php

require "db_connect.php";
$quiry_err = "Ошибка запроса к бд! ";
$post_err = "Ошибка в запросе! ";

if(isset($_POST['count']))
{
	$sql = "select * from comments order by time desc offset 0 limit ".$_POST['count'].";";
	$query_result = pg_query($conn, $sql);
	if($query_result = pg_fetch_all($query_result))
	{
		$response = array();
		$comment = array();
		for($i = 0; $i < count($query_result); $i++)
		{
			$user_id = $query_result[$i]['user_id'];
			$product_id = $query_result[$i]['product_id'];

			$sql = "select * from users where id=".$user_id.";";
			$user = pg_fetch_row(pg_query($conn, $sql));

			if(!$user)
				echo json_encode(array('error' => $quiry_err.$sql));

			$sql = "select * from products where id=".$product_id.";";
			$product = pg_fetch_row(pg_query($conn, $sql));

			if(!$product)
				echo json_encode(array('error' => $quiry_err.$sql));

			$comment['id'] = (integer)$query_result[$i]['product_id'];
			$comment['title'] = $product[2];
			$comment['body'] = $query_result[$i]['content'];
			$comment['time'] = $query_result[$i]['time'];
			$comment['user'] = $user[1];

			$response[$i] = $comment;
		}
		echo json_encode($response);
	}
	else echo json_encode(array('error' => $quiry_err.$sql));
}
elseif(isset($_POST['product_id']))
{
	$product_id = $_POST['product_id'];
	$sql = "select * from comments where product_id=".$product_id." order by time desc;";
	$query_result = pg_query($conn, $sql);
	if($query_result = pg_fetch_all($query_result))
	{
		$response = array();
		$comment = array();

		for($i = 0; $i < count($query_result); $i++)
		{
			$user_id = (integer)$query_result[$i]['user_id'];
			$comment_id = (integer)$query_result[$i]['id'];

			$sql = "select * from users where id=".$user_id.";";
			$user = pg_fetch_row(pg_query($conn, $sql));
			if(!$user)
				echo json_encode(array('error'=> $quiry_err.$sql));

			$comment['id'] = $comment_id;
			$comment['body'] = $query_result[$i]['content'];
			$comment['user'] = $user[1];
			$comment['time'] = $query_result[$i]['time'];
			$comment['answers'] = [];

			$sql = "select * from answers where comment_id=".$comment_id." order by time desc;";
			$answers = pg_fetch_all(pg_query($conn, $sql));
			if($answers)
			{
				for ($j=0; $j <count($answers) ; $j++) 
				{ 
					$user_answer = (integer)$answers[$j]['user_id'];

					$sql = "select * from users where id=".$user_answer.";";
					$user = pg_fetch_row(pg_query($conn, $sql));
					if(!$user)
						echo json_encode(array('error'=> $quiry_err.$sql));

					$answer_elem['user'] = $user[1];
					$answer_elem['body'] = $answers[$j]['content'];
					$answer_elem['time'] = $answers[$j]['time'];
					$comment['answers'][$j] = $answer_elem;
				}
			}
			$response[$i] = $comment;
		}
		echo json_encode($response);
	}
	else echo json_encode(array('error'=> $quiry_err.$sql));
}
else
{
	echo json_encode(array('error' => $post_err));
}
require "db_close.php";
?>