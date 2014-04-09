<?php
/* @var $this PengerjaanTryoutController */
/* @var $pengerjaan PengerjaanTryout */

?>

<div class="row"> 
    <div class="col-md-3"> 
        <table class="table">
            <tr>
                <td>Rank</td>
                <td><?php echo $detail['rank'];?></td>
            </tr>    
            <tr>
                <td>Nilai</td>
                <td><?php echo $pengerjaan->nilai;?></td>
            </tr>                
        </table>
        
        <table class="table">
            <tr>
                <td>Benar</td>
                <td><?php echo $detail['benar'];?></td>
            </tr>    
            <tr>
                <td>Salah</td>
                <td><?php echo $detail['salah'];?></td>
            </tr>                
            <tr>
                <td>Kosong</td>
                <td><?php echo $detail['kosong'];?></td>
            </tr>                
        </table>
    </div>
</div>


<div class="panel-group" id="accordion">    
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          Lihat Pekerjaan
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
          <?php $this->renderPartial('examHistoryDetail',array('soalList'=>$soalList,'jawaban'=>$jawaban));?>
      </div>
    </div>
  </div>
</div>
