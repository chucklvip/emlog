<?php
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
    <div class="footer">
    	<div class="aboutLinks">
        	<a href="<?php echo BLOG_URL; ?>about-me.html">关于我</a>|<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=123456&site=qq&menu=yes">QQ联系</a>|<a href="<?php echo BLOG_URL; ?>about-me.html">网站留言</a>|<a href="<?php echo BLOG_URL; ?>sitemap.xml" target="_blank">Sitemap</a>
        </div>
        <div class="copyRighr">
        	Powered by <a href="http://www.emlog.net" title="emlog <?php echo Option::EMLOG_VERSION;?>">emlog</a>&nbsp;&nbsp;Themes by <a href="http://www.liuzp.com" target="_blank">Liuzp</a>&nbsp;&nbsp;<a href="http://www.miitbeian.gov.cn" target="_blank"><?php echo $icp; ?></a><br /><?php echo $footer_info; ?> <?php doAction('index_footer'); ?>
        </div>
    </div>
</div>
</body>
</html>