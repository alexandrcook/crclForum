<h2>Posts</h2>

<div class="row">
    <div class="create col-xs-6">
        <form method='post' action="/admin/posts/create">
            <div>
                <textarea name="text" placeholder="text"></textarea>
            </div>
            <div>
                <input name='topic_id' type="text" class="form-control" placeholder="topic_id">
            </div>
            <div>
                <input name='user_id' type="text" class="form-control" placeholder="user_id">
            </div>

            <button type="submit" class="button btn btn-primary center-block">Create post</button>
        </form>
    </div>
</div>

<table style="border-collapse: collapse;">
    <tr style="border-collapse: collapse;">
        <td style="border: solid 1px black; padding: 10px">#</td>
        <td style="border: solid 1px black; padding: 10px">Text</td>
        <td style="border: solid 1px black; padding: 10px">Topic_id</td>
        <td style="border: solid 1px black; padding: 10px">User_id</td>
        <td style="border: solid 1px black; padding: 10px">Created_at</td>
        <td style="border: solid 1px black; padding: 10px">Edit</td>
        <td style="border: solid 1px black; padding: 10px">Delete</td>
    </tr>
    <?php
    $i = 0; ?>
    <?php

    foreach ($data['posts'] as $key => $post) {
        $i++;
        ?>
        <tr style="border-collapse: collapse;">
            <td style="border: solid 1px black; padding: 10px">
                <?= $i ?></td>
            <td style="border: solid 1px black; padding: 10px">
                <?= $post->getText() ?>
            </td>
            <td style="border: solid 1px black; padding: 10px">
                <?= $post->getTopic_id() ?>
            </td>
            <td style="border: solid 1px black; padding: 10px">
                <?= $post->getUser_id() ?>
            </td>
            <td style="border: solid 1px black; padding: 10px">
                <?= $post->getCreated_at() ?>
            </td>
            <td style="border: solid 1px black; padding: 10px">
                <a href="/admin/posts/edit/<?= $post->getId() ?>">Edit</a></td>
            <td style="border: solid 1px black; padding: 10px">
                <a href="/admin/posts/delete/<?= $post->getId() ?>">X</a></td>
        </tr>

        <?php
    }
    ?>
</table>