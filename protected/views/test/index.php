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