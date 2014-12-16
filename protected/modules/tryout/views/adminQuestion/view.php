<?php
/* @var $this AdminQuestionController */
/* @var $questionModel Question */
/* @var $htmlOption */

$this->breadcrumbs=array(
        'Tryout'=>array('adminTryout/index'),
	'Soal'=>array('index?idtryout='.$questionModel->idtryout),
	$questionModel->id,
);

$this->menu=array(
	array('label'=>'Daftar Soal', 'url'=>array('index?idtryout='.$questionModel->idtryout)),
	array('label'=>'Buat Soal', 'url'=>array('create?idtryout='.$questionModel->idtryout)),
	array('label'=>'Ubah Soal', 'url'=>array('update', 'id'=>$questionModel->id)),
	array('label'=>'Hapus Soal', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$questionModel->id),'confirm'=>'Anda yakin akan menghapus soal ini?')),
);
?>

<h1>Soal No.<?php echo $questionModel->nomor; ?> "<?php echo Tryout::model()->findByPk($questionModel->idtryout)->nama;?>"</h1>
<br>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$questionModel,
	'attributes'=>array(				
                'nomor',
		        'pertanyaan',
                array(               // related city displayed as a link
                    'label'=>'Opsi',
                    'type'=>'raw',
                    'value'=>$htmlOption==""?"tidak memiliki opsi":$htmlOption,
                ),
	),
)); ?>
