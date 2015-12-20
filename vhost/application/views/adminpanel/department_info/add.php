<?php defined('IN_ADMIN') or exit('No permission resources.'); ?>

<form class="form-horizontal" role="form" id="validateform"
	name="validateform" action="<?php echo current_url()?>">

	<div class='panel panel-default'>
		<div class='panel-heading'>
			<i class='glyphicon glyphicon-edit'></i> 新增部门信息
			<div class='panel-tools'>

				<div class='btn-group'>
				<?php aci_ui_a($folder_name,'edittable','index','',' class="btn  btn-sm pull-right"','<span class="glyphicon glyphicon-arrow-left"></span> 返回')?>

			</div>
			</div>
		</div>
		<div class='panel-body'>
			<fieldset>
				<div class="form-group">
					<label for="role_name" class="col-sm-2 control-label">部门标识</label>
					<div class="col-sm-9">
						<input type="text" name="dep_id" id="dep_id" value=''
							class="form-control validate[required]" placeholder="请输入部门ID">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">部门名称</label>
					<div class="col-sm-9">
						<input type="text" name="dep_name" id="dep_name" value=''
							class="form-control validate[required]" placeholder="请输入">
					</div>
				</div>
			</fieldset>

			<div class='form-actions'>
		<?php aci_ui_button($folder_name,'department_info','add','type="submit" id="dosubmit" class="btn btn-primary "','保存')?>
	</div>
		</div>
	</div>
</form>

<script language="javascript" type="text/javascript"> var folder_name = "<?php echo $folder_name?>";
    var controller_name = "<?php echo $controller_name?>";
    require(['/scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/add.js']); </script>