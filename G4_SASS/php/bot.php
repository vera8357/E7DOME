<?php 
try{
	require_once("connect_g4.php");
	$content = $_REQUEST["content"];//你輸入的值
	$bool= false;
	$sql="select * from qustion_and_answer where instr('$content',KEY_WORD)";
	$bot = $pdo->query($sql);
	$bots=$bot->fetchAll(PDO::FETCH_ASSOC);
	
	
	if(empty($bots)){
		if(empty($content))
		{
			echo "請輸入您的問題";
		}
		else{
		$new = "insert into qustion_and_answer(UNSOLVED_QUESTION) VALUES('$content')";
		$pdo->exec($new);

		$i = rand(1,3);
		switch($i){
			case 1: 
				echo "可以詢問E7DOME團隊:>";
				break;
			case 2:
				echo "稍等我去詢問";
				break;
			case 3:
				echo "跟著我一起動DOME";
				break;
		}
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
