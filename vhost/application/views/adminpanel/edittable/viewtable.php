<?php defined('IN_ADMIN') or exit('No permission resources.'); ?>

<div class="panel panel-default grid">
	<div class='panel-heading'>
		<i class='glyphicon glyphicon-th-list'></i>数据表信息
		<div class='panel-tools'>
			<div class='btn-group'>
            <?php aci_ui_a($folder_name,'edittable','index','',' class="btn "','<span class="glyphicon glyphicon-arrow-left"></span> 返回')?>
            <span class="glyphicon glyphicon-refresh">刷新</span>
        </div>
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
				<button type="button" class="btn btn-default" id="newBtn">
					<span class="glyphicon glyphicon-plus">添加</span>
                </button>

			</div>
		</div>
	</div>
	
</div>
</div>

<script language="javascript" type="text/javascript"> var folder_name = "<?php echo $folder_name?>";
    var controller_name = "<?php echo $controller_name?>";
    require(['/scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/index.js']); </script>