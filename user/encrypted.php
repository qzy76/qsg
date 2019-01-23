<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>密保设定 | 轻松购 | 账户中心</title>
		<link rel="icon" href="../img/nhic.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="../css/general.css"/>
		<link rel="stylesheet" type="text/css" href="css/uPhone.css"/>
		<link rel="stylesheet" type="text/css" href="../css/header.css"/>
		<link rel="stylesheet" type="text/css" href="../css/motailogin.css"/>
		<link rel="stylesheet" type="text/css" href="../fonts/iconfont.css"/>
		<script src="../js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/encrypted.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/sha1.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/index_cart.js" type="text/javascript" charset="utf-8"></script>
		<style type="text/css">
			.hidden{
				display: none;
			}
			select{
				width: 209px;height: 30px;
				outline-color: #ff4400;
			}
			lable{
				display: inline-block;
				width: 80px;height: 30px;
				line-height: 30px;
			}
		</style>
	</head>
	<body>
		<?php
				require_once ("../connect.php");
				require_once ("../functions.php");
				require_once ("../header_uCenter.php");
				if($uid==""){
					js_go("请在个人中心页登录！","userCenter.php");
				}
				$sql = "select * from users where uid=$uid";
				$result = mysql_query($sql);
				$row = mysql_fetch_assoc($result);
				$email = $row['uemail'];
				if($email==""){
					js_go("当前账号未设置邮箱号，请先设置邮箱号！","email.php");
				}
				$phone = $row['uphone'];
				$sql_encrypted = "select * from encrypted where euid=$uid";
				$result_encrypted = mysql_query($sql_encrypted);
				$row_encrypted = mysql_fetch_assoc($result_encrypted);
				$euid = $row_encrypted['euid'];
				
			?>
		<div class="main" style="height: 500px;">
			<div class="mTop">
				<ol>
					<li>
						<div><i class="icon iconfont qzy-jindu active"></i>
							<i>1</i>
							<span>验证身份</span>
						</div>
						<div></div>
					</li>
					<li>
						<div><i class="icon iconfont qzy-jindu"></i>
							<i>2</i>
							<span>
								<?php
								if($euid==""){echo'添加密保问题';}else{echo'修改密保问题';}
								?>
								</span>
						</div>
						<div></div>
					</li>
					<li>
						<div><i class="icon iconfont qzy-jindu"></i>
							<i class="icon iconfont qzy-toast"></i>
							<span>完成</span>
						</div>
					</li>
				</ol>
			</div>
			<div class="mbuttom">
				<input type="hidden" class="hidden" value="<?php echo $uid;?>" />
				<div class="hidden question">
						<div class="tijiaoxiang">
						<lable style="font-size: 20px;" class="q1">问题一：</lable>
						<select class="qs1" data-title>
							<option value="0">请选择</option>
							<?php
								$sql_equestion = "select * from equestion";
								$result_equestion = mysql_query($sql_equestion);
								while($row_equestion = mysql_fetch_assoc($result_equestion)){
							?>
							<option value="<?php echo $row_equestion['qid'];?>"><?php echo $row_equestion['qtitle'];?></option>
							<?php }?>
						</select>
					</div>
					<div class="tijiaoxiang">
						<lable style="font-size: 20px;" class="a1">答案一：</lable>
						<input autocomplete="off" type="password" type="password" onblur="this.type='password'" onfocus="this.type='text'" class="inputs anster" value="1" placeholder="请输入您的答案"/>
						<div></div>
					</div>
					</div>
				<?php 
				if($euid==""){?><!--未设置密保的就验证邮箱，密码-->
					<div class="tijiaoxiang">
						<lable class="lable" style="font-size: 20px;">邮箱：</lable>
						<input autocomplete="off" type="text" onfocus="this.type='email'" name="uemail" class="inputs uemail" value="244616102@qq.com" placeholder="请输入您的邮箱"/>
						<div></div>
						<input type="hidden" class="type" value="1" />
					</div>
					<div class="tijiaoxiang"  autocomplete="off" disableautocomplete>
						<lable style="font-size: 20px;">密码：</lable>
						<input autocomplete="off" disableautocomplete type="text" onfocus="this.type='password'"name="upwd" class="inputs myclass" style="display: none;"/>
						<input type="password" class="upwds" maxlength="32" size="20" aria-required="true"  
placeholder="请输入您的密码" value="qzy123" />
						<div></div>
					</div>
					
					<?php }else{?>
						<?php
							$questions1 = $row_encrypted['questions1'];
							$questions2 = $row_encrypted['questions2'];
							$questions3 = $row_encrypted['questions3'];
							$sql_equestion1 = "select * from equestion where qid in ($questions1,$questions2,$questions3)";
							$i=0;
							$result_equestion1 = mysql_query($sql_equestion1);
							while($row_equestion1 = mysql_fetch_assoc($result_equestion1)){
								$i++;
						?>
						<div class="question">
						<div class="tijiaoxiang">
						<lable style="font-size: 20px;" class="q1"><?php if($i==1){echo'问题一：';}else if($i==2){echo'问题二：  ';}else if($i==3){echo'问题三：';}?></lable>
						<input type="text" disabled value="<?php echo $row_equestion1['qtitle'] ?>"/>
					</div>
					<div class="tijiaoxiang">
						<lable style="font-size: 20px;"><?php if($i==1){echo'答案一：';}else if($i==2){echo'答案二：  ';}else if($i==3){echo'答案三：';}?></lable>
						<input autocomplete="off" class="anster" type="password" onblur="this.type='password'" onfocus="this.type='text'"  class="inputs anster" value="1" placeholder="请输入您的答案"/>
						<div></div>
					</div>
					</div>
					<?php }?>
						<?php } ?>
					<input type="button" value="提交" class="btn"/><div></div>
			</div>
		</div>
		<?php
		require_once ("../footer.php");
		?>
	</body>
</html>