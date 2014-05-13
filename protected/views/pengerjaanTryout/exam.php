<?php
    /* @var $this PengerjaanTryoutController */
    /* @var $tryout Tryout */
    /* @var $soalList Soals */
    /* @var $soal Soal */

?>

<div>
    <h1 class="text-center">Try Out <?php echo $tryout->nama;?></h1>
    <br><br>
    <div class="container-fluid">
        <form method="post" name="form" id="tryoutForm">
            
            
        <?php foreach($soalList as $soal):?>        
        <div class="jumbotron" id="no<?php echo $soal->nomor;?>">
            <p class="text-justify">
                <?php
                    if($soal->isHasJawaban){
                        echo $soal->nomor,'. ',$soal->pertanyaan;
                    }else{
                        echo $soal->pertanyaan;
                    }
                ?>
            </p>
        </div>
        <div class="col-md-offset-1">                        
            <?php foreach($soal->opsis as $opsi):?>
            <div class="radio" id="<?php echo $soal->nomor;?>">
                <label>
                    <input type="radio"                            
                           class="radioButton"
                           name="jawaban[<?php echo $soal->nomor;?>]"                                                       
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
                <input type="submit" name="Save" value="Simpan" class="btn btn-success">
                <input type="submit" name="Submit" value="Kumpulkan" class="btn btn-success">
                <input type="hidden" name="Perform[id]" value="<?php echo $tryout->id;?>">
            </div>
            <?php $this->renderPartial('tryoutNavigation',array('soalCount'=> sizeof($soalList),'tryout'=>$tryout));?>
        </form>
        
        <!--Script uncheck radio button-->
        <script>
            var prev = {};
            $("input[type=radio]").click(function(){
                if (prev && prev.value == this.value) {
                    $(this).prop('checked', !prev.status);
                }
                prev = {
                    value: this.value,
                    status: this.checked
                };
            });
        </script>
        
    </div>
</div>