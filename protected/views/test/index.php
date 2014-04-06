<div class="col-md-11">
    <table class="table table-striped">
        <tr>
            <td>id</td>
            <td>username</td>
            <td>password</td>
            <td>action</td>
        </tr>

        <?php foreach ($model as $user) { ?>
            <tr>
                <td><?php echo $user->id; ?></td>
                <td><?php echo $user->username; ?></td>
                <td><?php echo $user->password; ?></td>
                <td><?php CHtml::link('Tulis', 'test/tulis'); ?></td>
            </tr>        
        <?php } ?>

    </table>
</div>

<form name="form1" method="post" action="">
    <label>
        <input type="radio" name="RadioGroup1" value="1" ondblclick="uncheckRadio();">
        Apple</label>
    <br>
    <label>
        <input type="radio" name="RadioGroup1" value="2" ondblclick="uncheckRadio();">
        Orange</label>
    <br>
    <label>
        <input type="radio" name="RadioGroup1" value="3" ondblclick="uncheckRadio();">
        Grape</label>
    <label>
        <input type="radio" name="RadioGroup2" value="3" ondblclick="uncheckRadio();">
        Grape</label>
</form>
<script language="JavaScript" type="text/JavaScript">
    function uncheckRadio() {
     var choice = document.form1;
     for (i = 0; i < choice.length; i++) {
      if ( choice[i].checked = true ) 
       choice[i].checked = false; 
     }
    }

</script>