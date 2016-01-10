<?php defined('IN_ADMIN') or exit('No permission resources.'); ?>

<form class="form-horizontal" role="form" id="validateform"
	name="validateform" action="<?php echo current_url()?>">

	<div class='panel panel-default'>
		<div class='panel-heading'>
			<i class='glyphicon glyphicon-edit'></i>修改进入天线 
			<div class='panel-tools'>
				<div class='btn-group'>
				<?php aci_ui_a($folder_name,'edittable','index/0','',' class="btn  btn-sm pull-right"','<span class="glyphicon glyphicon-arrow-left"></span> 返回')?>
			</div>
			</div>
		</div>
		<div class='panel-body'>
			<fieldset>
				<div class="form-group">
					<label for="role_name" class="col-sm-2 control-label">部门标识</label>
					<div class="col-sm-9">
						<select class="form-control validate[required] " name="dep_id"
							id="dep_id" disabled="disabled">
							<option value="">==请选择==</option>
						<?php
    foreach ($dep_list as $k => $v) {
        if ($v['dep_id'] == $data_info['dep_id'])
            echo '<option value="' . $v['dep_id'] . '" selected="selected ">' . $v['dep_name'] . '</option>';
        else
            echo '<option value="' . $v['dep_id'] . '">' . $v['dep_name'] . '</option>';
    }
    ?>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">接收天线标识</label>
					<div class="col-sm-9">
						<select class="form-control validate[required] " name="ru_id"
							id="ru_id" disabled="disabled">
							<option value="">==请选择==</option>
						<?php
    foreach ($recvunit_list as $k => $v) {
        if ($v['ru_id'] == $data_info['ru_id'])
            echo '<option value="' . $v['ru_id'] . '" selected="selected ">' . $v['ru_id'] . '</option>';
        else
            echo '<option value="' . $v['ru_id'] . '">' . $v['ru_id'] . '</option>';
    }
    ?>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">监控区域标识</label>
					<div class="col-sm-9">
						<select class="form-control validate[required] " name="monarea_id"
							id="monarea_id">
							<option value="">==请选择==</option>
						<?php
    foreach ($monarea_list as $k => $v) {
        if ($data_info['monarea_id'] == $v['monarea_id'])
            echo '<option value="' . $v['monarea_id'] . '" selected = "selected ">' . $v['monarea_id'] . '</option>';
       
            else 
                echo '<option value="' . $v['monarea_id'] . '">' . $v['monarea_id'] . '</option>';
    }
    ?>
					</select>
					</div>
				</div>
			</fieldset>

			<div class='form-actions'>
		<?php aci_ui_button($folder_name,'dep_ru_enter','modify','type="submit" id="dosubmit" class="btn btn-primary "','保存')?>
	</div>
		</div>
	</div>
</form>

<script language="javascript" type="text/javascript"> var folder_name = "<?php echo $folder_name?>";
    var controller_name = "<?php echo $controller_name?>";
    var id = "<?php echo $data_info['ru_id']?>";
    require(['/scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/modify.js']); </script>