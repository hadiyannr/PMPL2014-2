<?php
/* @var $this KontenController */
/* @var $model Kontens */
$this->breadcrumbs=array(
	'Daftar Konten',
);
foreach ($model as $konten){?>
    <?php echo CHtml::link($konten->judul,array('index','id'=>$konten->id))?>
    <br>
<?php }?>