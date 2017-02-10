<?php
function callback_init(){
	global $CACHE;
	$DB = Database::getInstance();
	$inDB = $DB->query("SELECT 1 FROM ".DB_PREFIX."navi WHERE url='".BLOG_URL."?plugin=ttjtg_llk'");
	if (!$DB->num_rows($inDB)) {
		$DB->query("INSERT INTO ".DB_PREFIX."navi (naviname, url, newtab, hide, taxis, isdefault) VALUES('游戏连连看', '".BLOG_URL."?plugin=ttjtg_llk', 'n', 'n', 100, 'n')");
	} else {
		$DB->query("UPDATE ".DB_PREFIX."navi SET hide='n' WHERE url='".BLOG_URL."?plugin=ttjtg_llk'");
	}
	$CACHE->updateCache('navi');
}

function callback_rm(){
	global $CACHE;
	$DB = Database::getInstance();
	$DB->query("UPDATE ".DB_PREFIX."navi SET hide='y' WHERE url='".BLOG_URL."?plugin=ttjtg_llk'");
	$CACHE->updateCache('navi');
}

?>