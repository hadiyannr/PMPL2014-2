<?php
/* @var $this <?php
/* @var $this TryoutController */
/* @var $model Tryouts */
/* @var $to Tryouts */
/*TryoutController */
/* @var $model Tryouts */
/* @var $to Tryouts */
?>
<h2 class="text-center">Riwayat Tryout</h2>
<br><br>
<?php if (sizeof($model)): ?>
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
            foreach ($model as $to) { ?>                    
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
                        <?php echo date('H:i', strtotime($to->waktuMulai)); ?>
                    </td>
                    <td>
                        <?php echo $to->durasi; ?>
                    </td>                                        
                    <td>                        
                        <form method="post">                            
                            <input type="hidden" name="Tryout[id]" value="<?php echo $to->id;?>">
                            <input type="submit" class="btn btn-primary" value="Lihat">
                        </form>                            
                    </td>
                </tr>
            <?php } ?>
        </table>
        <?php else:?>        
            <br>
            <span style="font-size:18px;"><i>Anda belum pernah mengikuti tryout</i></span>
        <?php endif;?>