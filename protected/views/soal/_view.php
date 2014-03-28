<?php
/* @var $this SoalController */
/* @var $data Soal */
?>

<div class="view">	
		

	<b><?php echo CHtml::encode($data->getAttributeLabel('pertanyaan')); ?>:</b>
	<?php echo CHtml::encode($data->pertanyaan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomor')); ?>:</b>
	<?php echo CHtml::encode($data->nomor); ?>
	<br />


</div>