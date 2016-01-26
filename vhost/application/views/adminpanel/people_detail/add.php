<?php defined('IN_ADMIN') or exit('No permission resources.'); ?>

<form class="form-horizontal" role="form" id="validateform"
	name="validateform" action="<?php echo current_url()?>">

	<div class='panel panel-default'>
		<div class='panel-heading'>
			<i class='glyphicon glyphicon-edit'></i>新增人员资料
			<div class='panel-tools'>
				<div class='btn-group'>
				<?php aci_ui_a($folder_name,'edittable','index/3','',' class="btn  btn-sm pull-right"','<span class="glyphicon glyphicon-arrow-left"></span> 返回')?>
			</div>
			</div>
		</div>
		<div class='panel-body'>
			<fieldset>
				<div class="form-group">
					<label for="role_name" class="col-sm-2 control-label">人员标识</label>
					<div class="col-sm-9">
						<input type="text" name="people_id" id="people_id" value=''
							class="form-control validate[required]" placeholder="请输入人员ID">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">编号</label>
					<div class="col-sm-9">
						<input type="text" name="people_no" id="people_no" value=''
							class="form-control validate[required]" placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">姓名</label>
					<div class="col-sm-9">
						<input type="text" name="people_name" id="people_name" value=''
							class="form-control validate[required]" placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">出生日期</label>
					<div class="col-sm-9">
						<input type="text" name="birthday" id="birthday" value=''
							class="form-control validate[required]" placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">性别</label>
					<div class="col-sm-9">
						<select class="form-control validate[required] " name="gender">
							<option value="">==请选择==</option>
							<option value="男">男</option>
							<option value="女">女</option>
							<option value="不详">不详</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">教育程度</label>
					<div class="col-sm-9">
						<input type="text" name="education" id="education" value=''
							class="form-control validate[required]" placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">工作</label>
					<div class="col-sm-9">
						<input type="text" name="job" id="job" value=''
							class="form-control validate[required]" placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">出生地</label>
					<div class="col-sm-9">
						<input type="text" name="homeland" id="homeland" value=''
							class="form-control validate[required]" placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">居住地</label>
					<div class="col-sm-9">
						<input type="text" name="liveland" id="liveland" value=''
							class="form-control validate[required]" placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">国籍</label>
					<div class="col-sm-9">
						<input type="text" name="national" id="national" value=''
							class="form-control validate[required]" placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">区域编码</label>
					<div class="col-sm-9">
						<input type="text" name="zipcode" id="zipcode" value=''
							class="form-control validate[required]" placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">刑期</label>
					<div class="col-sm-9">
						<input type="text" name="sentence" id="sentence" value=''
							class="form-control validate[required]" placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">刑期开始</label>
					<div class="col-sm-9">
						<input type="text" name="start" id="start" value=''
							class="form-control validate[required]" placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">刑期结束</label>
					<div class="col-sm-9">
						<input type="text" name="end" id="end" value=''
							class="form-control validate[required]" placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">入狱时间</label>
					<div class="col-sm-9">
						<input type="text" name="entertime" id="entertime" value=''
							class="form-control validate[required]" placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">安全级别</label>
					<div class="col-sm-9">
						<input type="text" name="level" id="level" value=''
							class="form-control validate[required]" placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">状态</label>
					<div class="col-sm-9">
						<input type="text" name="status" id="status" value=''
							class="form-control validate[required]" placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">犯罪信息</label>
					<div class="col-sm-9">
						<input type="text" name="crime" id="crime" value=''
							class="form-control validate[required]" placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">多项罪名</label>
					<div class="col-sm-9">
						<input type="text" name="multiple" id="multiple" value=''
							class="form-control validate[required]" placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">类似罪行</label>
					<div class="col-sm-9">
						<input type="text" name="simcrime" id="simcrime" value=''
							class="form-control validate[required]" placeholder="请输入">
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">原因</label>
					<div class="col-sm-9">
						<input type="text" name="cause" id="cause" value=''
							class="form-control validate[required]" placeholder="请输入">
					</div>
				</div>
			</fieldset>

			<div class='form-actions'>
		<?php aci_ui_button($folder_name,'people_detail','add','type="submit" id="dosubmit" class="btn btn-primary "','保存')?>
	</div>
		</div>
	</div>
</form>

<script language="javascript" type="text/javascript"> var folder_name = "<?php echo $folder_name?>";
    var controller_name = "<?php echo $controller_name?>";
    var type = "<?php echo $type ?>";
    require(['/scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/add.js']); </script>