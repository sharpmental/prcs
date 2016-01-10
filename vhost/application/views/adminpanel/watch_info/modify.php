<?php defined('IN_ADMIN') or exit('No permission resources.'); ?>

<form class="form-horizontal" role="form" id="validateform"
	name="validateform" action="<?php echo current_url()?>">

	<div class='panel panel-default'>
		<div class='panel-heading'>
			<i class='glyphicon glyphicon-edit'></i> 修改腕表信息
			<div class='panel-tools'>
				<div class='btn-group'>
				<?php aci_ui_a($folder_name,'edittable','index/0','',' class="btn  btn-sm pull-right"','<span class="glyphicon glyphicon-arrow-left"></span> 返回')?>
			</div>
			</div>
		</div>
		<div class='panel-body'>
			<fieldset>
				<div class="form-group">
					<label for="role_name" class="col-sm-2 control-label">腕表标识</label>
					<div class="col-sm-9">
						<input type="text" name="watch_id" id="watch_id" value='<?php echo $data_info['watch_id']; ?>'
							class="form-control validate[required]" placeholder="请输入人员ID">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">腕表状态</label>
					<div class="col-sm-9">
						<input type="text" name="watch_status" id="watch_status" value='<?php echo $data_info['watch_status']; ?>'
							class="form-control validate[required]" placeholder="请输入">
					</div>
				</div>
			</fieldset>

			<div class='form-actions'>
		<?php aci_ui_button($folder_name,'watch_info','edit','type="submit" id="dosubmit" class="btn btn-primary "','保存')?>
	</div>
		</div>
	</div>
</form>

<script language="javascript" type="text/javascript"> var folder_name = "<?php echo $folder_name?>";
    var controller_name = "<?php echo $controller_name?>";
    var id = "<?php echo $data_info['watch_id']?>";
    require(['/scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/modify.js']); </script>