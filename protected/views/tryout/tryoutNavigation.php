<?php
    /* @var $this TryoutController */
    /* @var $tryout Tryout */
?>
<div class="btn-group-vertical tryoutNavigation">
    <label class="text-center">Menu <br>Navigasi</label>
    <?php for($i=1;$i<=$soalCount;$i++):?>
    
    <?php if($i % 10 == 1):?>
    <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <?php 
                echo $i;echo "-";echo $soalCount < ($i+9)?$soalCount:($i+9);
            ?>            
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
    <?php endif;?>

            
            <li><a href="#no<?php echo $i;?>"><?php echo $i;?></a></li>            
            
    <?php if($i % 10 == 0 || $i == $soalCount):?>        
        </ul>
    </div>
    <?php endif;?>
    
    <?php endfor;?>
    <br>
    <div class="text-center">
        <input type="submit" value="Simpan" name="Save" class="btn btn-success" style="margin-bottom: 2px;"><br>
        <input type="submit" value="Kumpulkan" name="Submit" class="btn btn-success">    
    </div>
</div>

<div class="tryoutTime well" id="tryoutTime">
    
</div>
<?php
    $waktuSelesai = $tryout->getWaktuSelesai();
    $waktuSelesai *= 1000;
?>
<script>
    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
    function autoSubmit(){
        var finish = new Date();
        finish.setTime(<?php echo $waktuSelesai;?>);
        var today = new Date();   
        if(finish <= today){
            document.getElementById("tryoutForm").submit();
        }        
        l = setTimeout(function () {
            autoSubmit()
        }, 500);
    }
    function startTime() {        
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
        t = setTimeout(function () {
            startTime()
        }, 500);
        
    }
    startTime();
    autoSubmit();
</script>