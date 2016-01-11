<?php defined('IN_ADMIN') or exit('No permission resources.'); ?>

<div class="panel panel-default grid">
	<div class='panel-heading'>
		<i class='glyphicon glyphicon-th-list'></i>服务器列表
		<div class='panel-tools'>
			<div class='btn-group'>
			<?php aci_ui_a($folder_name,'manage','index','',' class="btn "','<span class="glyphicon glyphicon-arrow-left"></span> 返回')?>
            <div class="btn" id="refreshBtnF">
            <span class="glyphicon glyphicon-refresh">刷新</span>
            </div>
            </div>
        </div>
        
		<div class='panel-filter'>

			<form class="form-inline" role="form" method="get" name="searchform" action="<?php echo current_url();?>">
				<div class="form-group">
					<label for="keyword" class="form-control-static control-label">关键词</label>
					<input class="form-control input-sm" type="text" name="keyword" id="keyword" placeholder="请输入关键词" />
				</div>
				<button type="submit" name="dosubmit" value="搜索" class="btn btn-success">
					<i class="glyphicon glyphicon-search"></i>
				</button>
			</form>
		</div>
	</div>

	<div class="panel-body">
                    <?php echo $table_data;?>
                    <?php echo $pagelink;?>
	</div>

	<div class="panel-footer">
		<div class="pull-left">
			<div class="btn-group">
				<button type="button" class="btn btn-default" id="refreshBtn">
					<span class="glyphicon glyphicon-refresh">刷新</span>
                </button>
			</div>
		</div>
	</div>
</div>

<script language="javascript" type="text/javascript"> var folder_name = "<?php echo $folder_name?>";
    var controller_name = "<?php echo $controller_name?>";
    require(['/scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/index.js']); </script>