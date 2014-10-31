<?php
/* @var $this TryoutController */
/* @var $to Tryout */

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
        <?php if (sizeof($model[0])): ?>
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
            foreach ($model[0] as $to) { ?>                    
                <tr>
                    <td>
                        <?php echo $no++;?>
                    </td>                    
                    <td>
                        <?php echo $to->nama ?>
                    </td>
                    <td>
                        <?php echo $to->tanggal ?>
                    </td>
                    <td>
                        <?php echo date('H:i',  strtotime($to->waktuMulai)); ?>
                    </td>
                    <td>
                        <?php echo $to->durasi; ?>
                    </td>
                    <td>
                        <?php
                            $pengerjaan = Pengerjaantryout::model()->findByAttributes(array('idTryout'=>$to->id));
                        ?>

                        <?php if($pengerjaan->isSubmitted == 1):?>
                            Sudah mengerjakan
                        <?php elseif($to->status() == 0):?>
                        <form method="post">
                            <input type="hidden" name="Perform[id]" value="<?php echo $to->id;?>">
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
            foreach ($model[1] as $to) { ?>                    
                <tr>
                    <td>
                        <?php echo $no++;?>
                    </td>                    
                    <td>
                        <?php echo $to->nama ?>  
                    </td>
                    <td>
                        <?php echo $to->tanggal; ?>
                    </td>
                    <td>
                        <?php echo date('H:i',  strtotime($to->waktuMulai)); ?>
                    </td>
                    <td>
                        <?php echo $to->durasi; ?>
                    </td>                                        
                    <td>
                        <?php if(Yii::app()->user->isGuest):?>                        
                        <p style="font-size:10px;">Login/Register untuk mendaftar Tryout</p>
                        <?php  elseif(!$to->isRegistered(Yii::app()->user->id)):?>
                        <form method="post">
                            <input type="hidden" name="Register[id]" value="<?php echo $to->id;?>">
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
            foreach ($model[2] as $to) { ?>                    
                <tr>
                    <td>
                        <?php echo $no++;?>
                    </td>                    
                    <td>
                        <?php echo $to->nama ?>  
                    </td>
                    <td>
                        <?php echo $to->tanggal; ?>
                    </td>
                    <td>
                        <?php echo date('H:i',  strtotime($to->waktuMulai)); ?>
                    </td>
                    <td>
                        <?php echo $to->durasi; ?>
                    </td>                                        
                    <td>
                        <form method="post">
                            <input type="hidden" name="Statistic[id]" value="<?php echo $to->id;?>">
                            <input type="submit" class="btn btn-primary" value="Lihat">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>  
</div>
<?php if(!Yii::app()->user->isGuest):?>
<div style="margin-top:200px;">
    <?php echo CHtml::link('Riwayat Tryout',array('pengerjaanTryout/history'),array('class'=>'btn btn-success'));?>
</div>
<?php endif;?>