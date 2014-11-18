<?php
/* @var $this KontenController */
/* @var $contentModelList Kontens */
/* @var $title String */
$this->breadcrumbs=array(
	'Daftar Konten',
    );?>
<!-- <div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="row clearfix">
                <?php $counter = 0; ?>
				<div class="col-md-12 column">
                    <div><?php if(isset($title)){echo '<h2>'.$title.'</h2>';}?></div>
                    <br/><br/>
                    <?php if(isset($searchMessage)){echo '<h4>'.$searchMessage.'</h4>';}?>
					<?php foreach ($contentModelList as $konten):?>
						<?php if($counter%3==0):?>
							<div class="row">
						<?php endif;?>
                        <div class="col-md-3" style="padding:10px;">
                            <div class="column home-group">
                                <h3><?php echo CHtml::link($konten->judul,array('index','id'=>$konten->id))?></h3>
                                <p> <?php
                                    $prev = strip_tags($konten->isi);
                                    echo substr($prev, 0, 100);
                                    ?>
                                </p>
                                <p class="more">
                                    <?php echo CHtml::link("More details",array('index','id'=>$konten->id))?>
                                </p>
                            </div>
                        </div>
						<?php if($counter%3==2 || $counter == sizeof($contentModelList)-1):?>
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
</div> -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="judul-konten pull-left">BERITA</h2>
            <div class="col-md-3 pull-right">
                <form class="navbar-form cari-berita" role="search" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari berita" name="keyword" id="srch-term" size="14">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="content-display-box">
                <div class="content-display">
                    <figure class="content-display">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/park-chan-hee.png" alt="">
                        <figcaption>
                            <span>Tips masuk UI oleh mahasiswi cantik bangat banget banget banget</span>
                        </figcaption>
                        <p>Lorem ipsum dolor sit amet, nobis quasi mollitia ex adipisci esse tenetur earum dolores reprehenderit laborum molestiae rem labore, iusto velit distinctio!</p>
                        <a class="btn bg-bright-yellow btn-more-display" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/konten/konten/index/id/37">MORE</a>
                    </figure>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="content-display-box">
                <div class="content-display">
                    <figure class="content-display">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/park-chan-hee.png" alt="">
                        <figcaption>
                            <span>Tips masuk UI oleh mahasiswi cantik bangat banget banget banget</span>
                        </figcaption>
                        <p>Lorem ipsum dolor sit amet, nobis quasi mollitia ex adipisci esse tenetur earum dolores reprehenderit laborum molestiae rem labore, iusto velit distinctio!</p>
                        <a class="btn bg-bright-yellow btn-more-display" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/konten/konten/index/id/37">MORE</a>
                    </figure>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="content-display-box">
                <div class="content-display">
                    <figure class="content-display">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/park-chan-hee.png" alt="">
                        <figcaption>
                            <span>Tips masuk UI oleh mahasiswi cantik bangat banget banget banget</span>
                        </figcaption>
                        <p>Lorem ipsum dolor sit amet, nobis quasi mollitia ex adipisci esse tenetur earum dolores reprehenderit laborum molestiae rem labore, iusto velit distinctio!</p>
                        <a class="btn bg-bright-yellow btn-more-display" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/konten/konten/index/id/37">MORE</a>
                    </figure>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div>
                <div class="content-display">
                    <figure class="content-display">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/park-chan-hee.png" alt="">
                        <figcaption>
                            <span>Tips masuk UI oleh mahasiswi cantik bangat banget banget banget</span>
                        </figcaption>
                        <p>Lorem ipsum dolor sit amet, nobis quasi mollitia ex adipisci esse tenetur earum dolores reprehenderit laborum molestiae rem labore, iusto velit distinctio!</p>
                        <a class="btn bg-bright-yellow btn-more-display" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/konten/konten/index/id/37">MORE</a>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="content-display-box">
                <div class="content-display">
                    <figure class="content-display">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/park-chan-hee.png" alt="">
                        <figcaption>
                            <span>Tips masuk UI oleh mahasiswi cantik bangat banget banget banget</span>
                        </figcaption>
                        <p>Lorem ipsum dolor sit amet, nobis quasi mollitia ex adipisci esse tenetur earum dolores reprehenderit laborum molestiae rem labore, iusto velit distinctio!</p>
                        <a class="btn bg-bright-yellow btn-more-display" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/konten/konten/index/id/37">MORE</a>
                    </figure>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="content-display-box">
                <div class="content-display">
                    <figure class="content-display">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/park-chan-hee.png" alt="">
                        <figcaption>
                            <span>Tips masuk UI oleh mahasiswi cantik bangat banget banget banget</span>
                        </figcaption>
                        <p>Lorem ipsum dolor sit amet, nobis quasi mollitia ex adipisci esse tenetur earum dolores reprehenderit laborum molestiae rem labore, iusto velit distinctio!</p>
                        <a class="btn bg-bright-yellow btn-more-display" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/konten/konten/index/id/37">MORE</a>
                    </figure>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="content-display-box">
                <div class="content-display">
                    <figure class="content-display">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/park-chan-hee.png" alt="">
                        <figcaption>
                            <span>Tips masuk UI oleh mahasiswi cantik bangat banget banget banget</span>
                        </figcaption>
                        <p>Lorem ipsum dolor sit amet, nobis quasi mollitia ex adipisci esse tenetur earum dolores reprehenderit laborum molestiae rem labore, iusto velit distinctio!</p>
                        <a class="btn bg-bright-yellow btn-more-display" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/konten/konten/index/id/37">MORE</a>
                    </figure>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div>
                <div class="content-display">
                    <figure class="content-display">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/park-chan-hee.png" alt="">
                        <figcaption>
                            <span>Tips masuk UI oleh mahasiswi cantik bangat banget banget banget</span>
                        </figcaption>
                        <p>Lorem ipsum dolor sit amet, nobis quasi mollitia ex adipisci esse tenetur earum dolores reprehenderit laborum molestiae rem labore, iusto velit distinctio!</p>
                        <a class="btn bg-bright-yellow btn-more-display" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/konten/konten/index/id/37">MORE</a>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <nav class="pull-right">
                <ul class="pagination">
                    <li class="disabled"><a href="#">PREV</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">NEXT</a></li>
                </ul>
            </nav>
            <div class="clearfix"></div>
        </div>
    </div>
</div>