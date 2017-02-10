<?php
if(!defined('EMLOG_ROOT')) {exit('error!');} 
error_reporting(0);
global $CACHE;

$options_cache = $CACHE->readCache('options');
$blogname = Option::get('blogname');
$site_title = '游戏连连看 - '.$blogname;
$log_title = '游戏连连看 - '.$blogname.'游戏中心';
$icp = Option::get('icp');
$footer_info = Option::get('footer_info');

include View::getView('header');

$da = addslashes($_GET['da']);
if(!$da){
$log_content='<div style="background:#000" align="center">
<div style="height:40px; color: #FFFFFF;padding-top:15px;">欢迎来到'.$blogname.'连连看游戏中心。<a href="?plugin=ttjtg_llk&da=y" style="color:#FFFF00">大屏</a> <a href="content/plugins/ttjtg_llk/llk.swf" target="_blank" rel="nofollow" style="color:#FFFF00">全屏</a></div>
<script type="text/javascript">
document.writeln("<iframe  frameborder=\"0\" marginheight=\"0\" marginwidth=\"0\" border=\"0\" scrolling=\"no\" height=\"340\" width=\"100%\" src=\"content/plugins/ttjtg_llk/llk.swf\" ></iframe>");</script >
</div>';

include View::getView('page');

} else {
echo '<div style="background:#000" align="center">
<div style="height:40px; color: #FFFFFF;padding-top:15px;">欢迎来到'.$blogname.'连连看游戏中心。<a href="?plugin=ttjtg_llk"style="color:#FFFF00">小屏</a> <a href="content/plugins/ttjtg_llk/llk.swf" target="_blank" rel="nofollow" style="color:#FFFF00">全屏</a></div>
<script type="text/javascript">
document.writeln("<iframe  frameborder=\"0\" marginheight=\"0\" marginwidth=\"0\" border=\"0\" scrolling=\"no\" height=\"500\" width=\"100%\" src=\"content/plugins/ttjtg_llk/llk.swf\" ></iframe>");</script >
</div>';
?>

<!-- Duoshuo Comment BEGIN -->
	<div style="border:1px solid #ccc;margin-top:10px;background:#FFFFFF; border-radius: 8px;padding:15px 15px 0;"><?=$blogname?>邀请您：有空常来坐坐，在这里谈谈看法，顺便互换个友链吧O(∩_∩)O~
	<!-- JiaThis Button BEGIN -->
<div class="jiathis_style" style="float:right">
	<a class="jiathis_button_qzone"></a>
	<a class="jiathis_button_tsina"></a>
	<a class="jiathis_button_tqq"></a>
	<a class="jiathis_button_renren"></a>
	<a class="jiathis_button_kaixin001"></a>
	<a class="jiathis_counter_style"></a>
</div>
<!-- JiaThis Button END -->	
<?php echo duoshuo_comments($logData);?>
</div>
<?php include View::getView('footer');?>
<?php } ?>
