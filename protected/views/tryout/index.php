<?php
/* @var $this TryoutController */
/* @var $to Tryout */

$this->breadcrumbs = array(
    'Tryout',
);
?>
<ul class="nav nav-tabs">
    <?php if (sizeof($model[0])): ?>
        <li class="active"><a href="#present" data-toggle="tab">Sedang Berlangsung</a></li>
        <li><a href="#future" data-toggle="tab">Tryout Tersedia</a></li>
        <li><a href="#past" data-toggle="tab">Tryout Lama</a></li>  
    <?php else: ?>        
        <li class="active"><a href="#future" data-toggle="tab">Tryout Tersedia</a></li>
        <li><a href="#past" data-toggle="tab">Tryout Lama</a></li>  
    <?php endif; ?>
</ul>

<div class="tab-content">
    <?php if (sizeof($model[0])): ?>
    <div class="tab-pane fade in active" id="present">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Nama</th>       
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
                        <?php echo date('H:i',  strtotime($to->waktuMulai)); ?>
                    </td>
                    <td>
                        <?php echo $to->durasi; ?>
                    </td>                                        
                    <td>
                        <?php echo CHtml::link("Kerjakan", array('perform', 'id' => $to->id),array('class'=>'btn btn-primary')); ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <?php endif;?>
    <div class="tab-pane <?php if(sizeof($model[0])==0){echo 'fade in active';}?>" id="future">
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
                        <?php  ?>
                        <form method="post">
                            <input type="hidden" name="Register[id]" value="<?php echo $to->id;?>">
                            <input type="submit" class="btn btn-primary" value="Daftar">
                        </form>
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
                        <?php echo CHtml::link("Lihat", array('statistic', 'id' => $to->id),array('class'=>'btn btn-primary')); ?>  
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>  
</div>


