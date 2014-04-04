<?php
/* @var $this TryoutController */
/* @var $data Tryout */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('waktuMulai')); ?>:</b>
	<?php echo CHtml::encode($data->waktuMulai); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('durasi')); ?>:</b>
	<?php echo CHtml::encode($data->durasi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal); ?>
	<br />        
        
</div>