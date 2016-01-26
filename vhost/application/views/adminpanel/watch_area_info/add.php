<?php defined('IN_ADMIN') or exit('No permission resources.'); ?>

<form class="form-horizontal" role="form" id="validateform"
	name="validateform" action="<?php echo current_url()?>">

	<div class='panel panel-default'>
		<div class='panel-heading'>
			<i class='glyphicon glyphicon-edit'></i>新增腕表位置信息
			<div class='panel-tools'>

				<div class='btn-group'>
				<?php aci_ui_a($folder_name,'edittable','index/4','',' class="btn  btn-sm pull-right"','<span class="glyphicon glyphicon-arrow-left"></span> 返回')?>

			</div>
			</div>
		</div>
		<div class='panel-body'>
			<fieldset>
				<div class="form-group">
					<label for="role_name" class="col-sm-2 control-label">腕表标识</label>
					<div class="col-sm-9">
						<select class="form-control validate[required] " name="watch_id"
							id="watch_id">
							<option value="">==请选择==</option>
						<?php
    foreach ($watch_list as $k => $v) {
        echo '<option value="' . $v['watch_id'] . '">' . $v['watch_id'] . '</option>';
    }
    ?>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">腕表状态</label>
					<div class="col-sm-9">
						<input type="text" name="alarm_type" id="alarm_type" value=''
							class="form-control validate[required]" placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">区域信息 </label>
					<div class="col-sm-9">
						<select class="form-control validate[required] " name="locarea_id"
							id="locarea_id">
							<option value="">==请选择==</option>
						<?php
    foreach ($locarea_list as $k => $v) {
        echo '<option value="' . $v['locarea_id'] . '">' . $v['locarea_id'] . '</option>';
    }
    ?>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">监控区域信息 </label>
					<div class="col-sm-9">
						<select class="form-control validate[required] " name="monarea_id"
							id="monarea_id">
							<option value="">==请选择==</option>
						<?php
    foreach ($monarea_list as $k => $v) {
        echo '<option value="' . $v['monarea_id'] . '">' . $v['monarea_id'] . '</option>';
    }
    ?>
					</select>
					</div>
				</div>
			</fieldset>

			<div class='form-actions'>
		<?php aci_ui_button($folder_name,'watch_area_info','edit','type="submit" id="dosubmit" class="btn btn-primary "','保存')?>
	</div>
		</div>
	</div>
</form>

<script language="javascript" type="text/javascript"> var folder_name = "<?php echo $folder_name?>";
    var controller_name = "<?php echo $controller_name?>";
    var type = "<?php echo $type ?>";
    require(['/scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/add.js']); </script>