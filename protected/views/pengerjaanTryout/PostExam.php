<?php
    /* @var $this PengerjaanTryoutController */
    /* @var $tryout Tryout */
    /* @var $soalList Soals */
    /* @var $soal Soal */
?>
<div class="row"> 
    <div class="col-md-2 centered"> 
        <table class="table">            
            <tr class="success">
                <td class="text-right">Nilai</td>
                <td><?php echo $model->nilai;?></td>
            </tr>                        
            <tr>
                <td class="text-right">Benar</td>
                <td><?php echo $detail['benar'];?></td>
            </tr>    
            <tr>
                <td class="text-right">Salah</td>
                <td><?php echo $detail['salah'];?></td>
            </tr>                
            <tr>
                <td class="text-right">Kosong</td>
                <td><?php echo $detail['kosong'];?></td>
            </tr>                
        </table>
        <div class="pull-right">
            <?php echo CHtml::link('Kembali',array('tryout/index'),array('class'=>'btn btn-success'));?>
        </div>
    </div>
</div>