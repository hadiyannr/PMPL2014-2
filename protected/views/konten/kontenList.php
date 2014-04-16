<?php
/* @var $this KontenController */
/* @var $model Kontens */
$this->breadcrumbs=array(
	'Daftar Konten',
);?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="row clearfix">
                <?php $counter = 0; ?>
				<div class="col-md-12 column">
                    <?php if(isset($searchMessage)){echo '<h3>'.$searchMessage.'</h3>';}?>
					<?php foreach ($model as $konten):?>
						<?php if($counter%3==0):?>
							<div class="rowa">
						<?php endif;?>
						<div class="col-md-4 column home-group">
							<h3><?php echo CHtml::link($konten->judul,array('index','id'=>$konten->id))?></h3>
							<p> <?php 
								$prev = $konten->isi; 
								echo substr($prev, 0, 100);
								?>
							</p>
							<p class="more">
								<?php echo CHtml::link("More details",array('index','id'=>$konten->id))?>
							</p>
						</div>

						<?php if($counter%3==2 || $counter == sizeof($model)-1):?>
							</div>
						<?php endif;?>
							
						<?php $counter++;?>
					<?php endforeach;?>
				</div>
			</div>
		</div>
	</div>
</div>