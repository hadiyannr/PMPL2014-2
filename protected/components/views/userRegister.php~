<div class="modal fade bs-example-modal-sm" id="SignUp" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Daftar</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="post">			          
                    <div class="form-group">
                        <label data-toggle="tooltip" data-placement="top" title="Please use your real name">Username</label>
                        <br>
                        <input name="DaftarForm[username]" type="text" class="form-control" placeholder="No Space, min 5 characters" pattern="^[a-zA-Z0-9]{5,}$" required>
                    </div>
                    <div class="form-group">
                        <label >Email address</label>
								<br>
                        <input name="DaftarForm[email]" type="email" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label data-toggle="tooltip" data-placement="top" title="At least 5 characters, No Space, max 32 characters">Password</label>
                        <br>
                        <input name="DaftarForm[password]" type="password" class="form-control" placeholder="No Space, 5-32 characters" pattern="^[a-zA-Z0-9]*{5,32}$" required>
                    </div>				
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <br>
                        <input name="DaftarForm[confirmPassword]" type="password" class="form-control" placeholder="" required>
                    </div>					  			 	  			 					  
                    <button type="submit" class="btn btn-primary">Daftar</button>					
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <br><br><br>
                    <?php $this->widget('ext.hoauth.widgets.HOAuth'); ?>
                </form>
            </div>			      
        </div>
    </div>
</div>