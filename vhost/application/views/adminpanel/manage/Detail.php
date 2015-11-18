<?php defined('IN_ADMIN') or exit('No permission resources.'); ?>

<div class="panel panel-default grid">
	<div class='panel-heading'>
		<i class='glyphicon glyphicon-th-list'></i> 详细信息
		<div class='panel-tools'>
			<div class='btn-group'>
            <?php aci_ui_a($folder_name,'manage','index','',' class="btn "','<span class="glyphicon glyphicon-arrow-left"></span> 返回')?>
        </div>
		</div>

	</div>

	<div class="panel-body">
			<table class="table table-border table-hover dataTable">
				<thead>
					<tr>
						<th>人员ID</th>
						<th>编号</th>
						<th>姓名</th>
						<th>出生日期</th>
						<th>性别</th>
						<th>教育程度</th>
						<th>工作</th>
						<th>出生地</th>
						<th>居住地</th>
						<th>国籍</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $detail['people_id']?></td>
						<td><?php echo $detail['no']?></td>
						<td><?php echo $detail['name'] ?></td>
						<td><?php echo $detail['birthday'] ?></td>
						<td><?php echo $detail['gender'] ?></td>
						<td><?php echo $detail['education'] ?></td>
						<td><?php echo $detail['jobcareer']?></td>
						<td><?php echo $detail['regaddress']?></td>
						<td><?php echo $detail['address']?></td>
						<td><?php echo $detail['nationality']?></td>
					</tr>
                    </tbody>
			</table>
			</br>
			<table class="table table-border table-hover dataTable">
				<thead>
					<tr>
						<th>区域编码</th>
						<th>刑期</th>
						<th>刑期开始</th>
						<th>刑期结束</th>
						<th>入园时间</th>
						<th>安全级别</th>
						<th>状态</th>
						<th>更新时间</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $detail['area_code']?></td>
						<td><?php echo $detail['term'] ?></td>
						<td><?php echo $detail['term_begin'] ?></td>
						<td><?php echo $detail['term_end'] ?></td>
						<td><?php echo $detail['arrival_day'] ?></td>
						<td><?php echo $detail['level']?></td>
						<td><?php echo isset($this->config->item('prisonerdetail_status')[intval($detail['status'])])?$this->config->item('prisonerdetail_status')[$detail['status']]:"未知状态" ?></td>
						<td><?php echo $detail['update_timestamp']?></td>
					</tr>
                    </tbody>
			</table>
			</br>
						<table class="table table-border table-hover dataTable">
				<thead>
					<tr>
						<th>犯罪信息</th>
						<th>多项罪名</th>
						<th>类似罪行</th>
						<th>原因</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $detail['charge']?></td>
						<td><?php echo $detail['multicrime']?></td>
						<td><?php echo $detail['samecharge']?></td>
						<td><?php echo $detail['cause']?></td>
					</tr>
                    </tbody>
			</table>
        </div>
    </div>
</div>

<script language="javascript" type="text/javascript"> var folder_name = "<?php echo $folder_name?>";
    var controller_name = "<?php echo $controller_name?>";
    require(['/scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/index.js']); </script>