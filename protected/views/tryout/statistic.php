<?php
/* @var $this TryoutController */
/* @var $pto Pengerjaantryout */
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-11" overflow: scroll>
            <h1 class="text-center">Try Out <?php echo $tryoutModel->nama;?></h1>
            <br>
            <table class="table table-striped">
                <tr>
                    <th>Rank</th>
                    <th>Username</th>
                    <th>Nilai</th>
                </tr>
                <?php $no = 1; ?>
                <?php foreach ($listPengguna as $pto): ?>
                <tr>                    
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $pto->idPengguna0->username; ?></td>
                    <td><?php echo $pto->nilai; ?></td>                    
                </tr>                
                <?php endforeach;?>
            </table>
            <br>
            <table class="table table-bordered">                
                <tr>
                    <td>Rata - rata</td>
                    <td><?php echo $tryoutStatistic['avg'];?></td>
                </tr>
                <tr>
                    <td>Nilai Tertinggi</td>
                    <td><?php echo $tryoutStatistic['max'];?></td>
                </tr>
                <tr>
                    <td>Nilai Terendah</td>
                    <td><?php echo $tryoutStatistic['min'];?></td>
                </tr>
            </table>                        
        </div>
    </div>
</div>