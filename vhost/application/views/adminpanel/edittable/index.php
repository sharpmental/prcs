<?php defined('IN_ADMIN') or exit('No permission resources.'); ?>

<div class="panel panel-default grid">
	<div class='panel-heading'>
		<i class='glyphicon glyphicon-th-list'></i>数据表信息
		<div class='panel-tools'>
			<div class='btn-group'>
            <?php aci_ui_a($folder_name,'manage','index','',' class="btn "','<span class="glyphicon glyphicon-arrow-left"></span> 返回')?>
        </div>
		</div>

	</div>

	<div class="panel-body">
		<?php if(!isset($table_data)) {?>
		<h2>
			<span class="glyphicon glyphicon-remove-sign"></span>No data table
			found. Check the database or your setup!
		</h2>
		<?php } else {?>
			<div class="row placeholders">
            <?php foreach ($table_data as $k => $v){ ?>
                <div class="col-xs-12 col-sm-2 ">
				<a href=<?php echo base_url().'adminpanel/edittable/viewtable/'.$v['id']?>>
				<p class="circle" style="background-color:<?php echo $v['color']?>">
						<i class="fa <?php echo $v['icon']?> fa-2x"></i>
					</p>
					<h5><?php echo $v['table_name'] ?></h5>
					<h5><?php echo $v['comments'] ?></h5> </a> </br>
			</div>
            <?php } ?>
        </div>
		<?php }?>
    </div>
</div>
</div>

<script language="javascript" type="text/javascript"> var folder_name = "<?php echo $folder_name?>";
    var controller_name = "<?php echo $controller_name?>";
    require(['/scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/index.js']); </script>