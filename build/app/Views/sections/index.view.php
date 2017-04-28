<h2>Section: "<?= $data['section'][0]->getTitle() ?>"</h2>
<hr>

<h2>Sections topics :</h2>
<ul>
    <?php
    foreach ($data['topic'] as $topic) {
        ?>
        <li>
            <a href="/section/<?= $data['section'][0]->getSlug() ?>/<?= $topic->getId() ?>"><?= $topic->getTitle() ?>
            </a>
        </li>
    <?php } ?>
</ul>

<form method='post'>
    <label class="form-group">
        <input class="form-control" type="text" name='form[theme]' placeholder="Topic name">
    </label>
    <input class="btn btn-success" type="submit" value="Create new topics">
</form>
