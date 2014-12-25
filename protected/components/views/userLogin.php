<div class="modal fade bs-example-modal-sm" id="Login" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Masuk</h4>
            </div>
            <div class="modal-body">     
                <form role="form" method="post">
                    <div class="form-group">
                        <label>Nama pengguna</label>
                        <br>
                        <input type="text" name="LoginForm[username]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <br>
                        <input type="password" name="LoginForm[password]" class="form-control"  required>
                    </div>					  			 					  
                    <div class="form-group">    
                        <span >Ingatkan saya</span>                    
                        <input type="checkbox" name="LoginForm[rememberMe]">
                    </div>
					<!-- Untuk lupa password -->
					<p> <?php echo CHtml::link('Lupa password?',array('/site/Forget'),array('style'=>'color:#6fc5a4 !important;')) ?> </p>
                    <button type="submit" class="btn btn-primary">Masuk</button>					
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <br><br><br>
                    <?php $this->widget('ext.hoauth.widgets.HOAuth'); ?>
                </form>                                                   
            </div>			      
        </div>
    </div>
</div>