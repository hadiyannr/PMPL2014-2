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
                           value="<?php echo $option->nomor;?>">
                    <?php echo $option->getOption($option->nomor);?>
                </label>
            </div>                                    
            <?php endforeach;?>            			            
        </div>
        <?php endforeach;?>
           
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