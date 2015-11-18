<?php defined('IN_ADMIN') or exit('No permission resources.'); ?>

<div class="panel panel-default grid">
	<div class='panel-heading'>
		<i class='glyphicon glyphicon-th-list'></i>人员踪迹
		<div class='panel-filter '>
			<form class="form-inline" role="form" method="get">
				<div class="form-group">
					<label for="keyword" class="form-control-static control-label">关键词</label>
					<input class="form-control input-sm" type="text" name="keyword"
						value="keyword" id="keyword" placeholder="请输入关键词" />
				</div>
				<button type="submit" name="dosubmit" value="搜索"
					class="btn btn-success">
					<i class="glyphicon glyphicon-search"></i>
				</button>
			</form>
		</div>
	</div>

	<div class="panel-body">
		<img src="/areaimage/main.jpg" alt="人员踪迹">
	</div>
</div>

<script language="javascript" type="text/javascript"> var folder_name = "<?php echo $folder_name?>";
    var controller_name = "<?php echo $controller_name?>";
    require(['/scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/index.js']); </script>