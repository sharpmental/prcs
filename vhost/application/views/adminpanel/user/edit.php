<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?>
<form class="form-horizontal" role="form" id="validateform" name="validateform" action="<?php echo current_url()?>" >
<div class='panel panel-default'>
	<div class='panel-heading'>
		<i class='icon-edit icon-large'></i>
		<?php echo $is_edit?"修改":"新增"?>用户资料
		<div class='panel-tools'>

			<div class='btn-group'>
				<?php aci_ui_a($folder_name,'user','index','',' class="btn  btn-sm "','<span class="glyphicon glyphicon-arrow-left"></span> 返回')?>
			</div>
		</div>
	</div>
	<div class='panel-body'>
		<fieldset>
				<legend>基本信息</legend>
<?php if(!$is_edit):?>
					<div class="form-group">
						<label class="col-sm-2 control-label">用户名</label>
						<div class="col-sm-4">
							<input type="text" name="username"  id="username"  class="form-control validate[required]"  placeholder="请输入用户名" >
						</div>
					</div>
<?php else:?>
					<div class="form-group">
						<label class="col-sm-2 control-label">用户名</label>
						<div class="col-sm-4"> <?php echo $data_info['operator_name']?>
						</div>
					</div>
<?php endif;?>
					<div class="form-group">
						<label class="col-sm-2 control-label">密码</label>
						<div class="col-sm-4">
						  <input name="password" type="password" class="form-control" id="password" placeholder="保留为空，密码不修改" value="" size="45" />
						</div>
					</div>
					<div class="form-group">
						<label  class="col-sm-2 control-label">重复密码</label>
						<div class="col-sm-4">
						  <input name="repassword" type="password" class="form-control validate[equals[password]]" id="repassword" placeholder="保留为空，密码不修改" value="" size="45" />
						</div>
					</div>
					<div class="form-group">
						<label  class="col-sm-2 control-label">用户组</label>
						<div class="col-sm-4">
						  <select class="form-control validate[required]" name="group_id">
							  <?php echo group_options($data_info['group_id'])?>
							</select>
						</div>
					</div>
			</fieldset>

		<fieldset>
			<legend>可选信息</legend>
      		<div class="form-group">
				<label  class="col-sm-2 control-label">全名</label>
				<div class="col-sm-4">
                  <input name="fullname" type="text" class="form-control" id="fullname" placeholder="请输入详细内容" value="<?php echo $data_info['operator_user']?>" size="45" />
				</div>
			</div>
	      </fieldset>


		<div class='form-actions'>
			<?php aci_ui_button($folder_name,'user','edit',' type="submit" id="dosubmit" class="btn btn-primary " ','保存')?>
		</div>
     </div>

</form>
<script language="javascript" type="text/javascript">
	var id = <?php echo $data_info['operator_id']?>;
	var edit= <?php echo $is_edit?"true":"false"?>;
	var folder_name = "<?php echo $folder_name?>";
	function getThumb(v,s,w,h){
		$("#thumb").val(v);
		$("#thumb_SRC").attr("src","<?php echo $this->method_config['upload']['thumb']['upload_url']?>"+v);
		$("#dialog" ).dialog("close");
	}
	require(['/scripts/<?php echo $folder_name?>/user/edit.js']);
</script>