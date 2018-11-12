<?php
$CI = &get_instance();
$CI->load->model('M_user');
$CI->load->model('M_tags');
//echo json_encode(file_get_contents(base_url('theme/tags/names.json')));
//echo json_encode(file_get_contents(base_url('theme/tags/name.php')));
?>



<form action="" method="post" enctype="multipart/form-data">
    <div class="contentcontainer med left">
        <div class="headings altheading">
            <h2>Thêm mới bài viết</h2>
        </div>
        <div class="contentbox">

            <!-- -------------------Theo ngon ngu------------------------------- -->
            <p>
                <label for="textfield"><strong>Tiêu Đề </strong></label>
                <input name="name" value="<?=$row->name?>" type="text" id="textfield" class="inputbox">
                <?php echo form_error('name'); ?>
            </p>
            <p>
                <label for="textfield"><strong>Tóm Tắt </strong></label>
                <textarea  style="height: 100px" name="summary" class="textarea inputbox" ><?=$row->summary?></textarea>
            </p>

            <p>
                <label for="textfield"><strong>Mô tả</strong></label>
                <textarea class="textarea" cols="80" id="content" name="content" rows="15"><?=$row->content?></textarea></p>
            <p>
                <label for="smallbox"><strong>Trạng thái: </strong></label>
                <input type="radio" value="1" name="status" <?php if($row->status==1){ ?>checked="checked" <?php }?>>Hiển thị
                <input type="radio" value="0" name="status" <?php if($row->status==0){ ?>checked="checked" <?php }?>>Ẩn
            </p>

            <p>
                <label for="textfield"><strong>Tags </strong></label>
            </p>
            <div class="panel-body">
                <select class="tokenize-sortable-demo1" multiple>
                    <?php foreach ($CI->M_tags->show_list_tags() as $row1){ ?>
                <option value="<?=$row1->id?>" <?php if($CI->M_tags->chec($row->id,$row1->id) > 0){ ?> selected <?php }?>><?=$row1->name?></option>
                    <?php } ?>

                </select>
            </div>

            <input type="submit" class="btn check_cat" value="Cập nhật" name="ok" />
        </div>

    </div>

    <div class="contentcontainer sml right ">
        <div class="headings altheading">
            <h2 class="left">Danh mục</h2>
        </div>
        <div class="contentbox">
            <p>
                <select name="cate" id="check_category" style="width:350px;height: 35px;display: block !important;">
                    <option value="0">Chọn danh mục</option>
                    <?php foreach ($this->M_category->list_category_all(array('top' => 0, 'type' => 2)) as $row1) { ?>
                        <option style="color:#f00" <?php if($this->M_category->count_category($row1->id) > 0){ ?> disabled="disable"<?php }?><?php if($row->cate==$row1->id) {?> selected <?php } ?> value="<?=$row1->id?>"><?=$row1->name?></option>
                        <?php foreach ($this->M_category->list_category_chill($row1->id) as $dmcon) { ?>
                            <option value="<?=$dmcon->id?>">|----<?=$dmcon->name?></option>
                        <?php }?>
                    <?php }?>
                </select>
            </p>

            <div style="clear: both"></div>

        </div>
    </div>
    <div class="contentcontainer sml right">
        <div class="headings altheading">
            <h2 class="left">Hỗ trợ seo</h2>
        </div>
        <div class="contentbox">
            <p>
                <label for="textfield"><strong>Title</strong></label>
                <input name="title" value="<?=$row->title?>" type="text" id="textfield" class="inputbox weight">

            </p>
            <p>
                <label for="textfield"><strong>Keywords</strong></label>
                <input name="keywords" value="<?=$row->keywords?>" type="text" id="textfield" class="inputbox weight">
            </p>
            <p>
                <label for="textfield"><strong>Description </strong></label>
                <input name="description" value="<?=$row->description?>" type="text" id="textfield" class="inputbox weight">
            </p>

            <p>
                <label for="textfield"><strong>Thứ tự </strong></label>
                <input name="weight" value="<?=$row->weight?>" type="text" id="textfield" class="inputbox weight">
            </p>
            <p>
                <label for="smallbox"><strong>Nổi bật : </strong></label>
                <input type="radio" value="1" name="hot" <?php if($row->hot==1){ ?>checked="checked" <?php }?> >Nổi bật
                <input type="radio" value="0" name="hot" <?php if($row->hot==0){ ?>checked="checked" <?php }?>>Không
            </p>
        </div>
    </div>
    <div class="contentcontainer sml right">
        <div class="contentbox">
            <p>
                <label for="smallbox"><strong>Hình đại diện</strong></label>
                <input type="radio" value="local" name="chose_img" id="radio_local" checked>Local

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


            <hr />

        </div>
    </div>

</form>


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


<style>
    .nga{display: none}
    .panel-body{width: 100%;display: inline-block;margin: 0px 0px 10px 0px;border: 1px solid #999;}
</style>

<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="<?=base_url()?>theme/tags/tokenize2.css" rel="stylesheet" />
<script src="<?=base_url()?>theme/tags/tokenize2.js"></script>
<link href="<?=base_url()?>theme/tags/demo.css" rel="stylesheet" />
<script type="text/javascript">
    $('.tokenize-sample-demo1').tokenize2();
    $('.tokenize-remote-demo1, .tokenize-remote-modal').tokenize2({
        dataSource: 'remote.php'
    });
    $('.tokenize-limit-demo1').tokenize2({
        tokensMaxItems: 5
    });
    $('.tokenize-limit-demo2').tokenize2({
        tokensMaxItems: 1
    });
    $('.tokenize-ph-demo1').tokenize2({
        placeholder: 'Please add new tokens'
    });
    $('.tokenize-sortable-demo1').tokenize2({
        sortable: true
    });
    $('.tokenize-custom-demo1').tokenize2({
        tokensAllowCustom: true
    });

    $('.tokenize-callable-demo1').tokenize2({
        dataSource: function(search, object){
            $.ajax('remote.php', {
                data: { search: search, start: 1 },
                dataType: 'json',
                success: function(data){
                    var $items = [];
                    $.each(data, function(k, v){
                        $items.push(v);
                    });
                    object.trigger('tokenize:dropdown:fill', [$items]);
                }
            });
        }
    });

    $('.tokenize-override-demo1').tokenize2();
    $.extend($('.tokenize-override-demo1').tokenize2(), {
        dropdownItemFormat: function(v){
            return $('<a />').html(v.text + ' override').attr({
                'data-value': v.value,

                //    value="check_tags_45" name="check_tags[45]"
                'data-text': v.text
            })
        }
    });

    $('#btnClear').on('mousedown touchstart', function(e){
        e.preventDefault();
        $('.tokenize-demo1, .tokenize-demo2, .tokenize-demo3').tokenize2().trigger('tokenize:clear');
    });
</script>
