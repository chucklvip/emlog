<?php 
/**
 * 阅读文章页面
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
	<div class="mainContent">
		<div class="articleShow">
	<h2><?php topflg($top);?><?php echo $log_title;?></h2>
	<p class="date"><?php blog_author($author); ?> 发布于：<?php echo gmdate('Y-n-j G:i', $date); ?>　<?php blog_sort($logid); ?>　有 <?php echo $views; ?> 人浏览，获得评论 <?php echo $comnum; ?> 条　<?php blog_tag($logid); ?>　<?php editflg($logid,$author); ?></p>
	<div class="logcontent"><?php echo $log_content; ?></div>
	<?php doAction('log_related', $logData); ?>
        <div class="nextlog"><?php neighbor_log($neighborLog); ?></div>
	<?php blog_comments($comments); ?>
	<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
</div>
</div>
<?php
include View::getView('side');
include View::getView('footer');
?>