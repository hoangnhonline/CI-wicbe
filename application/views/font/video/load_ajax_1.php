
<?php foreach ($this->M_item->show_list_item_page_type_home(array('item.item_type' =>2,'item.item_status' =>1,'item.id <'=>264)) as $row) { ?>

    <div id="<?=$row->id?>" class="message_box ">
        <?php $thumb = $this->M_item->show_thumb($row->id); ?>
        <img src="<?php echo base_url() ?>timthumb.php?src=<?php echo base_url() ?><?php echo $thumb->thumb ?>&w=490&h=350&zc=1" alt="<?= $row->item_name ?>">
        <h3><?= $row->item_name ?></h3>

    </div>
<?php }?>