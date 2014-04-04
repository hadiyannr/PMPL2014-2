<?php
/* @var $this KontenController */

$this->breadcrumbs=array(
	'Daftar Konten'=>array('daftar'),
        'Konten'
);
?>

<br>
<div class="text-center">
    <h1><?php echo $konten->judul?></h1>
</div>
<?php echo $konten->isi?>