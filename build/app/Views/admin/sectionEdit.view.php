<h2>Change date for section - "<b><?=$data['section']->getTitle()?></b>"</h2>

<form  method='post' action="/admin/sections/edit/<?=$data['section']->getId()?>">
    <div>
        <input  name='title' type="text" value="<?=$data['section']->getTitle()?>">
    </div>
    <div>
        <input  name='slug' type="text" value="<?=$data['section']->getSlug()?>">
    </div>
    <button type="submit" class="button btn btn-primary">Edit</button>
</form>