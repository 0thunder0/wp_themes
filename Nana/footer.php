<div id="footer" alog-group="log-footer">
<div class="foot">
	<?php wp_reset_query();if ( is_home()){ ?>	
		<div id="links">
			<ul class="linkcat">
				<li><strong>友情链接：</strong></li>
				<?php
				wp_list_bookmarks('title_li=&categorize=0&orderby=rand&show_images=&limit=30&category='.get_option('ygj_link_id'));	
				?>
			</ul>
<div class="clear"></div>
</div>
	<?php } ?>
<div class="ps">
<div class="p p2">
<div class="p-content">
<p class="t2">站点相关</p>
<ul>
<?php echo stripslashes(get_option('ygj_yjcylj')); ?>
</ul>
</div>
<div class="clear"></div>
<div class="site-info">			
			Copyright ©&nbsp; <?php bloginfo('name');?><span class="plxiaoshi"> &nbsp; | &nbsp; Theme by <a title="WordPress免费响应式主题Nana v1.03" href="http://yigujin.wang/nana/" target="_blank">Nana</a></span><span class="footer-tag">&nbsp; | &nbsp; Powered by <a href="http://wordpress.org/" title="优雅的个人发布平台" target="_blank" rel="nofollow">WordPress</a> &nbsp; | &nbsp;  <a href="http://www.miitbeian.gov.cn/" target="_blank" rel="nofollow"><?php echo stripslashes(get_option('ygj_icp')); ?></a></span>
		</div>
</div>
<!-- 若要删除版权请加懿古今(yigujin.wang)为全站友链，或者赞助懿古今(支付宝：yigujin@qq.com)20元，谢谢支持 -->
<div class="p p3">
<div class="p-content">
<p class="t2">欢迎您关注我们</p>
<div class="qcode clearfix">
<div class="img-container">
<img src="<?php echo stripslashes(get_option('ygj_gzwm_ewm')); ?>">
</div>
<div class="link-container">
<a href="<?php echo stripslashes(get_option('ygj_gzwm_lj1')); ?>" target="_blank">
<?php echo stripslashes(get_option('ygj_gzwm_bt1')); ?></a>
<a href="<?php echo stripslashes(get_option('ygj_gzwm_lj2')); ?>" target="_blank">
<?php echo stripslashes(get_option('ygj_gzwm_bt2')); ?></a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="tools">
    <a class="tools_top" title="返回顶部"></a>
    <?php wp_reset_query(); if ( is_single() || is_page() ) { ?>
        <a class="tools_comments" title="发表评论"></a>
    <?php } else {?>
        <a href="<?php echo stripslashes(get_option('ygj_lyburl')); ?>#respond" class="tools_comments" title="给我留言" target="_blank" rel="nofollow"></a>
    <?php } ?>
</div>
<?php if (!get_option('ygj_post_baidu') ) { ?>
<?php if (is_single() || is_page() ) { ?>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
<?php }} ?>
<?php if(get_option('ygj_360sl')){ ?>
<script>
(function(){
   var src = document.location.protocol +'//js.passport.qihucdn.com/11.0.1.js?<?php echo stripslashes(get_option('ygj_360sl_id')); ?>';
   document.write('<script src="' + src + '" id="sozz"><\/script>');
})();
</script>
<?php } ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/superfish.js"></script>
<?php wp_footer(); ?>
</body></html>