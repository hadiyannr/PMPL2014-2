<?php
/* @var $this TryoutController */
/* @var $model Tryout */

$this->breadcrumbs=array(
	'Tryout'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Daftar Tryout', 'url'=>array('index')),
	array('label'=>'Buat Tryout', 'url'=>array('create')),
	array('label'=>'Ubah Tryout', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Hapus Tryout', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Anda yakin akan menghapus tryout ini?')),
);
?>

<h1>Lihat Tryout #<?php echo $model->id; ?></h1>
</br>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
        'nama',
        'tanggal',
		'waktuMulai',
		'durasi',
                array(
                        'name' => 'Last edited By',
                        'header' =>'Last edited By',
                        'value' => $model->idAdmin0['username'],
                ),
	),
));   
    
?>
</br>
<?php 
    echo CHtml::link('Daftar Soal',array('adminSoal/index/','idtryout'=>$model->id));
    
?>

