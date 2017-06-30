
<?php 
	if(empty($data['ret']))	die();
?>	
	
<ul id="ul-article-list" class="ul-article-list" start="0" limit="4">
<?php 
	$article = $data['ret'];
	$count = count($article);
	for($i = 0; $i < $count; $i++)
	{
		$row = $article[$i];
		echo '<li>';
			echo '<div class="div-head">';
				echo '<a href="'. HOST . "article/display/" .$row['id'] . '">' . $row['title'] . '</a>';
			echo '</div>';
			echo '<div class="div-body">';
				//echo mb_substr($row['contents'],0,100,'utf-8');
			echo $row['contents'];
			echo '</div>';
			//echo '<div class="div-foot">';
			//echo $row['class'] . '&nbsp;' . $row['time'];
			//echo '</div>';
		echo '</li>';
	}
?>
</ul>


<div >
	<a href="javascript:void(0);" id="a_next_page">下一页</a>
</div>
<?php 
/*
	if($count >= 4)
	{
		echo '<div>';
			echo '<a href="javascript:void(0);" id="a_pre_page">上一页</a>';
		echo '</div>';
		
		echo '<div>';
			echo '<a href="javascript:void(0);" id="a_next_page">下一页</a>';
		echo '</div>';
	}
*/
?>