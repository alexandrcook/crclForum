<h1>Topic <b>"<?= $data['topic']->getTitle() ?>"</b> in <a href="/section/<?= $data['section'][0]->getSlug()?>"<b>"<?= $data['section'][0]->getTitle() ?>"</b></a></h1>
<hr style="border: solid 1px black">
<table class="table table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Post info</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $i = 0;
    foreach ($data['post'] as $post) { ?>
        <?php if($post->getUser_id() == $_SESSION['user_id']){ ?>
            <tr style="background-color: rgba(0,0,0,0.1)">
                <th class="col-xs-2">
                    #<?= ++$i ?>
                    <br>
                    From: <?= $post->getUserInfo($post->getUser_id())->getName() ?>
                    <br>
                    <br>
                    Email: <?= $post->getUserInfo($post->getUser_id())->getEmail() ?>
                </th>
                <td class="col-xs-10" style="position: relative">
                    <?= $post->getText() ?>
                    <br>
                    <div style="position: absolute; bottom: 0; right: 10px">
                        Posted at: <?= $post->getCreated_at() ?>
                    </div>
                </td>
            </tr>

        <?php } else { ?>
        <tr>
            <th class="col-xs-2">
                #<?= ++$i ?>
                <br>
                From: <?= $post->getUserInfo($post->getUser_id())->getName() ?>
                <br>
                <br>
                Email: <?= $post->getUserInfo($post->getUser_id())->getEmail() ?>
            </th>
            <td class="col-xs-10" style="position: relative">
                <?= $post->getText() ?>
                <br>
                <div style="position: absolute; bottom: 0; right: 10px">
                    Posted at: <?= $post->getCreated_at() ?>
                </div>
            </td>
        </tr>
        <?php } ?>
    <?php } ?>
    </tbody>
</table>

<div class="row">
<form method='post' class="form-group ">
    <label class="col-xs-2">
        <input class="btn btn-success pull-right" type="submit" value="Post new message !!!">
    </label>
    <label class="col-xs-10">
    <textarea type="text" class="form-control" cols="30" rows="3" name='form[post]'
              placeholder="Type your message here..."></textarea>
    </label>
</form>
</div>