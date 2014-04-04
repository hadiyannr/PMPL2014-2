<?php
/* @var $this KontenController */
/* @var $data Konten */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcategory')); ?>:</b>
	<?php echo CHtml::encode($data->idcategory); ?>
	<br />
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('judul')); ?>:</b>
	<?php echo CHtml::encode($data->judul); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isPublished')); ?>:</b>
	<?php echo CHtml::encode($data->isPublished); ?>
	<br />


</div>