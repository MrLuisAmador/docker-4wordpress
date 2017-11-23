<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package la
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer__inner-wrap">
			<div class="site-info">
				 © <?php echo date('Y'); ?> All Rights Reserved. <a href="mailto:mrluisamador@gmail.com">Luis Amador<a>
			</div>

			<div class="footer-social-wrap">
				<ul class="social-icons">
					<li class="icon-linkedin"><a target="_blank" href="https://www.linkedin.com/in/mrluisamador"><i class="fa fa-linkedin-square"></i></a></li>

					<li class="icon-google"><a target="_blank" href="https://plus.google.com/u/0/+LuisAmador_la/"><i class="fa fa-google-plus-square"></i></a></li>

					<li class="icon-twitter"><a target="_blank" href="https://twitter.com/mrluisamador"><i class="fa fa-twitter-square"></i></a></li>

					<li class="icon-github"><a target="_blank" href="https://github.com/MrLuisAmador"><i class="fa fa-github-square"></i></a></li>
				</ul>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-70247510-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
