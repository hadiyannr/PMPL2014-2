<?php
/* @var $this SoalController */
/* @var $data Question */
?>

<div class="view">	
		

	<b><?php echo CHtml::encode($data->getAttributeLabel('pertanyaan')); ?>:</b>
	<?php echo CHtml::encode($data->pertanyaan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomor')); ?>:</b>
	<?php echo CHtml::encode($data->nomor); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('opsis')); ?>:</b>
	<?php echo CHtml::encode($data->opsis); ?>
	<br />


</div>