<?php
/* @var $this KontenController */
/* @var $model Kontens */
/* @var $title String */
$this->breadcrumbs=array(
	'Daftar Konten',
);?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="row clearfix">
                <?php $counter = 0; ?>
				<div class="col-md-12 column">
                    <div class="text-center"><?php if(isset($title)){echo '<h2>'.$title.'</h2>';}?></div>
                    <br/><br/>
                    <?php if(isset($searchMessage)){echo '<h4>'.$searchMessage.'</h4>';}?>
					<?php foreach ($model as $konten):?>
						<?php if($counter%3==0):?>
							<div class="row">
						<?php endif;?>
                        <div class="col-md-4" style="padding:10px;">
                            <div class="column home-group">
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
                        </div>
						<?php if($counter%3==2 || $counter == sizeof($model)-1):?>
							</div>
						<?php endif;?>
							
						<?php $counter++;?>
					<?php endforeach;?>
				</div>
			</div>
            <div class="row clearfix text-center" style="margin:40px;">
                <div class="col-md-4 col-md-offset-4">
                    <?php $this->widget('CLinkPager', array(
                        'pages' => $pages,
                    )) ?>
                </div>
            </div>
		</div>
	</div>
</div>