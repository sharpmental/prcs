<?php defined('IN_ADMIN') or exit('No permission resources.'); ?>

<form class="form-horizontal" role="form" id="validateform"
	name="validateform" action="<?php echo current_url()?>">

	<div class='panel panel-default'>
		<div class='panel-heading'>
			<i class='glyphicon glyphicon-edit'></i> 修改接收单元信息
			<div class='panel-tools'>
				<div class='btn-group'>
				<?php aci_ui_a($folder_name,'edittable','index/0','',' class="btn  btn-sm pull-right"','<span class="glyphicon glyphicon-arrow-left"></span> 返回')?>
			</div>
			</div>
		</div>
		<div class='panel-body'>
			<fieldset>
				<div class="form-group">
					<label for="role_name" class="col-sm-2 control-label">接收单元标识</label>
					<div class="col-sm-9">
						<input type="text" name="ru_id" id="ru_id" value='<?php echo $data_info["ru_id"] ?>'
							class="form-control"   placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">接收机ip地址</label>
					<div class="col-sm-9">
						<input type="text" name="receiver_ip" id="receiver_ip" value='<?php echo $data_info["receiver_ip"] ?>'
							class="form-control"   placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">接收天线index</label>
					<div class="col-sm-9">
						<input type="text" name="receiver_index" id="receiver_index" value='<?php echo $data_info["receiver_index"] ?>'
							class="form-control"   placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">区域标识</label>
					<div class="col-sm-9">
						<select class="form-control validate[required] " name="locarea_id">
							<option value="">==请选择==</option>
						<?php
    foreach ($locarea_list as $k => $v) {
        if ($data_info['locarea_id'] == $v['locarea_id'])
            echo '<option value="' . $v['locarea_id'] . '" selected = "selected ">' . $v['locarea_name'] . '</option>';
        else
            echo '<option value="' . $v['locarea_id'] . '">' . $v['locarea_name'] . '</option>';
    }
    ?>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">坐标系ID</label>
					<div class="col-sm-9">
						<select class="form-control validate[required] " name="loccoor_id">
							<option value="">==请选择==</option>
						<?php
    foreach ($loccoor_list as $k => $v) {
        if($data_info['loccoor_id'] == $v['loccoor_id'])
            echo '<option value="' . $v['coor_id'] . '" selected = "selected ">' . $v['coor_id'] . '</option>';
        else
            echo '<option value="' . $v['coor_id'] . '">' . $v['coor_id'] . '</option>';
    }
    ?>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">安装位置坐标 x 值</label>
					<div class="col-sm-9">
						<input type="text" name="pos_x" id="pos_x" value='<?php echo $data_info['pos_x'] ?>'
							class="form-control"   placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">安装位置坐标 y 值</label>
					<div class="col-sm-9">
						<input type="text" name="pos_y" id="pos_y" value='<?php echo $data_info['pos_y'] ?>'
							class="form-control"   placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">定位权重</label>
					<div class="col-sm-9">
						<input type="text" name="weight" id="weight" value='<?php echo $data_info['weight'] ?>'
							class="form-control"   placeholder="请输入">
					</div>
				</div>
			</fieldset>

			<div class='form-actions'>
		<?php aci_ui_button($folder_name,'people_info','modify','type="submit" id="dosubmit" class="btn btn-primary "','保存')?>
	</div>
		</div>
	</div>
</form>

<script language="javascript" type="text/javascript"> var folder_name = "<?php echo $folder_name?>";
    var controller_name = "<?php echo $controller_name?>";
    var id = "<?php echo $data_info['ru_id']?>";
    require(['/scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/modify.js']); </script>