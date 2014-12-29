

<?php    
    foreach ($model as $kategori) {
        echo '<li>',CHtml::link($kategori->nama, array('konten/viewbycategory','idcategory'=>$kategori->id)),"</li>";       
    }
    
    
