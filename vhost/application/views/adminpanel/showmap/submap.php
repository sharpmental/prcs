<?php defined('IN_ADMIN') or exit('No permission resources.'); ?>

<div class="panel panel-default grid">
	<div class='panel-heading'>
		<i class='glyphicon glyphicon-th-list'></i>地图
		<div class='panel-tools'>
			<div class='btn-group'>
            <?php aci_ui_a($folder_name,'manage','index','',' class="btn "','<span class="glyphicon glyphicon-arrow-left"></span> 返回')?>
        </div>
		</div>

	</div>

	<div class="panel-body" style="position:relative;">
		<img alt="MAINIMAGE" src="/areaimage/"<?php echo $submap?>.jpg" width=900 height=500 class="img-responsive img-thumbnail" style="z-index:-1;opacity:1">
		<?php foreach($div_list as $k => $v) {?>
		<a href="<?php base_url($folder_name.$v['link'])?>"	
		style="position: absolute;
		left: <?php echo $v['pos_x']?>px;
		top: <?php echo $v['pos_y']?>px; 
		width:<?php echo $v['width']?>px; 
		height:<?php echo $v['height']?>px;
		z-index: 1;
		text-align:center;"
		class="square">
		<?php echo $v['locarea_name'];?>
		<br>
		<?php echo $v['count']?>
		</a>
		<?php }?>
	</div>
</div>
</div>
</div>

<script language="javascript" type="text/javascript"> var folder_name = "<?php echo $folder_name?>";
    var controller_name = "<?php echo $controller_name?>";
    require(['/scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/index.js']); </script>