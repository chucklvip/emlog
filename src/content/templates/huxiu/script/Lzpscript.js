/**
 * Author: Liuzp
 * Author Email: root@liuzp.com
 * Author URL: http://www.liuzp.com
 * 
   !###|           |########!   !###|           !###%.   !##################&'  .%############&'
   !###|           :%&####&%'   !###|           !###%.   :$&&&&&&&&&&&@####%.   .%###@&&&@######&'
   !###|             :@##&'     !###|           !###%.               ;####!     .%###!      `&###$`
   !###|             :@##&'     !###|           !###%.              %###&'      .%###!       :@##@:
   !###|             :@##&'     !###|           !###%.            '&###%        .%###!       :@##@'
   !###|             :@##&'     !###|           !###%.           !####;         .%###!      :@###|
   !###|             :@##&'     !###|           !###%.         .%###$`          .%###@&&@#######!
   !###|             :@##&'     !###|           !###%.        :@###|            .%###########@:
   !###|             :@##&'     !###%.          !###|        !###@:             .%###!
   !###|             :@##&'     :@##@:         `$###!      `$###$.              .%###!
   !###|             :@##&'      |####;       `$###%.     :@###!                .%###!
   !#############$'|########!     |#######@#######%.     |##################%.  .%###!
   !#############$:|########!      .|###########|.      !###################%.  .%###!
 *
 **/
function scrollNav(){function i(e){t.removeClass("hover"),t.eq(e).addClass("hover"),n.stop(!0,!1).animate({left:e*70-14},{easing:"easeOutElastic",duration:600,complete:function(){}})}var e=$("#menu"),t=e.children("li"),n=e.next(".scrollHover"),r=e.children(".current");r.text()==""&&(r=e.children("li").eq(0)),r.addClass("hover"),n.css({left:r.index()*70-14}),t.hover(function(){var e=$(this).index(),t=$(this).children("ul").children("li");$(this).children("ul").stop().animate({height:t.length*t.height()+t.length*1},200),r.index()!=e&&i(e)},function(){$(this).children("ul").stop().animate({height:0},200),r.index()!=$(this).index()&&i(r.index())})}function pageMove(){var e=$(".page > .move");e.hover(function(){$(this).children("i").show(),$(this).stop(!0,!1).animate({width:"55px"},{easing:"easeOutElastic",duration:400})},function(){$(this).children("i").hide(),$(this).stop(!0,!1).animate({width:"32px"},{easing:"easeOutCubic",duration:400})})}function textMove(){$(".nextlog a, .readmore").hover(function(){$(this).animate({marginLeft:10},200)},function(){$(this).animate({marginLeft:0},100)})}$(function(){scrollNav(),pageMove(),textMove()})