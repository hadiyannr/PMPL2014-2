<?php
    /* @var $this AnswerSheetController */
    /* @var $answerSheetModel AnswerSheet */
    /* @var $question Question */t
    /* @var $answerSheetDetail Question */

?>
<div class="row"> 
    <div class="col-md-2 centered"> 
        <table class="table">            
            <tr class="success">
                <td class="text-right">Nilai</td>
                <td><?php echo $answerSheetModel->nilai;?></td>
            </tr>                        
            <tr>
                <td class="text-right">Benar</td>
                <td><?php echo $answerSheetDetail['benar'];?></td>
            </tr>    
            <tr>
                <td class="text-right">Salah</td>
                <td><?php echo $answerSheetDetail['salah'];?></td>
            </tr>                
            <tr>
                <td class="text-right">Kosong</td>
                <td><?php echo $answerSheetDetail['kosong'];?></td>
            </tr>                
        </table>
        <div class="pull-right">
            <?php echo CHtml::link('Kembali',array('tryout/index'),array('class'=>'btn btn-success'));?>
        </div>
    </div>
</div>