<?php defined('IN_ADMIN') or exit('No permission resources.'); ?>

<form class="form-horizontal" role="form" id="validateform" name="validateform" action="<?php echo current_url()?>" >

<div class='panel panel-default'>
	<div class='panel-heading'>
		<i class='glyphicon glyphicon-edit'></i>修改人员资料
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
					<input type="text" name="person_id"  id="person_id"  value='<?php echo $data_info["people_id"]; ?>'  class="form-control validate[required]"  placeholder="" >
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-sm-2 control-label">编号</label>
				<div class="col-sm-9">
					<input type="text" name="person_no"  id="person_no"  value='<?php echo $data_info["no"]; ?>'  class="form-control validate[required]"  placeholder="" >
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-sm-2 control-label">姓名</label>
				<div class="col-sm-9">
					<input type="text" name="person_name"  id="person_name"  value='<?php echo $data_info["name"] ?>'  class="form-control validate[required]"  placeholder="" >
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-sm-2 control-label">出生日期</label>
				<div class="col-sm-9">
					<input type="text" name="birthday"  id="birthday"  value='<?php echo $data_info["birthday"]; ?>'  class="form-control validate[required]"  placeholder="" >
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-sm-2 control-label">性别</label>
				<div class="col-sm-9">
					<input type="text" name="gender"  id="gender"  value='<?php echo $data_info["gender"]; ?>'  class="form-control validate[required]"  placeholder="请输入" >
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-sm-2 control-label">教育程度</label>
				<div class="col-sm-9">
					<input type="text" name="education"  id="education"  value='<?php echo $data_info["education"]; ?>'  class="form-control validate[required]"  placeholder="请输入" >
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-sm-2 control-label">工作</label>
				<div class="col-sm-9">
					<input type="text" name="job"  id="job"  value='<?php echo $data_info["jobcareer"]; ?>'  class="form-control validate[required]"  placeholder="请输入" >
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-sm-2 control-label">出生地</label>
				<div class="col-sm-9">
					<input type="text" name="homeland"  id="homeland"  value='<?php echo $data_info["regaddress"]; ?>'  class="form-control validate[required]"  placeholder="请输入" >
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-sm-2 control-label">居住地</label>
				<div class="col-sm-9">
					<input type="text" name="liveland"  id="liveland"  value='<?php echo $data_info["address"]; ?>'  class="form-control validate[required]"  placeholder="请输入" >
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-sm-2 control-label">国籍</label>
				<div class="col-sm-9">
					<input type="text" name="national"  id="national"  value='<?php echo $data_info["nationality"]; ?>'  class="form-control validate[required]"  placeholder="请输入" >
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-sm-2 control-label">区域编码</label>
				<div class="col-sm-9">
					<input type="text" name="zipcode"  id="zipcode"  value='<?php echo $data_info["area_code"]; ?>'  class="form-control validate[required]"  placeholder="请输入" >
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-sm-2 control-label">刑期</label>
				<div class="col-sm-9">
					<input type="text" name="sentence"  id="sentence"  value='<?php echo $data_info["term"]; ?>'  class="form-control validate[required]"  placeholder="请输入" >
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-sm-2 control-label">刑期开始</label>
				<div class="col-sm-9">
					<input type="text" name="start"  id="start"  value='<?php echo $data_info["term_begin"]; ?>'  class="form-control validate[required]"  placeholder="请输入" >
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-sm-2 control-label">刑期结束</label>
				<div class="col-sm-9">
					<input type="text" name="end"  id="end"  value='<?php echo $data_info["term_end"]; ?>'  class="form-control validate[required]"  placeholder="请输入" >
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-sm-2 control-label">入园时间</label>
				<div class="col-sm-9">
					<input type="text" name="entertime"  id="entertime"  value='<?php echo $data_info["arrival_day"]; ?>'  class="form-control validate[required]"  placeholder="请输入" >
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-sm-2 control-label">安全级别</label>
				<div class="col-sm-9">
					<input type="text" name="level"  id="level"  value='<?php echo $data_info["level"]; ?>'  class="form-control validate[required]"  placeholder="请输入" >
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-sm-2 control-label">状态</label>
				<div class="col-sm-9">
					<input type="text" name="status"  id="status"  value='<?php echo $data_info["status"]; ?>'  class="form-control validate[required]"  placeholder="请输入" >
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-sm-2 control-label">犯罪信息</label>
				<div class="col-sm-9">
					<input type="text" name="crime"  id="crime"  value='<?php echo $data_info["charge"]; ?>'  class="form-control validate[required]"  placeholder="请输入" >
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-sm-2 control-label">多项罪名</label>
				<div class="col-sm-9">
					<input type="text" name="multiple"  id="multiple"  value='<?php echo $data_info["multicrime"]; ?>'  class="form-control validate[required]"  placeholder="请输入" >
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-sm-2 control-label">类似罪行</label>
				<div class="col-sm-9">
					<input type="text" name="simcrime"  id="simcrime"  value='<?php echo $data_info["samecharge"]; ?>'  class="form-control validate[required]"  placeholder="请输入" >
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-sm-2 control-label">原因</label>
				<div class="col-sm-9">
					<input type="text" name="cause"  id="cause"  value='<?php echo $data_info["cause"]; ?>'  class="form-control validate[required]"  placeholder="请输入" >
				</div>
			</div>
		</fieldset>

	<div class='form-actions'>
		<?php aci_ui_button($folder_name,'people_detail','modify','type="submit" id="dosubmit" class="btn btn-primary "','修改')?>
	</div>
	</div>
	</div>
</form>

<script language="javascript" type="text/javascript"> var folder_name = "<?php echo $folder_name?>";
    var controller_name = "<?php echo $controller_name?>";
    require(['/scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/add.js']); </script>