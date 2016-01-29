<?php defined('IN_ADMIN') or exit('No permission resources.'); ?>

<form class="form-horizontal" role="form" id="validateform"
	name="validateform" action="<?php echo current_url()?>">

	<div class='panel panel-default'>
		<div class='panel-heading'>
			<i class='glyphicon glyphicon-edit'></i> 修改区域信息
			<div class='panel-tools'>

				<div class='btn-group'>
				<?php aci_ui_a($folder_name,'edittable','index/4','',' class="btn  btn-sm pull-right"','<span class="glyphicon glyphicon-arrow-left"></span> 返回')?>

			</div>
			</div>
		</div>
		<div class='panel-body'>
			<fieldset>
				<div class="form-group">
					<label for="role_name" class="col-sm-2 control-label">区域标识</label>
					<div class="col-sm-9">
						<input type="text" name="locarea_id" id="locarea_id" value='<?php echo $data_info['locarea_id']; ?>'
							class="form-control validate[required]" placeholder="请输入区域ID">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">区域名称</label>
					<div class="col-sm-9">
						<input type="text" name="locarea_name" id="locarea_name" value='<?php echo $data_info['locarea_name']; ?>'
							class="form-control validate[required]" placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">坐标编号</label>
					<div class="col-sm-9">
						<select class="form-control validate[required] " name="dep_id">
							<option value="">==请选择==</option>
						<?php
    foreach ($loccoor_list as $k => $v) {
        if ($v['coor_id'] == $data_info['coor_id'])
            echo '<option value="' . $v['coor_id'] . '" selected="selected">' . $v['coor_id'] . '</option>';
        else
            echo '<option value="' . $v['coor_id'] . '">' . $v['coor_id'] . '</option>';
    }
    ?>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">X坐标</label>
					<div class="col-sm-9">
						<input type="text" name="cent_x" id="cent_x" value='<?php echo $data_info['cent_x']; ?>'
							class="form-control validate[required]" placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">Y坐标</label>
					<div class="col-sm-9">
						<input type="text" name="cent_y" id="cent_y" value='<?php echo $data_info['cent_y']; ?>'
							class="form-control validate[required]" placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">X尺寸</label>
					<div class="col-sm-9">
						<input type="text" name="size_x" id="size_x" value='<?php echo $data_info['size_x']; ?>'
							class="form-control validate[required]" placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">Y尺寸</label>
					<div class="col-sm-9">
						<input type="text" name="size_y" id="size_y" value='<?php echo $data_info['size_y']; ?>'
							class="form-control validate[required]" placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">是否显示</label>
					<div class="col-sm-9">
						<input type="text" name="show" id="show" value='<?php echo $data_info['show']; ?>'
							class="form-control validate[required]" placeholder="0">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">上级区域号码</label>
					<div class="col-sm-9">
						<input type="text" name="parentid" id="parentid" value='<?php echo $data_info['parentid']; ?>'
							class="form-control validate[required]" placeholder="0">
					</div>
				</div>
			</fieldset>

			<div class='form-actions'>
		<?php aci_ui_button($folder_name,'locarea_info','modify','type="submit" id="dosubmit" class="btn btn-primary "','保存')?>
	</div>
		</div>
	</div>
</form>

<script language="javascript" type="text/javascript"> var folder_name = "<?php echo $folder_name?>";
    var controller_name = "<?php echo $controller_name?>";
    var id = "<?php echo $data_info['locarea_id']?>";
    var type = "<?php echo $type ?>";
    require(['/scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/modify.js']); </script>