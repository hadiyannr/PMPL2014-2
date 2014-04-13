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
                        <label>Username</label>
                        <input name="DaftarForm[username]" type="text" class="form-control" placeholder="username" pattern="^[a-zA-Z0-9]{5,}$" required>
                    </div>
                    <div class="form-group">
                        <label>Email address</label>
                        <input name="DaftarForm[email]" type="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="DaftarForm[password]" type="password" class="form-control" placeholder="Password" pattern="^[*]{5,}$" required>
                    </div>				
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input name="DaftarForm[confirmPassword]" type="password" class="form-control" placeholder="Confirm Password" required>
                    </div>					  			 	  			 					  
                    <button type="submit" class="btn btn-primary">Daftar</button>					
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>			        	
                </form>
            </div>			      
        </div>
    </div>
</div>