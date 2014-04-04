

<?php
    foreach ($model as $kategori) {
        echo "<li>",CHtml::link($kategori->nama, array('konten/kategori','idcategory'=>$kategori->id)),"</li>";       
    }
    
    
