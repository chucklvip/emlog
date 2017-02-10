<?php
/**
 * Plugin Name: 百度音乐
 * Version: 1.0
 * Plugin URL: 
 * Description: 在文章和页面中添加百度音乐
 * Author: goodstudy
 * Author Email: 
 * Author URL: http://blog.wdyun.cn
 */
 
!defined('EMLOG_ROOT') && exit('access deined!');
function insertBDMusic(){
?>
	<link href="<?php echo BLOG_URL?>content/plugins/bdmusic/style.css" type="text/css" rel="stylesheet" />
	<span class="bdmusic">
		<a id="insertMedia" href="javascript:void(0);" style="font-weight: bold;color:black;"><img src="<?php echo BLOG_URL?>content/plugins/bdmusic/image/bd-small.png"> 插入「百度音乐」</a>
		<div class="insertMain" id="insertMain">
			<a class="a-close" href="javascript:void(0);">X</a>
			<input id="query" type="text" value="" placeholder="请输入歌曲名">
			<a id="so" href="javascript:;">搜歌曲</a>
			<ul id="song"></ul>
			<ul id="songnav"></ul>
		</div>
	</span>
	<style>
	#song li{
		background:url("<?php echo BLOG_URL?>content/plugins/bdmusic/image/player.png") no-repeat 0 5px;
	}
	</style>
	<script>
		$(function (){
			var insertBtn = $("#insertMedia");
			var insertMain = $("#insertMain");
			var closeBtn = $(".a-close");
			var songPage = 0;
			var tempData = {};
			$("#so").click(function(){
				
				//清空
				$("#song li").remove();
				$("#songnav li").remove()

				var query = $("#query").val().replace(/(^\s*)|(\s*$)/g, "");
				console.log(query);
				if(query===''){
					var str = "<li style=\"background:white;padding-left:0;color:red;border:0;\">警告：歌曲名不能为空，请重新输入！</li>";
					$("#song li").remove();
					$("#songnav li").remove()
					$("#song").append(str);
					return;
				}
				$.ajax({
					type: "get",
					dataType: "jsonp",
					dataType:'jsonp',  
					jsonp:'callback', 
					jsonpCallback:'fn', 
					url: 'http://tingapi.ting.baidu.com/v1/restserver/ting?method=baidu.ting.search.common&query='+query+'&page_size=50&callback=fn&.r=0.01362917'+<?php echo time()?>,
					success: function (result) {
						var str="";
						var aStr = "";
						
						
						if(result.error_code){
							console.log(result.error_code);
							warning('Something is wrong! 错误代码：'+result.error_code);
							return;
						}
						
						if(result.song_list==""){
							warning('抱歉，没有找到您要的歌曲！');
							return;
						}
						
						
						tempData = result;
						
						for(var i=0+0*songPage;i<10+0*songPage;i++){
							console.log(i, " ",result.song_list[i])
							if(result.song_list[i]!==undefined){
								str +="<li><a href='javascript:;' data-musicid='"+i+"' >"+result.song_list[i]['title']+"<span class='song-author'> - "+result.song_list[i]['author']+"</span></a></li>";
							}
						}
						
						for(var j=Math.ceil(result.song_list.length/10);j>=1;j--){
							aStr +="<li><a href='javascript:;'>"+j+"</a></li>";
						}
						
						$("#song li").remove()
						$("#song").append(str);
						$("#songnav li").remove()
						$("#songnav").append(aStr);
					}
				
				})
			})
			
			$("#songnav").on("click" ,"li",function(event){
				songPage = $(this).text()-1;
				var str="";
				for(var i=(0+10*songPage);i<(10+10*songPage);i++){
					if(tempData.song_list[i]!==undefined){
						str +="<li><a href='javascript:;' data-musicid='"+i+"' >"+tempData.song_list[i]['title']+"<span class='song-author'> - "+tempData.song_list[i]['author']+"</span></a></li>";
					}
				}
				var aStr = "";
				for(var j=Math.ceil(tempData.song_list.length/10);j>=1;j--){
					aStr +="<li><a href='javascript:;'>"+j+"</a></li>";
				}
				
				$("#song li").remove()
				$("#song").append(str);
				$("#songnav li").remove()
				$("#songnav").append(aStr);
				
			})
			
			function _removeHtml (str) {
				var reg = /<\s*\/?\s*[^>]*\s*>/gi;
				return str.replace(reg, "");
			}
		
			$("#song").on("click" ,"li",function(event){
				var id = $(this).children('a').data("musicid");
				var obj = tempData.song_list[id];
				var url = '&name='+encodeURIComponent(_removeHtml(obj.title)) + '&artist='
				+ encodeURIComponent(_removeHtml(obj.author)) + '&extra='
				+ encodeURIComponent(_removeHtml(obj.album_title));
				//editor('[bdmusic]'+url+'[/bdmusic]');
				var str = '<iframe style="width:400px;height:96px;border:none" frameborder="0" id="bd_player_iframe" name="bd_player_iframe" src="http://box.baidu.com/widget/flash/bdspacesong.swf?from=tiebasongwidget'+url+'"></iframe><br/><br/><br/>';
				editor(str)
				insertMain.fadeOut("fast");
				
			})
			
			function editor(c) {
				var editorContent = $($(".ke-edit-iframe")[0]).contents().find(".ke-content");
				var newContent = editorContent.html()+c;
				editorContent.html(newContent);
			}
			
			function warning(x){
				var x = "<li style=\"background:white;padding-left:0;color:red;border:0;\">"+x+"</li>";
				$("#song li").remove();
				$("#songnav li").remove()
				$("#song").append(x);
			}
			
			insertBtn.click(function(){
				if(insertMain.css("display")=="block"){
					insertMain.fadeOut("fast");
				}else{
					insertMain.fadeIn("fast");
				}
			});
			
			closeBtn.click(function(){
				insertMain.fadeOut("fast");
			});

		});
	</script>
	<?php
}

function play() {
	$musicPlayerUrl = "http://box.baidu.com/widget/flash/bdspacesong.swf?from=tiebasongwidget&url=&name=$1";
	$iframe ='<iframe style="width:400px;height:96px;border:none" frameborder="0" id="bd_player_iframe" name="bd_player_iframe" src="'.$musicPlayerUrl.'"></iframe>';
	$showPlayer = ob_get_clean();
	$showPlayer = preg_replace("/\[bdmusic\](.*?)\[\/bdmusic\]/i",$iframe , $showPlayer);
	//$showPlayer = preg_replace('/(<meta name="description" content=")(.*)(<embed.*<\/embed>)(.*)(" \/>)/', '\1\2\4\5', $showPlayer);
	ob_start();
	echo $showPlayer;
}

addAction('adm_writelog_head', 'insertBDMusic');
//addAction('index_footer','play');