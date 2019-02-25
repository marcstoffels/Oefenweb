<?php

	// Allow the config
	define('__CONFIG__', true);

	// Require the config
	require_once "../inc/config.php";
    $con = DB::getConnection();
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		$return = [];

		$progress =  ($_GET['progress'] + 1);
		// Make sure the assignment exists.
		$findAssignment = $con->prepare("SELECT assignment_id, question, answerA, answerB, answerC, answerD FROM assignments WHERE assignment_id = :progress LIMIT 1");
		$findAssignment->bindParam(':progress', $progress, PDO::PARAM_INT);
		$findAssignment->execute();

		if($findAssignment->rowCount() == 1) {
			// Assignment exists, try and return the assignment
			$Assignment = $findAssignment->fetch(PDO::FETCH_ASSOC);
      $return['question'] = $Assignment['question'];
      $return['answers'] = [$Assignment['answerA'], $Assignment['answerB'], $Assignment['answerC'], $Assignment['answerD']];
      $return['progress'] = $Assignment['assignment_id'];
			}
			$return['name'] = $_SESSION['user_name'];
		echo json_encode($return, JSON_PRETTY_PRINT); exit;

  }else if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $return = [];

		$user = $_SESSION['user_id'];
		$assignment =  $_POST['progress'];
    $answer = $_POST['answer'];

		// Find the correct answer.
		$findAnswer = $con->prepare("SELECT correct_answer FROM assignments WHERE assignment_id = :assignment LIMIT 1");
		$findAnswer->bindParam(':assignment', $assignment, PDO::PARAM_INT);
		$findAnswer->execute();

		if($findAnswer->rowCount() == 1) {
			// Answer exists, compare answers, save the result
			$correctAnswer = $findAnswer->fetch(PDO::FETCH_ASSOC);
      if($answer == $correctAnswer['correct_answer']){
				$getGame = $con->prepare("SELECT game_id FROM games WHERE user_id = :user LIMIT 1");
	  		$getGame->bindParam(':user', $user, PDO::PARAM_INT);
	  		$getGame->execute();
				//If the game exists, update the score
				if($getGame->rowCount() == 1){
					$game = $getGame->fetch(PDO::FETCH_ASSOC);
					$gameId = $game['game_id'];
					$updateScore= $con->prepare("UPDATE games SET score = score + 1 WHERE game_id = :gameId");
		  		$updateScore->bindParam(':gameId', $gameId, PDO::PARAM_INT);
		  		$updateScore->execute();
				}
      }
			//If it's the last assignment retrieve the score and end game
			if($assignment == 10){
				$gameId = $_SESSION['game_id'];
				// Reached the end of the quiz!
				$getScore = $con->prepare("SELECT score FROM games WHERE game_id = :gameId LIMIT 1");
				$getScore->bindParam(':gameId', $gameId, PDO::PARAM_INT);
				$getScore->execute();
				if($getScore->rowCount() == 1){
					$score = $getScore->fetch(PDO::FETCH_ASSOC);
					$return['score'] = $score['score'];
					$return['end'] = "De quiz is klaar!. <a href='/logout.php'>Wil je nog een keer?</a>";
				}
			}
		}
		echo json_encode($return, JSON_PRETTY_PRINT); exit;
  }else {
		exit('Invalid URL');
	}
?>
