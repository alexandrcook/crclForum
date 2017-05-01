<h1>Results find with <b>"<?= $data['searchPhrase'] ?>"</b>:</h1>
<hr style="border: solid 1px black">
<table class="table table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Text</th>
        <th>Post info</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $i = 0;
    foreach ($data['posts'] as $post) { ?>
        <tr>
            <th scope="row"><?= ++$i ?></th>
            <td>
                <p><?= $post->getText(); ?>
            </td>
            <td>
               In topic: <a href="/section/<?= $post->postSectionInfo()->getSlug() ?>/<?= $post->postTopicInfo()->getId() ?>"><?= $post->postTopicInfo()->getTitle() ?></a>
                ( Section <a href="/section/<?= $post->postSectionInfo()->getSlug()?>"> "<?= $post->postSectionInfo()->getTitle() ?>" </a> )
                <br>
                Time: <?= $post->getCreated_at(); ?>
                <br>
                By: <?= $post->postUserInfo()->getName() ?> ( <?= $post->postUserInfo()->getEmail() ?> )
                <br>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>