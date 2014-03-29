<?php
 $this->widget('zii.widgets.grid.CGridView', array(       
        'dataProvider' => new CActiveDataProvider('Soal', array('data'=>$model->opsis)),
        'columns' => array(
            'id',
            'pernyataan',
        ),
    ));

?>
