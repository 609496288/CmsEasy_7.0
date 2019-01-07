<!-- 组件单个开始 -->
<div class="visual-drag-box box-element">
	<a href="#close" class="label label-danger remove">
	<i class="glyphicon-remove glyphicon" title="删除">
	</i>
	</a>
	<span class="drag drag-container label label-default btn-sections-config" data-target="#div-config" role="button" data-toggle="modal" title="属性"><i class="glyphicon glyphicon-cog"></i></span>
	<div class="preview">
		<img src="{$skin_path}/images/visual/modules/layouts-1.jpg" alt="描述">
		<p>
			页底推荐图文
		</p>
	</div>
	<div class=" visual-category-notifications">
		<div class="codearea">
	#[#loop plugins::categoryinfo($catid) $c#]#
			<hr class="featurette-divider">
			<!-- 页面标题开始 -->
			<div class="title">
				<h3 class="wow fadeInDown" data-wow-delay="0.5s"><a href="#[#$c['url']#]#">#[#$c['catname']#]#<small>#[#$c['subtitle']#]#</small></a></h3>
				<p class="wow fadeIn" data-wow-delay="0.5s">
					#[#$c['description']#]#
				</p>
				<span>——</span>
			</div>
			<!-- 页面标题结束 -->
			<div class="blank30">
			</div>
			<!-- 中部开始 -->
			<div class="row">
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					<p>
						#[#cut(strip_tags($c['categorycontent']),100)#]#
					</p>
					<p>
						<a title="#[#$archive['stitle']#]#" href="#[#$c['url']#]#" class="content-bottom-list-more">Learn more</a>
					</p>
				</div>
				<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
					<div class="row">
				#[#loop archive($catid,'0','0','0,0,0','20','aid','3','false','0','true','0','0','0','0') $archive#]#
						<div class="post-masonry col-xs-12 col-sm-6 col-md-4 col-lg-4">
							<a title="#[#$archive['stitle']#]#" href="#[#$archive['url']#]#" class="img-auto">
							<img class="img-responsive" alt="#[#$archive['stitle']#]#" src="#[#$archive['thumb']#]#"></a>
							<h4><a title="#[#$archive['stitle']#]#" href="#[#$archive['url']#]#">#[#$archive['title']#]#</a></h4>
							
						</div>
				#[#/loop#]#
					</div>
				</div>
			</div>
			<!-- /row -->
#[#/loop#]#
		</div>
		<div class="viewarea">
			<hr class="featurette-divider">
			<div class="title">
				<h3 class="wow fadeInDown animated" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;"><a href="/demo/free-template/f159/chan-pin-zhan-shi">栏目名称<small>PRODUCT</small></a></h3>
				<p class="wow fadeIn animated" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
				</p>
				<span>——</span>
			</div>
			<div class="blank30">
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					<p>
						随着网络应用的丰富和发展，很多网站往往不能迅速跟进大量信息衍生及业务模式变革的脚步，常常需要花费许多时间、人力和物力来处理信息更新和维护工作；遇到网站扩充的时候，整合内外网及分支网站的工作就变得更加复
					</p>
					<p>
						<a title="" href="#" class="content-bottom-list-more">Learn more</a>
					</p>
				</div>
				<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
					<div class="row">
						<div class="post-masonry col-xs-12 col-sm-6 col-md-4 col-lg-4">
							<a title="" href="#" class="img-auto">
							<img class="img-responsive" alt="#" src="{$base_url}/images/admin/visual/temp/section/section-pic-1.jpg">
							<h4>内容标题一</h4>
							</a>
						</div>
						<div class="post-masonry col-xs-12 col-sm-6 col-md-4 col-lg-4">
							<a title="" href="#" class="img-auto">
							<img class="img-responsive" alt="#" src="{$base_url}/images/admin/visual/temp/section/section-pic-2.jpg">
							<h4>内容标题二</h4>
							</a>
						</div>
						<div class="post-masonry col-xs-12 col-sm-6 col-md-4 col-lg-4">
							<a title="" href="#" class="img-auto">
							<img class="img-responsive" alt="#" src="{$base_url}/images/admin/visual/temp/section/section-pic-3.jpg">
							<h4>内容标题三</h4>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
			<!-- 组件单个结束 -->