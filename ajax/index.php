<?php
	// Allow the config
	define('__CONFIG__', true);

	// Require the config
	require_once "../inc/config.php";
	$con = DB::getConnection();
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$return = [];

		$name = $_POST['name'];

		$createUser = $con->prepare("INSERT INTO users(name) VALUES (LOWER(:name))");
		$createUser->bindParam(':name', $name, PDO::PARAM_STR);
		$createUser->execute();

    $userId = $con->lastInsertId();
  	$_SESSION['user_id'] = (int) $userId;
		$_SESSION['user_name'] = $name;

		//Create a new game with the user_id
		$saveScore = $con->prepare("INSERT INTO games(user_id) VALUES (:user)");
		$saveScore->bindParam(':user', $userId, PDO::PARAM_INT);
		$saveScore->execute();

		$gameId = $con->lastInsertId();
		$_SESSION['game_id'] = (int) $gameId;

		$return['user'] = $userId;
		$return['game'] = $gameId;
		$return['redirect'] = '/webquiz.php?message=welcome '.$name;
		echo json_encode($return, JSON_PRETTY_PRINT); exit;
	}else {
		exit('Invalid URL');
	}
?>
