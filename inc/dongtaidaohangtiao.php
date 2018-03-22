<div id="dongtaidaohanglan">
	  <a href="#" class="nav__trigger"><img class="nav__img" src="images/menu.png"></a>
	  <nav class="nav">
		<ul class="nav__list">
		  <li class="nav__item"><a class="nav__link" href="index.php">首页</a></li>
		  <li class="nav__item"><a class="nav__link" href="huiyuanxinxi.php">会员信息menu</a></li>
		  <li class="nav__item"><a class="nav__link" href="xiaofeijilu.php">消费记录</a></li>
		  <li class="nav__item"><a class="nav__link" href="#">Blog</a></li>
		  <li class="nav__item"><a class="nav__link" href="#">Contact Us</a></li>
		</ul>
	  </nav> 
</div>

<script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(function(){
		$('.nav__trigger').on('click', function(e){
			  e.preventDefault();
			  $(this).parent().toggleClass('nav--active');
			});
	})
</script>