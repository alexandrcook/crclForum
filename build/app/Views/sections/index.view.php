<h1>Pозділ: "<?=$data['section'][0]->getTitle()?>"</h1>
<hr>

<form method='post'>
    <input type="text" name='form[theme]' placeholder="Тема">
    <button type="submit">Створити нову тему</button>
</form>

<h2>Теми розділу:</h2>
<ul>
    <?php
    foreach($data['topic'] as $topic) {
        ?>
        <li><a href="/section/<?=$data['section'][0]->getSlug()?>/<?=$topic->getId()?>"><?=$topic->getTitle()?></a></li>
    <?php } ?>
</ul>
