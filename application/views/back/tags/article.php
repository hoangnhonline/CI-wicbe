




<?php foreach ($row as $r){ ?>

<div>
    <input type="checkbox"  name="check_tags[<?= $r->id ?>]" id="check_tags_<?= $r->id ?>" value="check_tags_<?= $r->id ?>" data-name="<?= $r->name ?>">
    <?= $r->name ?>
</div>
<?php }?>