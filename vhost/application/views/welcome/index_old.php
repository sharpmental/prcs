<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?>
{template 'public','header_view'}
<div class="site-wrapper">

	<div class="site-wrapper-inner">

		<div class="cover-container">

			<div class="masthead clearfix">
				<div class="inner">
					<h3 class="masthead-brand">Prison Resource Control System(www.prcs.com)</h3>
					<nav>
						<ul class="nav masthead-nav">
							<li class="active"><a href="<?php echo site_url()?>">首页</a></li>
						</ul>
					</nav>
				</div>
			</div>

			<div class="inner cover">
				<h1 class="cover-heading">欢迎使用PRSC.请使用新版本的浏览器并不要关闭javascript，否则影响正常使用。</h1>
				<p class="lead">恭喜您安装成功，默认管理帐号admin/0002</p>
				<p class="lead">
					<a href="<?php echo site_url('adminpanel')?>"
						class="btn btn-lg btn-default">进入后台管理</a>
				</p>
			</div>

			<div class="mastfoot">
				<div class="inner">
					<p>
						Cover template for <a href="http://getbootstrap.com">Bootstrap</a>,
						by <a href="shunmin.wu@gmail.com">WSM</a>.
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
{template 'public','footer_view'}
