<a href="/manageuser/add" class="btn">Add</a>
<table class="table">
    <tr>
        <th>Id</th>
        <th>Email</th>
        <th>UserName</th>
        <th>Last login</th>
        <th>Role</th>
        <th>Action</th>
    </tr>
    <?php if (isset($users)): ?>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user->id ?></td>
                <td><?php echo $user->email ?></td>
                <td><?php echo $user->username ?></td>
                <td><?php echo $user->last_login ?></td>
                <td>
                    <?php foreach ($userRole[$user->id] as $role): ?>
                        <?php echo $roles[$role] . '<br>' ?>
                    <?php endforeach; ?>
                </td>
                <td>
                    <a href="/manageuser/remove/<?php echo $user->id ?>"><i class="icon-remove"></i></a>
                    <a href="/manageuser/edit/<?php echo $user->id ?>"><i class="icon-pencil"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>