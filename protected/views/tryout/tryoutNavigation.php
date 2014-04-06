<?php
    /* @var $this TryoutController */
    /* @var $tryout Tryout*/
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
</div>

<div class="tryoutTime well" id="tryoutTime">
    
</div>

<script>    
    setTimeout ( "displayTime()", 1000 );
    
    function displayTime() {        
        <?php 
            $remaining = $tryout->getRemainingTime();
        ?>                
        document.getElementById('tryoutTime').innerHTML = <?php echo "'",$remaining,"'";?>;        
        setTimeout ( "displayTime()", 500 );
    }    
    
</script>