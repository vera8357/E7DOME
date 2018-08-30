<?php 
try{
	require_once("connect_g4.php");
	$content = $_REQUEST["content"];//你輸入的值
	$bool= false;
	$sql="select * from qustion_and_answer where instr('$content',KEY_WORD)";
	$bot = $pdo->query($sql);
	$bots=$bot->fetchAll(PDO::FETCH_ASSOC);
	// print_r(count($bots));4 
	// echo empty($bots);//確定回傳的是陣列
	
	if(empty($bots)){
		$i = rand(1,6);
		switch($i){
			case 1: 
				echo "這個問題我不清楚唷!";
				break;
			case 2:
				echo "也許你旁邊的知道。";
				break;
			case 3:
				echo "請不要問我這個問題。";
				break;
			case 4:
				echo "再問你就試試看阿。";
				break;
			case 5:
				echo "所以說你想清楚你要問甚麼了嗎?";
				break;
			case 6:
				echo "喔。";
				break;
		}
	}
	else{
		foreach($bots as $ans){
			echo $ans['ANSWER'];
		}
	}
}catch(PDOException $e){
	echo "錯誤原因 : " , $e->getMessage(), "<br>";
	echo "錯誤行號 : " , $e->getLine(), "<br>";
}

//table:bot; bot_num; content; ans;
?>
