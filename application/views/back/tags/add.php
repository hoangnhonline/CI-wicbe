<?php
$CI = &get_instance();
$CI->load->model('M_user');
$CI->load->model('M_item');
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="contentcontainer med left">
        <div class="headings altheading">
            <h2>Thêm mới tags</h2>
        </div>
        <div class="contentbox">
                <p>
                    <label for="textfield"><strong>Tiêu Đề </strong></label>
                     <input name="name" value="" type="text" id="textfield" class="inputbox">
                           <?php echo form_error('name'); ?>
                </p>
            <p>
                <label for="textfield"><strong>Title </strong></label>
                <input name="title" value="" type="text" id="textfield" class="inputbox">

            </p>

                <p>
                    <label for="textfield"><strong>keywords</strong></label>
                    <textarea id="" style="height: 100px" name="keywords" class="textarea inputbox" ></textarea>
                </p>

            <p>
                <label for="textfield"><strong>Description</strong></label>
                <textarea id="" style="height: 100px" name="description" class="textarea inputbox" ></textarea>
            </p>


            <p >
                <label for="textfield"><strong>Mô tả </strong></label>
                <textarea class="textarea" cols="80" id="content" name="content" rows="15"><?php
                    if ($this->input->post('content')) { echo $this->input->post('content'); } else { echo 'Updating...';} ?></textarea>
            </p>
             <p>
                <label for="smallbox"><strong>Trạng thái: </strong></label>
                <input type="radio" value="1" name="status" checked>Hiển thị
                <input type="radio" value="0" name="status">Ẩn 
            </p>
                 <input type="submit" class="btn check_cat" value="Thêm mới" name="ok" />
        </div>   
       
    </div>


    <div class="contentcontainer sml right">
        <div class="headings altheading">
            <h2 class="left">Sản phẩm</h2>

        </div>
        <div class="contentbox">

            <div class="div_tags">

                <?php foreach ($CI->M_item->show_list_item_sp1(array('type'=>1)) as $r1){ ?>
                    <div style="">
                        <input type="checkbox"   name="check_tags[<?= $r1->id ?>]" id="check_tags_<?= $r1->id ?>" value="check_tags_<?= $r1->id ?>" data-name="<?= $r1->name ?>">
                        <?= $r1->name ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

            </form>
<style>
    .nga{display: none !important;}
    .div_tags{width: 100%;max-height: 450px;overflow: auto}
</style>

<script type="text/javascript">

    CKEDITOR.replace('content', {height: 350, width: "98%", resize_enabled: true,
        filebrowserBrowseUrl: '<?php echo base_url() ?>editor/find/ckfinder.html',
        filebrowserImageBrowseUrl: '<?php echo base_url() ?>editor/find/ckfinder.html',
        filebrowserUploadUrl: '<?php echo base_url() ?>editor/find/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: '<?php echo base_url() ?>editor/find/core/connector/php/connector.php?command=QuickUpload&type=Images',
    });



    function up() {
        for (instance in CKEDITOR.instances)
            CKEDITOR.instances[instance].updateElement();

    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        count_check_job();
        $("#check_category").change(function() {
            var id_cate = $(this).val();
            $.post("back/tags/article", {id_cate: id_cate}, function(data) {
                $("#article").html(data);
            }); });

    });


    function count_check_job() {

        var id_cate = $('#check_category').val();
        $.post("back/tags/article", {id_cate: id_cate}, function(data) {
            $("#article").html(data);
        });
    }

</script>
<script type="text/javascript">

    function load_item(e) {
        var id_cate = $('#check_category').val();
        var article_name = $(e).val();
        $.post("back/tags/article", {article_name: article_name, id_cate: id_cate}, function (data) {
            $("#article").html(data);
        });
    }


</script>