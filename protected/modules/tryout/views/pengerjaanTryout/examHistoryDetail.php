<?php
    /* @var $this PengerjaanTryoutController */
    /* @var $questionList Soals */
    /* @var $answerList Jawabans */
?>
<div>
    <br><br>
    <div class="container-fluid">                                
        <?php foreach($questionList as $question):?>
        <div class="well" id="no<?php echo $question->nomor;?>">
            <p class="text-justify">
                <?php echo $question->nomor,'. ',$question->pertanyaan;?>
            </p>
        </div>
        <div class="col-md-offset-1">                        
            <?php foreach($question->opsis as $option):?>
            <div class="radio" id="<?php echo $question->nomor;?>">
                <label>
                    <input type="radio"                            
                           class="radioButton"                           
                           <?php
                                if(isset($answerList[$question->nomor]->isiJawaban)){
                                    echo ($answerList[$question->nomor]->isiJawaban == $option->nomor) ? "checked" : "";
                                }
                           ?>                           
                           >
                                        
                    <?php echo $option->isJawaban?'<span style="background-color:yellow;">':""?>
                    <?php echo $option->getOption($option->nomor);?>
                    <?php echo $option->isJawaban?'</span>':""?>
                    
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