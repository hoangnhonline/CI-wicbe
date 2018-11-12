<?php
$CI = &get_instance();
$CI->load->model('M_user');
$CI->load->model('M_tags');
?>

<script type="text/javascript">
    function goBack() {
    window.history.back()
}
$(document).ready(function(){
    $('#formNewsDetail').submit(function(){
        if($('#hinhanh').val()==''){alert ('Chưa nhập hình'); return false;}
    });
    });
</script>

<form action="" method="post" enctype="multipart/form-data" id="formNewsDetail">
    <div class="contentcontainer med left">
        <div class="headings altheading">
            <h2>Thêm mới sản phẩm</h2>
        </div>
        <div class="contentbox">

            <p style="display: none">
                    <label for="textfield"><strong>Mã sản phẩm</strong></label>
                    <input name="code" value="<?=$code?>"  type="text" id="textfield" class="inputbox">
               
                </p>
            <p >
                <label for="textfield"></strong></label>
                <input name="name"  type="text" id="textfield" class="inputbox">
                <?php echo form_error('name'); ?>
            </p>
            <p>
                <label for="textfield"><strong>Tóm Tắt </strong></label>
                <textarea  style="height: 100px" name="summary" class="textarea inputbox" ></textarea>
            </p>

                <p>
                    <label for="textfield"><strong>Thông tin sản phẩm </strong></label>
                    <textarea class="textarea" cols="80" id="content" name="content" rows="15"><?php
                        if ($this->input->post('content')) { echo $this->input->post('content');} else {echo 'Updating...';} ?></textarea>
                </p>
            <p>
                <label for="textfield"><strong>Chi tiết </strong></label>
                <textarea class="textarea" cols="80" id="content1" name="content1" rows="15"><?php
                    if ($this->input->post('content1')) { echo $this->input->post('content1');} else {echo 'Updating...';} ?></textarea>
            </p>
            <p>
                <label for="textfield"><strong>Tags </strong></label>
            </p>
            <div class="panel-body">
                <select class="tokenize-sortable-demo1" multiple>
                    <?php foreach ($CI->M_tags->show_list_tags() as $row1){ ?>
                        <option value="<?=$row1->id?>"><?=$row1->name?></option>
                    <?php } ?>

                </select>
            </div>

            <input type="submit" class="btn check_cat" value="Thêm mới" name="ok" />
        </div>   

    </div>

     <div class="contentcontainer sml right">
        <div class="headings altheading">
            <h2 class="left">Danh mục</h2>
        </div>
        <div class="contentbox">

            <p >
                <select name="cate" id="check_category" style="width:350px;height: 35px;display: block !important;">
                    <option value="0">Chọn danh mục</option>
                    <?php foreach ($this->M_category->list_category_all(array('top' => 0, 'type' => $type)) as $row) { ?>
                        <option style="color:#f00" <?php if($this->M_category->count_category($row->id) > 0){ ?> disabled="disable"<?php }?> value="<?=$row->id?>"><?=$row->name?></option>
                        <?php foreach ($this->M_category->list_category_chill($row->id) as $dmcon) { ?>
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
                <input name="title"  type="text" id="textfield" value="" class="inputbox weight">
            </p>

            <p>
                <label for="textfield"><strong>Keywords </strong></label>
                <textarea  style="height: 100px" name="keywords" class="textarea inputbox weight" ></textarea>
            </p>
            <p>
                <label for="textfield"><strong>Description </strong></label>
                <textarea  style="height: 100px" name="description" class="textarea inputbox weight" ></textarea>
            </p>

            <div style="clear: both"></div>

        </div>
    </div>

    <div class="contentcontainer sml right">
        <div class="headings altheading">
            <h2 class="left">Trạng Thái</h2>
        </div>
        <div class="contentbox">
            <p style="width:40%; float: left">
                <label for="smallbox"><strong>Trạng thái: </strong></label>
                <input type="radio" value="1" name="status" checked>Hiển thị
                <input type="radio" value="0" name="status">Ẩn 
            </p>
           
            <p style="width:40%; float: left;">
                <label for="smallbox"><strong>Nổi Bật: </strong></label>
                <input type="radio" value="1" name="hot" >Có
                <input type="radio" value="0" name="hot" checked="checked">Không 
            </p>
          
            <p style="clear:both"></p>

            <p>
                <label for="textfield"><strong>Hot</strong></label>
                <input name="name_hot"  type="text" id="textfield" value="" class="inputbox weight">
            </p>
            <p>
                    <label for="textfield"><strong>Thứ tự</strong></label>
                    <input name="weight"  type="text" id="textfield" value="<?=$weight?>" class="inputbox weight">
                 </p>
            <p>
                <label for="textfield"><strong>Giá</strong></label>
                <input name="price"  type="text" id="textfield" value="" class="inputbox weight">
            </p>

            <p>
                <label for="textfield"><strong>Giá khuyến mãi</strong></label>
                <input name="price_pro"  type="text" id="textfield" value="" class="inputbox weight">
            </p>

            <div style="clear: both"></div>

        </div>
    </div>
    <div class="contentcontainer sml right">
        <div class="headings altheading">
            <h2 class="left">Album Ảnh</h2>

        </div>
        <div class="contentbox">
            <p>
            <div style="clear: both"></div>
            <input name="name_img" placeholder="Tên hình"  type="text" id="textfield" value="" class="inputbox weight">
            <span id="imsssg"> 
                <input id="hinhanh" type="file" name="img">
                <img alt="Loading" src="theme/img/loading.gif">
                Uploading... 
            </span>
<?php echo form_error('img'); ?>
            <br>
            <span class="smltxt">(Hình mới sẽ đựoc up sau khi thêm mới)</span>

            <hr />
            <input name="name_img1" placeholder="Tên hình"  type="text" id="textfield" value="" class="inputbox weight">
            <div id="add" style="" >	<img src="theme/img/icons/add.png" alt="Add" /> Thêm Ảnh Khác</div>
            <div id="other_img" style=""></div>
        </div>
    </div>
</form>
<style>
    .nga{display: none !important;}
</style>
<!-- --------------------------------------------------------------- --> 
<!-- --------------------------------------------------------------- --> 

<script type="text/javascript">

CKEDITOR.replace('content', {height: 350, width: "98%", resize_enabled: true,
    filebrowserBrowseUrl: '<?php echo base_url() ?>editor/find/ckfinder.html',
    filebrowserImageBrowseUrl: '<?php echo base_url() ?>editor/find/ckfinder.html',
    filebrowserUploadUrl: '<?php echo base_url() ?>editor/find/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: '<?php echo base_url() ?>editor/find/core/connector/php/connector.php?command=QuickUpload&type=Images',
});


CKEDITOR.replace('content1', {height: 350, width: "98%", resize_enabled: true,
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
    function BrowseServer(startupPath, functionData) {
        var finder = new CKFinder();
        finder.basePath = 'editor/';
        finder.startupPath = startupPath;
        finder.selectActionFunction = SetFileField;
        finder.selectActionData = functionData;
        finder.selectThumbnailActionFunction = ShowThumbnails;
        finder.popup();
    }
    function SetFileField(fileUrl, data) {
        document.getElementById(data["selectActionData"]).value = fileUrl;
    }
    function ShowThumbnails(fileUrl, data) {
        var sFileName = this.getSelectedFile().name; // this = CKFinderAPI
        document.getElementById('thumbnails').innerHTML +=
                '<div class="thumb">' +
                '<img src="' + fileUrl + '" />' +
                '<div class="caption">' +
                '<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a> (' + data["fileSize"] + 'KB)' +
                '</div>' +
                '</div>';
        document.getElementById('preview').style.display = "";
        return true;
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#add").click(function() {
            var img = '<div class="div_img"><input  type="file" name="img_other[]"/></div>';
            $("#other_img").append(img);

        })

    });
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
