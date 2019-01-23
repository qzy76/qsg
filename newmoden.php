<div class="main_right">
				<div class="right_push" >
					<p>热门文章  <a href="newslist.php" style="float: right;">更多</a></p>
					<ul>
					<?php
            require_once("connect.php");
			$npsql = "select * from news order by nread LIMIT 0,8";
			$npresult = mysql_query($npsql);
			while($nprow = mysql_fetch_assoc($npresult)){
			?>
					<li>
						<img src="uploads/<?php echo($nprow['npic']); ?>"/>
						<div class="txt_push">
                    	<a href="news.php?nid=<?php echo($nprow['nid']); ?>" target="_blank">
	                        <h2 title="<?php echo($nprow['nname']); ?>"><?php echo($nprow['nname']); ?></h2>
	                        <div class="fl pl5"><?php echo($nprow['ndate']); ?></div>
                    	</a>
               			 </div>
					</li>
					<?php } ?>
				</div>
				<div class="right_push right_HD">
					<div class="active">
					<p>热门活动</p>
					<?php
			$asql = "select * from activity where apic !='' order by asort LIMIT 0,10";
			$aresult = mysql_query($asql);
			while($arow = mysql_fetch_assoc($aresult)){
			?>
			<a href="<?php echo($arow['aurl']); ?>" target="_blank"><img src="uploads/<?php echo($arow['apic']); ?>" width="190px"/></a>
			<?php } ?></div>
				</div>
			</div>
			<div class="cb"></div>
		</div>
		<!--底部-->
		<?php
		require_once ("footer.php");
		?>
	</body>
	<script type="text/javascript">
	var lH = $('.left_main').height();
	var Rh = $('.right_push').eq(0).height()+$('.active').height();
	var height = lH>Rh?lH+100:Rh+100;
	$('.main').height(height);
</script>
</html>
