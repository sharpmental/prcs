<?php defined('IN_ADMIN') or exit('No permission resources.'); ?>

<form class="form-horizontal" role="form" id="validateform"
	name="validateform" action="<?php echo current_url()?>">

	<div class='panel panel-default'>
		<div class='panel-heading'>
			<i class='glyphicon glyphicon-edit'></i> 新增用户资料
			<div class='panel-tools'>

				<div class='btn-group'>
				<?php aci_ui_a($folder_name,'edittable','index','',' class="btn  btn-sm pull-right"','<span class="glyphicon glyphicon-arrow-left"></span> 返回')?>

			</div>
			</div>
		</div>
		<div class='panel-body'>
			<fieldset>
				<div class="form-group">
					<label for="role_name" class="col-sm-2 control-label">人员标识</label>
					<div class="col-sm-9">
						<input type="text" name="people_id" id="people_id"
							value='<?php echo $data_info['people_id'];?>'
							class="form-control validate[required]" placeholder="请输入人员ID">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">人员名称</label>
					<div class="col-sm-9">
						<input type="text" name="people_name" id="people_name"
							value='<?php echo $data_info['people_name'];?>'
							class="form-control validate[required]" placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">人员所属部门</label>
					<div class="col-sm-9">
						<select class="form-control validate[required] " name="dep_id">
							<option value="">==请选择==</option>
						<?php
    foreach ($dep_list as $k => $v) {
        if ($v['dep_id'] == $data_info['dep_id'])
            echo '<option value="' . $v['dep_id'] . '" selected="selected">' . $v['dep_name'] . '</option>';
        else
            echo '<option value="' . $v['dep_id'] . '">' . $v['dep_name'] . '</option>';
    }
    ?>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">人员配带腕带标识</label>
					<div class="col-sm-9">
						<select class="form-control validate[required] " name="watch_id">
							<option value="">==请选择==</option>
						<?php
    foreach ($watch_list as $k => $v) {
        if ($v['watch_id'] == $data_info['watch_id'])
            echo '<option value="' . $v['watch_id'] . '" selected="selected">' . $v['watch_id'] . '</option>';
        else
            echo '<option value="' . $v['watch_id'] . '" >' . $v['watch_id'] . '</option>';
    }
    
    ?>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">人员的初始位置</label>
					<div class="col-sm-9">
						<input type="text" name="initloc" id="initloc"
							value='<?php echo $data_info['init_locarea_id'];?>'
							class="form-control validate[required]" placeholder="请输入">
					</div>
				</div>
			</fieldset>

			<div class='form-actions'>
		<?php aci_ui_button($folder_name,'role','edit','type="submit" id="dosubmit" class="btn btn-primary "','保存')?>
	</div>
		</div>
	</div>
</form>

<script language="javascript" type="text/javascript"> var folder_name = "<?php echo $folder_name?>";
    var controller_name = "<?php echo $controller_name?>";
    require(['/scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/add.js']); </script>