<div class="span4 offset3 well">    
    <form action="" method="post">
        <div class="span4 span-left">
            <p>
                Email<input type="text" name="email" value="<?php echo $user->email ?>">
                <?php echo HTMLComponents::Alert('error', $errors, 'email') ?>
            </p>
            <p>
                Name<input type="text" name="username" value="<?php echo $user->username ?>">
                <?php echo HTMLComponents::Alert('error', $errors, 'username') ?>
            </p>
            <p>
                Pass<input type="password" name="password">
                <?php echo HTMLComponents::Alert('error', $errors, 'password') ?>
            </p>
            <div class="row">
                <div class="span1">Role</div>
                <div class="span2">
                    <select name="role">
                        <?php foreach ($roles as $role): ?>
                            <option value="<?php echo $role->id ?>" 
                                    <?php echo ($role->id == $activeRole) ? 'selected="selected"' : '' ?>">
                                        <?php echo $role->name ?> 
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="offset1">
            <input type="submit" class="btn btn-success" value="Add">
            <a href ="/manageuser" class ="btn">Anuluj</a>
        </div>
    </form>
</div>