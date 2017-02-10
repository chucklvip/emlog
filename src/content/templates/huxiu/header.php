<?php
/*
Template Name:huxiu
Description:仿虎嗅网模板
Version:1.3
Author:Liuzp
Author Url:http://www.liuzp.com
Sidebar Amount:1
ForEmlog:5.1.2
*/
if(!defined('EMLOG_ROOT')) {exit('error!');}
require_once View::getView('module');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $site_title; ?></title>
<meta name="keywords" content="<?php echo $site_key; ?>" />
<meta name="description" content="<?php echo $site_description; ?>" />
<meta name="generator" content="emlog" />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo BLOG_URL; ?>xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo BLOG_URL; ?>wlwmanifest.xml" />
<link rel="alternate" type="application/rss+xml" title="RSS"  href="<?php echo BLOG_URL; ?>rss.php" />
<link href="<?php echo TEMPLATE_URL; ?>style/common.css" rel="stylesheet" type="text/css" />
<script src="<?php echo BLOG_URL; ?>include/lib/js/common_tpl.js" type="text/javascript"></script>
<?php 
emLoadJQuery();
doAction('index_head'); 
?>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>script/jquery.easing.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>script/Lzpscript.js"></script>
<!--[if IE 6]><script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>script/ie6png.js"></script><![endif]-->
</head>
<body>
<div class="header">
	<div class="topBg"></div>
	<div class="top">
    	<div class="logo png"><a href="<?php echo BLOG_URL; ?>"></a></div>
        <div class="link clearfix">
        	<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=123456&site=qq&menu=yes" class="highLight">联系我</a>
            <?php
			if (ROLE == 'admin' || ROLE == 'writer'):?>
            <a href="<?php echo BLOG_URL; ?>admin/write_log.php">写日志</a>
			<a href="<?php echo BLOG_URL; ?>admin/">管理站点</a>
			<a href="<?php echo BLOG_URL; ?>admin/?action=logout">退出</a>
			<?php else: ?>
			<a href="<?php echo BLOG_URL; ?>admin">登录</a>
			<?php endif;?>
			<a href="<?php echo BLOG_URL; ?>rss.php" class="rss png" target="_blank" title="RSS订阅"></a>
        </div>
        <div class="menu">
        	<?php blog_navi();?>
            <div class="scrollHover png"></div>
        </div>
        <div class="search">
        	<form name="keyform" method="get" action="<?php echo BLOG_URL; ?>index.php">
            	<input type="text" name="keyword" class="txt" placeholder="懒得翻，直接搜" />
                <input type="submit" class="searchBut" value="gogogo" />
            </form>
        </div>
    </div>
</div>
<div class="main boxshaw clearfix">