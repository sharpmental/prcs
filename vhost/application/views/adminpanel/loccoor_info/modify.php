<?php defined('IN_ADMIN') or exit('No permission resources.'); ?>

<form class="form-horizontal" role="form" id="validateform"
	name="validateform" action="<?php echo current_url()?>">

	<div class='panel panel-default'>
		<div class='panel-heading'>
			<i class='glyphicon glyphicon-edit'></i> 修改定位坐标系
			<div class='panel-tools'>
				<div class='btn-group'>
				<?php aci_ui_a($folder_name,'edittable','index/4','',' class="btn  btn-sm pull-right"','<span class="glyphicon glyphicon-arrow-left"></span> 返回')?>
			</div>
			</div>
		</div>
		<div class='panel-body'>
			<fieldset>
				<div class="form-group">
					<label for="role_name" class="col-sm-2 control-label">坐标标识</label>
					<div class="col-sm-9">
						<input type="text" name="coor_id" id="coor_id" value='<?php echo $data_info['coor_id']?>'
							class="form-control"  placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">定位坐标系名称</label>
					<div class="col-sm-9">
						<input type="text" name="coor_name" id="coor_name" value='<?php echo $data_info['coor_name']?>'
							class="form-control"  placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">坐标 x 值</label>
					<div class="col-sm-9">
						<input type="text" name="ori_x" id="ori_x" value='<?php echo $data_info['ori_x']?>'
							class="form-control"  placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">坐标 y 值</label>
					<div class="col-sm-9">
						<input type="text" name="ori_y" id="ori_y" value='<?php echo $data_info['ori_y']?>'
							class="form-control"  placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">坐标 z 值</label>
					<div class="col-sm-9">
						<input type="text" name="ori_z" id="ori_z" value='<?php echo $data_info['ori_z']?>'
							class="form-control"  placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">全局水平夹角</label>
					<div class="col-sm-9">
						<input type="text" name="angle_h" id="angle_h" value='<?php echo $data_info['angle_h']?>'
							class="form-control"  placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">全局垂直夹角</label>
					<div class="col-sm-9">
						<input type="text" name="angle_v" id="angle_v" value='<?php echo $data_info['angle_v']?>'
							class="form-control"  placeholder="请输入">
					</div>
				</div>
			</fieldset>

			<div class='form-actions'>
		<?php aci_ui_button($folder_name,'loccoor_info','modify','type="submit" id="dosubmit" class="btn btn-primary "','保存')?>
	</div>
		</div>
	</div>
</form>

<script language="javascript" type="text/javascript"> var folder_name = "<?php echo $folder_name?>";
    var controller_name = "<?php echo $controller_name?>";
    var id = "<?php echo $data_info['coor_id']?>";
    require(['/scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/modify.js']); </script>