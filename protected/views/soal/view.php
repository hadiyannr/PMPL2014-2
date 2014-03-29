<?php
/* @var $this SoalController */
/* @var $model Soal */

$this->breadcrumbs=array(
        'Tryout'=>array('tryout/index'),
	'Soal'=>array('index?idtryout='.$model->idtryout),
	$model->id,
);

$this->menu=array(
	array('label'=>'Daftar Soal', 'url'=>array('index?idtryout='.$model->idtryout)),
	array('label'=>'Buat Soal', 'url'=>array('create?idtryout='.$model->idtryout)),
	array('label'=>'Ubah Soal', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Hapus Soal', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Anda yakin akan menghapus soal ini?')),
);
?>

<h1>Soal No.<?php echo $model->nomor; ?> "<?php echo Tryout::model()->findByPk($model->idtryout)->nama;?>"</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(				
                'nomor',
		'pertanyaan',                
                array(               // related city displayed as a link
                    'label'=>'Opsi',
                    'type'=>'raw',
                    'value'=>$opsi
                ),
	),
)); ?>
