<h2>Topics</h2>

<div class="row">
    <div class="create col-xs-6">
        <form method='post' action="/admin/topics/create">
            <div>
                <input name='title' type="text" class="form-control" placeholder="title">
            </div>

            <div>
                <input name='slug' type="text" class="form-control" placeholder="slug">
            </div>

            <button type="submit" class="button btn btn-primary center-block">Create topics</button>
        </form>
    </div>
</div>

<table style="border-collapse: collapse;">
    <tr style="border-collapse: collapse;">
        <td style="border: solid 1px black; padding: 10px">#</td>
        <td style="border: solid 1px black; padding: 10px">Title</td>
        <td style="border: solid 1px black; padding: 10px">Slug</td>
        <td style="border: solid 1px black; padding: 10px">Edit</td>
        <td style="border: solid 1px black; padding: 10px">Delate</td>
    </tr>
    <?php
    $i = 0; ?>
    <?php

    foreach ($data['topics'] as $key => $topic) {
        $i++;
        ?>
        <tr style="border-collapse: collapse;">
            <td style="border: solid 1px black; padding: 10px">
                <?= $i ?></td>
            <td style="border: solid 1px black; padding: 10px">
                <?= $topic->getTitle() ?>
            </td>
            <td style="border: solid 1px black; padding: 10px">
                <?= $topic->getSlug() ?>
            </td>
            <td style="border: solid 1px black; padding: 10px">
                <a href="/admin/topics/edit/<?= $topic->getId() ?>">Edit</a></td>
            <td style="border: solid 1px black; padding: 10px">
                <a href="/admin/topics/delete/<?= $topic->getId() ?>">X</a></td>
        </tr>

        <?php
    }
    ?>
</table>