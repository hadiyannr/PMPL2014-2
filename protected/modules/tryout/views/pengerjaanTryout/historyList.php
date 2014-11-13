<?php

/* @var $this PengerjaanTryoutController */
/* @var $tryoutModelList Tryouts */
/* @var $tryout Tryouts */


?>
<h2 class="text-center">Riwayat Tryout</h2>
<br><br>
<?php if (sizeof($tryoutModelList)): ?>
        <table class="table">
            <tr>
                <th>No</th>
                <th>Nama</th>       
                <th>Tanggal</th>
                <th>Waktu Mulai</th>
                <th>Durasi</th>
                <th>Lihat</th>
            </tr>
            <?php
            $no = 1;
            foreach ($tryoutModelList as $tryout) { ?>
                <?php if($tryout->status() == -1):?>
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
                        <?php echo date('H:i', strtotime($tryout->waktuMulai)); ?>
                    </td>
                    <td>
                        <?php echo $tryout->durasi; ?>
                    </td>                                        
                    <td>                        
                        <form method="post">                            
                            <input type="hidden" name="Tryout[id]" value="<?php echo $tryout->id;?>">
                            <input type="submit" class="btn btn-primary" value="Lihat">
                        </form>                            
                    </td>
                </tr>
                <?php endif;?>
            <?php } ?>
        </table>
        <?php else:?>        
            <br>
            <span style="font-size:18px;"><i>Anda belum pernah mengikuti tryout</i></span>
        <?php endif;?>