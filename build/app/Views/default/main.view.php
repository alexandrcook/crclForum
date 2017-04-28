<h1>Forum Sections</h1>
<hr style="border: solid 1px black">
<table class="table table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Section Name</th>
        <th>Topics Count</th>
        <th>Ref to topic</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $i = 0;
    foreach ($data['sections'] as $section) { ?>
        <tr>
            <th scope="row"><?= ++$i ?></th>
            <td>
                <a href="/section/<?= $section->getSlug() ?>"><?= $section->getTitle() ?>
                </a>
            </td>
            <td>
                <?= count($section->topicsInSection($section->getId())) ?>
            </td>
            <td>
                <ul>
                    <?php foreach ($section->topicsInSection($section->getId()) as $topic) { ?>

                        <li>
                            <a href="/section/<?= $section->getSlug() ?>/<?= $topic->getId() ?>">
                                <?= $topic->getTitle() ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
