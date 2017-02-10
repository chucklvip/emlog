<?php 
/**
 * 自建页面模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
	<div class="mainContent">
		<div class="articleShow">
	<h2 class="pageTit"><?php echo $log_title; ?></h2>
    <div class="logcontent">
	<?php echo $log_content; ?>
    </div>
	<?php blog_comments($comments); ?>
	<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
</div>
</div>
<?php
include View::getView('side');
include View::getView('footer');
?>