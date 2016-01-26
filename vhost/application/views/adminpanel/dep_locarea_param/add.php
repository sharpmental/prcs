<?php defined('IN_ADMIN') or exit('No permission resources.'); ?>

<form class="form-horizontal" role="form" id="validateform"
	name="validateform" action="<?php echo current_url()?>">

	<div class='panel panel-default'>
		<div class='panel-heading'>
			<i class='glyphicon glyphicon-edit'></i> 新增部门定位参数
			<div class='panel-tools'>
				<div class='btn-group'>
				<?php aci_ui_a($folder_name,'edittable','index/4'.$type,'',' class="btn  btn-sm pull-right"','<span class="glyphicon glyphicon-arrow-left"></span> 返回')?>
			</div>
			</div>
		</div>
		<div class='panel-body'>
			<fieldset>
				<div class="form-group">
					<label for="role_name" class="col-sm-2 control-label">部门标识</label>
					<div class="col-sm-9">
						<select class="form-control validate[required] " name="dep_id"
							id="dep_id">
							<option value="">==请选择==</option>
						<?php
    foreach ($dep_list as $k => $v) {
        echo '<option value="' . $v['dep_id'] . '">' . $v['dep_name'] . '</option>';
    }
    ?>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">区域标志</label>
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
					<label for="description" class="col-sm-2 control-label">延迟率</label>
					<div class="col-sm-9">
						<input type="text" name="delay_ratio" id="delay_ratio" value=''
							class="form-control"  placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">夜间延迟率</label>
					<div class="col-sm-9">
						<input type="text" name="night_delay_ratio" id="night_delay_ratio" value=''
							class="form-control"  placeholder="请输入">
					</div>
				</div>
			</fieldset>

			<div class='form-actions'>
		<?php aci_ui_button($folder_name,'dep_locarea_param','add','type="submit" id="dosubmit" class="btn btn-primary "','保存')?>
	</div>
		</div>
	</div>
</form>

<script language="javascript" type="text/javascript"> var folder_name = "<?php echo $folder_name?>";
    var controller_name = "<?php echo $controller_name?>";
    var type = "<?php echo $type ?>";
    require(['/scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/add.js']); </script>