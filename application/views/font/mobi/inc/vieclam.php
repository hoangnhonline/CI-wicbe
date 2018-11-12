
<?php
$CI = &get_instance();
$CI->load->model('M_artice');
if($this->uri->segment(1)=="en"){$id =2;}else{$id=1;}

?>

<?php $edit = $CI->M_artice->upvieclam($id) ?>


<link rel="stylesheet" href="<?=base_url('theme/css/mobi/css/jquery-ui.css')?>">
<script>
    $(function() {
        $( "#accordion" ).accordion();
    });
</script>

<div style="clear: both;float: left;width: 100%;height: 20px"></div>
<a href="<?= site_url($lang.'/'.$l->lang_tuyendung_link[$lang]) ?>" class="tuyendung"><?=$l->lang_tuyendung[$lang]?></a>
<div style="clear: both;float: left;width: 100%;"></div>
<div id="accordion">


    <h3><?=$l->lang_kinhdoanh[$lang]?></h3>
    <div>
       <?=$edit->kinhdoanh?>
    </div>
    <h3>Sales engineer</h3>
    <div>
        <p>
            <?=$edit->service_manager_kd?>
        </p>
    </div>
    <h3><?=$l->lang_giamsat[$lang]?></h3>
    <div>
        <p>
            <?=$edit->giamsat?>
        </p>

    </div>
    <h3>Service manager</h3>
    <div>
        <?=$edit->service_manager_gs?>
    </div>
    <h3><?=$l->lang_kythuat[$lang]?></h3>
    <div>
        <?=$edit->kythuat?>
    </div>
    <h3>Service manager</h3>
    <div>
        <?=$edit->service_manager_kt?>
    </div>

</div>
<div style="clear: both;float: left;width: 100%;height: 20px"></div>
<style>
    li{list-style: initial}
</style>