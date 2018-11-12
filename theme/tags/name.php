<?php
$CI = &get_instance();
$CI->load->model('M_tags');

?>

[
<?php foreach ($CI->M_tags->show_list_tags() as $row1) { ?>
{"text": "<?=$row1->name?>", "value": "<?=$row1->id?>"},
<?php } ?>

]