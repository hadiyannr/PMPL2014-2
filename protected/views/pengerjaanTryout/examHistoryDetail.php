<div>    
    <br><br>
    <div class="container-fluid">                                
        <?php foreach($soalList as $soal):?>        
        <div class="jumbotron" id="no<?php echo $soal->nomor;?>">
            <p class="text-justify">
                <?php echo $soal->nomor,'. ',$soal->pertanyaan;?>
            </p>
        </div>
        <div class="col-md-offset-1">                        
            <?php foreach($soal->opsis as $opsi):?>
            <div class="radio" id="<?php echo $soal->nomor;?>">
                <label>
                    <input type="radio"                            
                           class="radioButton"                           
                           <?php
                                if(isset($jawaban[$soal->nomor]->isiJawaban)){
                                    echo ($jawaban[$soal->nomor]->isiJawaban == $opsi->nomor) ? "checked" : "";
                                }
                           ?>                           
                           >
                                        
                    <?php echo $opsi->isJawaban?'<span style="background-color:yellow;">':""?>
                    <?php echo $opsi->getOption($opsi->nomor);?>
                    <?php echo $opsi->isJawaban?'</span>':""?>
                    
                </label>
            </div>                                    
            <?php endforeach;?>            			            
        </div>
        <?php endforeach;?>                                                     
    </div>
</div>

<script>
    $(':radio,:checkbox').click(function(){
        return false;
    });
</script>