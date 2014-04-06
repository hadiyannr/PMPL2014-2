<?php
    /* @var $this TryoutController */
    /* @var $tryout Tryout */
    /* @var $soalList Soals */
    /* @var $soal Soal */

?>

<div>
    <h1 class="text-center">Try Out <?php echo $tryout->nama;?></h1>
    <br><br>
    <div class="container-fluid">
        <form method="post" name="form">
            
            
        <?php foreach($soalList as $soal):?>        
        <div class="jumbotron">
            <p class="text-justify" id="soal">
                <?php echo $soal->nomor,'. ',$soal->pertanyaan;?>
            </p>
        </div>
        <div class="col-md-offset-1">                        
            <?php foreach($soal->opsis as $opsi):?>
            <div class="radio" id="<?php echo $soal->nomor;?>">
                <label>
                    <input type="radio" 
                           name="jawaban[<?php echo $soal->nomor;?>]" 
                           id="optionsRadios" 
                           ondblclick="uncheckRadio(<?php echo $soal->nomor;?>);"
                           value="<?php echo $opsi->nomor;?>"
                           <?php
                                if(isset($jawaban[$soal->nomor]->isiJawaban)){
                                    echo ($jawaban[$soal->nomor]->isiJawaban == $opsi->nomor) ? "checked" : "";
                                }
                           ?>
                           >
                    <?php echo $opsi->getOption($opsi->nomor);?>
                </label>
            </div>                                    
            <?php endforeach;?>            			            
        </div>
        <?php endforeach;?>
            
            <div class="text-center">
                <input type="submit" value="Kumpulkan" class="btn btn-success">
                <input type="hidden" name="Perform[id]" value="<?php echo $tryout->id;?>">
            </div>
        </form>
        
        
        
    </div>
</div>