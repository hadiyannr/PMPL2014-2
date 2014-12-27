<?php

$this->breadcrumbs = array(
  'Profil'=>array("index"),
  'Ubah Password',
  );
echo '<br>';
?>
<div class="profil-box">
  <div class="title text-center">
    <h2>Ubah Password</h2>
  </div>
  <div class="row">
    <form role="form" class="col-md-4" method="post">
      <div class="form-group">
        <label>Password Lama</label>
        <input type="password" name="OldPassword" class="form-control" placeholder="Password Lama">
      </div>
      <div class="form-group">
        <label>Password baru</label>
        <input type="password" name="password" class="form-control" placeholder="Password Baru">
      </div>
      <div class="form-group">
        <label>Konfirmasi Password baru</label>
        <input type="password" name="confirmpassword" class="form-control" placeholder="Konfirmasi Password">
      </div>
      <input type="submit" class="btn btn-default" name="submit" value="Submit">
    </form>
  </div>
</div>