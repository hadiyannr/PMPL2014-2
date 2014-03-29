<?php
/* @var $this SoalController */
/* @var $model Soal */

$this->breadcrumbs=array(
	'Tryout'=>array('tryout/index'),	
        'Soal',
);

$this->menu=array(	
	array('label'=>'Buat Soal', 'url'=>array('create?idtryout='.$_GET['idtryout'])),
);


?>

<h1>Manajemen Soal Tryout "<?php echo Tryout::model()->findByPk($_GET['idtryout'])->nama;?>"</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'soal-grid',
        'dataProvider'=>$model->search(),	
	'columns'=>array(		
                'nomor',
		'pertanyaan',                
                array(
                    'name'=>'Status',
                    'value'=>function($data){
                            return Soal::model()->isComplete($data->id)?'Lengkap':'Belum memiliki opsi';
                        },
                ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
