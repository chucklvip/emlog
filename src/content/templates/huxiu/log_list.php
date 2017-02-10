<?php 
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
	<div class="mainContent">
		<div class="articleList">
<?php 
doAction('index_loglist_top');
if (!empty($logs)):
foreach($logs as $value): 
    $logdes = $value['log_description'];
?>
			<div class="articleItem">
            	<h2 class="tit"><?php topflg($value['top']); ?> <a href="<?php echo $value['log_url']; ?>" title="<?php echo $value['log_title']; ?>"><?php echo $value['log_title']; ?></a><?php if($value['views']>=500)echo '<i class="hot"></i>'; ?></h2>
                <span class="info">发布于：<?php echo gmdate('Y-n-j G:i', $value['date']); ?>　作者：<?php blog_author($value['author']); ?>　浏览：<a href="<?php echo $value['log_url']; ?>"><?php echo $value['views']; ?></a>　<?php blog_sort($value['logid']); ?></span>
                <div class="textCon"><?php echo $logdes; ?></div>
                <div class="other clearfix">
                	<p class="tags"><?php blog_tag($value['logid']); ?></p>
                    <p class="comment"><a href="<?php echo $value['log_url']; ?>#comments" class="png"><?php echo $value['comnum']; ?></a></p>
                </div>
            </div>
<?php 
endforeach;
else:
?>
<h1>未找到</h1>
<p>抱歉，没有符合您查询条件的结果。</p>
<?php endif;?>
        </div>
        <div class="page clearfix">
            <?php echo $page_url;?>
        </div>
    </div>
<?php
include View::getView('side');
include View::getView('footer');
?>