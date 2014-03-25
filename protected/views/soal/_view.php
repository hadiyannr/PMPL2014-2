<?php
/* @var $this TryoutController */
/* @var $data Tryout */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomor')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->nomor), array('view', 'nomor'=>$data->nomor)); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />        	
        
</div>