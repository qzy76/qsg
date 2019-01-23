<?php
$uname=$_POST['uname'];
if($uname==""){
	echo '';
}else{
	require_once("connect.php");
	$sql="select uid from users where uname = '$uname'";
	$result=mysql_query($sql);
	$row = mysql_fetch_assoc($result);
	$uid=$row['uid'];
	if($uid==""){
		echo "0";//用户名不存在返回0
	}else{
		$sql_check = "SELECT questions1,questions2,questions3 FROM `encrypted` where euid='$uid'";
		$result_check=mysql_query($sql_check);
		$row_check = mysql_fetch_assoc($result_check);
		if($row_check['questions1']==""){
			echo "1";//用户名不存在返回1
		}else{
			$num = $row_check['questions1'].','.$row_check['questions2'].','.$row_check['questions3'];
			$sql_question = "SELECT qtitle FROM `equestion` where qid in ($num)";
			$result_question=mysql_query($sql_question);
			$len = 0;
			while($row_question = mysql_fetch_assoc($result_question)){
				$len++;
				echo $row_question['qtitle'];
				if($len==3){
					echo $uid;//用户ID通过ajax查询后返回回去
				}
				
			}
		}
		
	}
	
	
}
?>