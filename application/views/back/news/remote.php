<?php
//header('content-type: text/json');

$search = preg_quote(isset($_REQUEST['search']) ? $_REQUEST['search'] : '');
$start = (isset($_REQUEST['start']) ? $_REQUEST['start'] : 1);
$obj = json_decode(file_get_contents('names.json'), true);
$ret = array();

foreach ($CI->M_tags->show_list_tags() as $row1)
{
    if(preg_match('/' . ($start ? '^' : '') . $search . '/i', $row1->name))
    {
        $ret[] = array('value' => $row1->id, 'text' => $row1->name);
    }
}

echo json_encode($ret);