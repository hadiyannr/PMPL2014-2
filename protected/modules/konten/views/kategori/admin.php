<?php
/* @var $this KategoriController */
/* @var $model KategoriKonten */

$this->breadcrumbs=array(
	'Kategori',
);

$this->menu=array(
	array('label'=>'Daftar Kategori', 'url'=>array('index')),
	array('label'=>'Buat Kategori', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#kategori-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manajemen Kategori</h1>


<?php //echo CHtml::link('Pencarian Lanjutan','#',array('class'=>'btn btn-primary')); ?>
<!--<div class="search-form" style="display:none">-->
<?php //$this->renderPartial('_search',array(
//	'kategoriModel'=>$kategoriModel,
//)); ?>
<!--</div>-->
<!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'kategori-grid',
	'summaryText' => 'Menampilkan {start} - {end} dari {count} daftar kategori ',
	'dataProvider'=>$kategoriModel->search(),
	'ajaxUpdate'=>false,
    'columns'=>array(
		'id',
		'nama',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
