<h1>Topics in section <b>"<?= $data['section'][0]->getTitle() ?>"</b></h1>
<hr style="border: solid 1px black">
<table class="table table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Topic</th>
        <th>Created</th>
        <th>Latest comment</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $i = 0;
    foreach ($data['topics'] as $topic) { ?>
        <tr>
            <th scope="row"><?= ++$i ?></th>
            <td>
                <a href="/section/<?= $data['section'][0]->getSlug() ?>/<?= $topic->getId() ?>"><?= $topic->getTitle() ?>
                </a>
                ( <b><?= $topic->postsInTopic($topic->getId()) ?></b> post(s) in this topic )
            </td>
            <td>
                Created: <b><?= $topic->firstMessageCreator($topic->getId())['created_at'] ?></b>
                <br>
                by: <b><?= $topic->firstMessageCreator($topic->getId())['user_name'] ?></b>
            </td>
            <td>
                Posted at: <b><?= $topic->latestMessageCreator($topic->getId())['created_at'] ?></b>
                <br>
                by: <b><?= $topic->latestMessageCreator($topic->getId())['user_name'] ?></b>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<hr>
<div class="row">
    <form method='post' class="form-group" action="/topic/create/<?= $data['section'][0]->getSlug() ?>">
        <label class="col-xs-2">
            <input class="form-control" type="text" name="name" placeholder="Enter Topic Name...">
            <br>
            <input class="form-control btn btn-success" type="submit" value="Create new Topic !!!">
        </label>
        <label class="col-xs-10">
    <textarea type="text" class="form-control" cols="30" rows="4" name='post'
              placeholder="... and type your start topic message here..."></textarea>
        </label>
    </form>
</div>
