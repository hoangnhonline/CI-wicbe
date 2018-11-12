<?php
$CI = &get_instance();
$CI->load->model('M_user')

?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="contentcontainer med left">
        <div class="headings altheading">
            <h2>Sửa bài viết</h2>
        </div>
        <div class="contentbox">
            <p>
                <label for="textfield"><strong>Tiêu Đề </strong></label>
                <input name="name" value="<?=$row->name?>" type="text" id="textfield" class="inputbox">
                <?php echo form_error('name'); ?>
            </p>
            <p>
                <label for="textfield"><strong>Tóm Tắt </strong></label>
                <textarea id="" style="height: 100px" name="summary" class="textarea inputbox" ><?=$row->summary?></textarea>
            </p>

            <p>
                <label for="textfield"><strong>Mô tả</strong></label>
                <textarea class="textarea" cols="80" id="content" name="content" rows="15"><?=$row->content?></textarea>
            <p>
                <label for="smallbox"><strong>Trạng thái: </strong></label>
                <input type="radio" value="1" name="status" <?php if($row->status==1){ ?>checked<?php } ?>>Hiển thị
                <input type="radio" value="0" name="status" <?php if($row->status==0){ ?>checked<?php } ?>>Ẩn
            </p>
            <input type="submit" class="btn check_cat" value="Cập nhật" name="ok" />
        </div>

    </div>

    <div class="contentcontainer sml right ">
        <div class="headings altheading">
            <h2 class="left">Hỗ trợ seo</h2>
        </div>
        <div class="contentbox">
            <p>
                <label for="textfield"><strong>Title </strong></label>
                <input name="title" value="<?=$row->title?>" type="text" id="textfield" class="inputbox weight">
            </p>
            <p>
                <label for="textfield"><strong>Keywords </strong></label>
                <textarea id="" style="height: 100px" name="keywords" class="textarea inputbox weight" ><?=$row->keywords?></textarea>
            </p>
            <p>
                <label for="textfield"><strong>Description </strong></label>
                <textarea id="" style="height: 100px" name="description" class="textarea inputbox weight" ><?=$row->description?></textarea>
            </p>

            <p>
                <label for="textfield"><strong>Thứ tự </strong></label>
                <input name="weight" value="<?=$row->weight?>" type="text" id="textfield" class="inputbox weight">
            </p>
            <p>
                <label for="smallbox"><strong>Hot: </strong></label>
                <input type="radio" value="1" name="hot" <?php if($row->hot==1){ ?>checked<?php } ?>>Hiển thị
                <input type="radio" value="0" name="hot" <?php if($row->hot==0){ ?>checked<?php } ?>>Ẩn
            </p>

        </div>
    </div>
    <div class="contentcontainer sml right ">
        <div class="headings altheading">
            <h2 class="left">Hình đại diện</h2>
        </div>
        <div class="contentbox ">
            <p>
                <label for="textfield"><strong>Ten hinh </strong></label>
                <input name="name_img" value="" type="text" id="textfield" class="inputbox weight">
            </p>
            <div style="clear: both"></div>
            <img src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$row->img ?>&w=90&h=90&zc=1">
            <span id="imsssg">
                <input id="hinhanh" type="file" name="img">
                <img alt="Loading" src="theme/img/loading.gif">
                Uploading...
            </span>
            <?php echo form_error('img'); ?>
            <br>
            <span class="smltxt">(Hình mới sẽ đựoc up sau khi thêm mới)</span>
        </div>
</form>
<style>
    .nga{display: none !important;}
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
