<h2>Users</h2>

<div class="row">
    <div class="create col-xs-6">
        <form method='post' action="/admin/users/create">
            <div>
                <input name='name' type="text" class="form-control" placeholder="name">
            </div>

            <div>
                <input name='email' type="email" class="form-control" placeholder="email">
            </div>

            <div>
                <input class="form-control" type="password" name="pass" placeholder="pass">
            </div>

            <div>
                <input type="text" name="is_admin" placeholder="is_admin">
                <input class="pull-right" type="text" name="vk_id" placeholder="vk_id">
            </div>

            <button type="submit" class="button btn btn-primary center-block">Cтворити користувача</button>
        </form>
    </div>
</div>

<table style="border-collapse: collapse;">
    <tr style="border-collapse: collapse;">
        <td style="border: solid 1px black; padding: 10px">#</td>
        <td style="border: solid 1px black; padding: 10px">Name</td>
        <td style="border: solid 1px black; padding: 10px">email</td>
        <td style="border: solid 1px black; padding: 10px">pass</td>
        <td style="border: solid 1px black; padding: 10px">is_admin</td>
        <td style="border: solid 1px black; padding: 10px">vk_id</td>
        <td style="border: solid 1px black; padding: 10px">Edit</td>
        <td style="border: solid 1px black; padding: 10px">Delate</td>
    </tr>
    <?php

    $i = 0; ?>
    <?php

    foreach ($data['user'] as $key => $user) {
        $i++;
        ?>
        <tr style="border-collapse: collapse;">
            <td style="border: solid 1px black; padding: 10px">
                <?= $i ?></td>
            <td style="border: solid 1px black; padding: 10px">
                <?= $user->getName() ?></td>
            <td style="border: solid 1px black; padding: 10px">
                <?= $user->getEmail() ?></td>
            <td style="border: solid 1px black; padding: 10px">
                <?= $user->getPass() ?></td>
            <td style="border: solid 1px black; padding: 10px">
                <?= $user->getIs_admin() ?></td>
            <td style="border: solid 1px black; padding: 10px">
                <?= $user->getVk_id() ?></td>
            <td style="border: solid 1px black; padding: 10px">
                <a href="/admin/users/edit/<?= $user->getId() ?>">Edit</a></td>
            <td style="border: solid 1px black; padding: 10px">
                <a href="/admin/users/delete/<?= $user->getId() ?>">X</a></td>
        </tr>

        <?php
    }
    ?>
</table>