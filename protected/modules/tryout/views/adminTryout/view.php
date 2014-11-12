<?php
/* @var $this TryoutController */
/* @var $tryoutModel Tryout */

$this->breadcrumbs=array(
	'Tryout'=>array('index'),
	$tryoutModel->id,
);

$this->menu=array(
	array('label'=>'Daftar Tryout', 'url'=>array('index')),
	array('label'=>'Buat Tryout', 'url'=>array('create')),
	array('label'=>'Ubah Tryout', 'url'=>array('update', 'id'=>$tryoutModel->id)),
	array('label'=>'Hapus Tryout', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$tryoutModel->id),'confirm'=>'Anda yakin akan menghapus tryout ini?')),
);
?>

<h1>Lihat Tryout #<?php echo $tryoutModel->id; ?></h1>
</br>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$tryoutModel,
	'attributes'=>array(
		'id',
        'nama',
        'tanggal',
		'waktuMulai',
		'durasi',
                array(
                        'name' => 'Last edited By',
                        'header' =>'Last edited By',
                        'value' => $tryoutModel->idAdmin0['username'],
                ),
	),
));   
    
?>
</br>
<?php 
    echo CHtml::link('Daftar Soal',array('adminSoal/index/','idtryout'=>$tryoutModel->id));
    
?>

