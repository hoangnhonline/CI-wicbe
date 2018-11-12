


<?php foreach ($row as $r){ ?>
    <?php if($this->M_artice->get_id_check($id_tags,$r->id) < 1 ){ ?>
    <div style="">
        <input type="checkbox"  name="check_tags[<?= $r->id ?>]" id="check_tags_<?= $r->id ?>" value="check_tags_<?= $r->id ?>" data-name="<?= $r->name ?>">
        <?= $r->name ?>
    </div>
    <?php } ?>


<?php }?>