<?php
/* @var $this TryoutController */
/* @var $tryoutModelList Tryouts */
/* @var $answerSheet AnswerSheet */
/* @var $tryout Tryout */

$this->breadcrumbs = array(
    'Tryout',
);
?>
<div class="text-center title"><h2>Simulasi Masuk Universitas Indonesia</h2></div>
<ul class="nav nav-tabs">    
        <li class="active"><a href="#present" data-toggle="tab">MyTryout</a></li>
        <li><a href="#future" data-toggle="tab">Ujian Tersedia</a></li>
        <li><a href="#past" data-toggle="tab">Statistik Tryout</a></li>      
</ul>

<div class="tab-content">
    
    <div class="tab-pane fade in active" id="present">
        <?php if (sizeof($tryoutModelList[0])): ?>
        <table class="table">
            <tr>
                <th>No</th>
                <th>Nama</th>       
                <th>Tanggal</th>
                <th>Waktu Mulai</th>
                <th>Durasi</th>
                <th>Kerjakan!</th>
            </tr>
            <?php
            $no = 1;
            foreach ($tryoutModelList[0] as $tryout) { ?>
                <tr>
                    <td>
                        <?php echo $no++;?>
                    </td>                    
                    <td>
                        <?php echo $tryout->nama ?>
                    </td>
                    <td>
                        <?php echo $tryout->tanggal ?>
                    </td>
                    <td>
                        <?php echo date('H:i',  strtotime($tryout->waktuMulai)); ?>
                    </td>
                    <td>
                        <?php echo $tryout->durasi; ?>
                    </td>
                    <td>
                        <?php
                            $answerSheet = AnswerSheet::model()->findByAttributes(array('idTryout'=>$tryout->id));
                        ?>

                        <?php if($answerSheet->isSubmitted == 1):?>
                            Sudah mengerjakan
                        <?php elseif($tryout->status() == 0):?>
                        <form method="post">
                            <input type="hidden" name="Perform[id]" value="<?php echo $tryout->id;?>">
                            <input type="submit" class="btn btn-primary" value="Kerjakan">
                        </form>
                        <?php else:?>
                            Belum dibuka
                        <?php endif;?>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <?php else:?>
            <br>
            <span style="font-size:18px;">
                <i>
                    <?php
                        if(Yii::app()->user->isGuest){
                            echo 'Silahkan login untuk melihat daftar MyTryout';
                        }else{
                            echo 'Tidak ada daftar di MyTryout. Silahkan daftar pada menu Ujian Tersedia.';
                        }
                    ?>
                </i>
            </span>

        <?php endif;?>
    </div>
    <div class="tab-pane" id="future">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Waktu Mulai</th>
                <th>Durasi</th>
                <th>Daftar!</th>
            </tr>
            <?php
            $no = 1;
            foreach ($tryoutModelList[1] as $tryout) { ?>
                <tr>
                    <td>
                        <?php echo $no++;?>
                    </td>                    
                    <td>
                        <?php echo $tryout->nama ?>
                    </td>
                    <td>
                        <?php echo $tryout->tanggal; ?>
                    </td>
                    <td>
                        <?php echo date('H:i',  strtotime($tryout->waktuMulai)); ?>
                    </td>
                    <td>
                        <?php echo $tryout->durasi; ?>
                    </td>                                        
                    <td>
                        <?php if(Yii::app()->user->isGuest):?>                        
                        <p style="font-size:10px;">Login/Register untuk mendaftar Tryout</p>
                        <?php  elseif(!$tryout->isRegistered(Yii::app()->user->id)):?>
                        <form method="post">
                            <input type="hidden" name="Register[id]" value="<?php echo $tryout->id;?>">
                            <input type="submit" class="btn btn-primary" value="Daftar">
                        </form>                        
                        <?php endif;?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
    
    
    <div class="tab-pane fade" id="past">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Waktu Mulai</th>
                <th>Durasi</th>
                <th>Statistik</th>
            </tr>
            <?php
            $no = 1;
            foreach ($tryoutModelList[2] as $tryout) { ?>
                <tr>
                    <td>
                        <?php echo $no++;?>
                    </td>                    
                    <td>
                        <?php echo $tryout->nama ?>
                    </td>
                    <td>
                        <?php echo $tryout->tanggal; ?>
                    </td>
                    <td>
                        <?php echo date('H:i',  strtotime($tryout->waktuMulai)); ?>
                    </td>
                    <td>
                        <?php echo $tryout->durasi; ?>
                    </td>                                        
                    <td>
                        <form method="post">
                            <input type="hidden" name="Statistic[id]" value="<?php echo $tryout->id;?>">
                            <input type="submit" class="btn btn-primary btn-statistic" value="Lihat">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>  
</div>
<?php if(!Yii::app()->user->isGuest):?>
<div style="margin-top:200px;">
    <?php echo CHtml::link('Riwayat Tryout',array('answerSheet/history'),array('class'=>'btn-primary'));?>
</div>
<?php endif;?>