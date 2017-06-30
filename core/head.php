<?php
	session_start();
	ini_set('date.timezone','Asia/Shanghai');
?>
<!DOCTYPE html>
<html>
<head>
	<title>火山</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0, user-scalable=yes" />
	<?php 
		include_icon();
		include_head_css($_controller, $_action);  //$controller和$action都在core.php的render函数里
		include_head_js($_controller, $_action);
	?>
</head>
<body>

<div class="head" id="head">
	<ul>
		<li><a href="<?php echo HOST;?>" >主页</a></li>
		<li><a href="<?php echo HOST . 'article';?>" >作家</a></li>
		<li><a href="<?php echo HOST . 'about';?>" >关于</a></li>
	</ul>
</div>

<div class="body">