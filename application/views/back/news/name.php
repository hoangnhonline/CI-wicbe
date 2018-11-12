<?php
$CI = &get_instance();
$CI->load->model('M_tags');

?>
<?php

$ret_array[]='';

foreach ($CI->M_tags->show_list_tags() as $row1) {
        $obj['text'] = $row1->name;
        $obj['value'] = $row1->id;
        $ret_array[] = $obj;

}
     return $ret_array;
?>


