<?php
/*
Plugin Name: 游戏连连看
Version: 1.0
Plugin URL: http://www.te13.com/
Description: 天天聚团购 游戏连连看 可大屏和全屏游戏
Author: 团团说
Author Email: ttjtg@139.com
Author URL: http://www.te13.com/
*/

!defined('EMLOG_ROOT') && exit('access deined!');


function ttjtg_llk_footer()
{
echo '
<script type="text/javascript">
var jiathis_config = {data_track_clickback:\'true\'};
</script>';
}
addAction('index_footer', 'ttjtg_llk_footer');
?>
