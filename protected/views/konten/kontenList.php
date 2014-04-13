<?php
/* @var $this KontenController */
/* @var $model Kontens */
$this->breadcrumbs=array(
	'Daftar Konten',
);
foreach ($model as $konten){?>
	<div class="col-md-4" overflow: scroll>
	    <?php echo CHtml::link($konten->judul,array('index','id'=>$konten->id))?>
	    <br>
    </div>
<?php }?>