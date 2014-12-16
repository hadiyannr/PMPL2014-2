<?php
    /* @var $this AnswerSheetController */
    /* @var $tryoutModel Tryout */
    /* @var $questionList Soals */
    /* @var $question Question */
    /* @var $answerList  */

?>

<div>
    <h1 class="text-center">Try Out <?php echo $tryoutModel->nama;?></h1>
    <br><br>
    <div class="container-fluid">
        <form method="post" name="form" id="tryoutForm">
            
            
        <?php foreach($questionList as $question):?>
        <div class="well" id="no<?php echo $question->nomor;?>">
            <p class="text-justify">
                <?php
                    if($question->isHasJawaban){
                        echo $question->nomor,'. ',$question->pertanyaan;
                    }else{
                        echo $question->pertanyaan;
                    }
                ?>
            </p>
        </div>
        <div class="col-md-offset-1">                        
            <?php foreach($question->opsis as $option):?>
            <div class="radio" id="<?php echo $question->nomor;?>">
                <label>
                    <input type="radio"                            
                           class="radioButton"
                           name="jawaban[<?php echo $question->nomor;?>]"
                           value="<?php echo $option->nomor;?>"
                           <?php
                                if(isset($answerList[$question->nomor]->isiJawaban)){
                                    echo ($answerList[$question->nomor]->isiJawaban == $option->nomor) ? "checked" : "";
                                }
                           ?>
                           >
                    <?php echo $option->getOption($option->nomor);?>
                </label>
            </div>                                    
            <?php endforeach;?>            			            
        </div>
        <?php endforeach;?>
            
            <div class="text-center">
                <input type="submit" name="Save" value="Simpan" class="btn btn-success">
                <input type="submit" name="Submit" value="Kumpulkan" class="btn btn-success">
                <input type="hidden" name="Perform[id]" value="<?php echo $tryoutModel->id;?>">
            </div>
            <?php $this->renderPartial('tryoutNavigation',array('questionCount'=> sizeof($questionList),'tryoutModel'=>$tryoutModel));?>
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