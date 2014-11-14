<?php
    /* @var $this TryoutController */
    /* @var $tryoutModel Tryout */
    /* @var $questionCount Tryout */
?>
<div class="btn-group-vertical tryoutNavigation">
    <label class="text-center">Menu Navigasi</label>
    <?php for($i=1;$i<=$questionCount;$i++):?>
    
    <?php if($i % 10 == 1):?>
    <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <?php 
                echo $i;echo "-";echo $questionCount < ($i+9)?$questionCount:($i+9);
            ?>            
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
    <?php endif;?>

            
            <li><a href="#no<?php echo $i;?>"><?php echo $i;?></a></li>            
            
    <?php if($i % 10 == 0 || $i == $questionCount):?>
        </ul>
    </div>
    <?php endif;?>
    
    <?php endfor;?>
    <br>
    <div class="text-left">
        <input type="submit" value="Simpan" name="Save" class="btn btn-success btn-block" style="margin-bottom: 2px;">
        <input type="submit" value="Kumpulkan" name="Submit" class="btn btn-success btn-block">    
    </div>
</div>

<div class="col-md-1">
    <div class="tryoutTime well" id="tryoutTime">
        
    </div>
</div>
<?php
    $waktuSelesai = $tryoutModel->getWaktuSelesai();
    $waktuSelesai *= 1000;
    
?>
<script>            
    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
        
    
    timer = setInterval(function () {
        var today = new Date();   
        var finish = new Date();
        finish.setTime(<?php echo $waktuSelesai;?>);
        var remaining = new Date(finish - today);        
        var h = remaining.getHours() - 7;
        var m = remaining.getMinutes();
        var s = remaining.getSeconds();
        // add a zero in front of numbers<10
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('tryoutTime').innerHTML = h + ":" + m + ":" + s;
        
    }, 500);
    
    submit = setInterval(function () {
        var finish = new Date();
        finish.setTime(<?php echo $waktuSelesai;?>);
        var now = new Date();   
        if(finish <= now){
            clearInterval(timer);
            clearInterval(submit);
            document.getElementById("tryoutForm").submit();
        }        
    }, 500);
</script>