<script>
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
            <p  style="float: right">
                <?php $this->load->view("back/inc/menu_lang") ?>
            </p>
            <!-- -------------------Theo ngon ngu------------------------------- -->
            <p style="display: none">
                    <label for="textfield"><strong>Mã sản phẩm</strong></label>
                    <input name="code" value="<?=$code?>"  type="text" id="textfield" class="inputbox">
               
                </p>
             
            <?php foreach ($this->M_artice->show_list_lang() as $lang) { ?>
                <p class="div_lang <?php echo $lang->name ?>" >
                    <label for="textfield"><strong>Tiêu Đề <img  src="<?php echo $lang->name . '.png' ?>"/></strong></label>
                    <input name="name_<?php echo $lang->name ?>" value="<?=$this->input->post('name_' . $lang->name)?>" type="text" id="textfield" class="inputbox">
                 <?php echo form_error('name_' . $lang->name); ?> 
                </p>
                <p class="div_lang <?php echo $lang->name ?>">
                    <label for="textfield"><strong>Chất liệu <img src="<?php echo $lang->name . '.png' ?>"/></strong></label>
                    <input name="item_chatlieu_<?php echo $lang->name ?>" value="" type="text" id="textfield" class="inputbox">
                </p>

                <p class="div_lang <?php echo $lang->name ?>">
                    <label for="textfield"><strong>Kích thước <img src="<?php echo $lang->name . '.png' ?>"/></strong></label>
                    <input name="item_kichthuoc_<?php echo $lang->name ?>" value="" type="text" id="textfield" class="inputbox">
                </p>


                <p class="div_lang <?php echo $lang->name ?>" >
                    <label for="textfield"><strong>Tóm Tắt <img  src="<?php echo $lang->name . '.png' ?>"/></strong></label>
                    <textarea class="textarea" cols="80" id="summary_<?=$lang->name ?>" name="summary_<?=$lang->name ?>" rows="15"><?php
                        if ($this->input->post('summary_' . $lang->name)){ echo $this->input->post('summary_' . $lang->name);} else {echo 'Updating...';} ?></textarea>
                </p>

                <p class="div_lang <?php echo $lang->name ?>" >
                    <label for="textfield"><strong>Chi tiết <img  src="<?php echo $lang->name . '.png' ?>"/></strong></label>
                    <textarea class="textarea" cols="80" id="content_<?=$lang->name ?>" name="content_<?=$lang->name ?>" rows="15"><?php
                        if ($this->input->post('content_' . $lang->name)) {echo $this->input->post('content_' . $lang->name); } else { echo 'Updating...';} ?></textarea>
                  </p>

<?php } ?>
            <input type="submit" class="btn check_cat" value="Thêm mới" name="ok" />
        </div>   

    </div>


    <div class="contentcontainer sml right">
        <div class="headings altheading">
            <h2 class="left">Danh mục</h2>
        </div>
        <div class="contentbox">

            <p>
                <select name="check_category" id="check_category" style="width:350px;height: 35px">
                    <option value="">Chọn danh mục</option>
                    <?php foreach ($this->M_category->list_category_all(array('category.category_top' => 0, 'category.category_type' => 1),'vn') as $row) { ?>

                        <option style="color: #f00"  value="<?=$row->id?>"><?=$row->category_name?></option>
                    <?php foreach ($this->M_category->list_category_chill($row->id,'vn') as $dmcon) { ?>
                            <option style=""  value="<?=$dmcon->id?>">|-- <?=$dmcon->category_name?></option>
                        <?php }?>
                    <?php }?>
                </select>
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
                    <label for="textfield"><strong>Thứ tự</strong></label>
                    <input name="item_weight"  type="text" id="textfield" value="<?=$weight?>" class="inputbox weight">
                 </p>
               
                 <p>
                    <label for="textfield"><strong>Giá gốc</strong></label>
                    <input name="item_price"  type="text" id="textfield" class="inputbox weight">
                 </p>
            <p style="display: none">
                <label for="textfield"><strong>Giá khuyến mãi</strong></label>
                <input name="item_price_sale"  type="text" id="textfield" class="inputbox weight">
            </p>
               
            <div style="clear: both"></div>

        </div>


        <div class="contentbox">
            <p>
                <label for="smallbox"><strong>Hình đại diện</strong></label>
                <input type="radio" value="local" name="chose_img" id="radio_local" checked>Local
               
            <div style="clear: both"></div>

            <span id="imsssg"> 
                <input id="hinhanh" type="file" name="img">
                <img alt="Loading" src="theme/img/loading.gif">
                Uploading... 
            </span>
            
         
<?php echo form_error('img'); ?>
            <br>
            <span class="smltxt">(Hình mới sẽ đựoc up sau khi thêm mới)</span>

           
            <hr />
            <div id="add" style="display: none" >	<img src="theme/img/icons/add.png" alt="Add" /> Thêm Ảnh Khác</div>
            <div id="other_img" style="display: none"></div>
        </div>
    </div>
</form>
<style>
    .nga{display: none !important;}
</style>
<!-- --------------------------------------------------------------- --> 
<!-- --------------------------------------------------------------- --> 

<script type="text/javascript">
<?php foreach ($this->M_artice->show_list_lang() as $lang) { ?>
CKEDITOR.replace('summary_<?php echo $lang->name ?>', {height: 350, width: "98%", resize_enabled: true,
    filebrowserBrowseUrl: '<?php echo base_url() ?>editor/find/ckfinder.html',
    filebrowserImageBrowseUrl: '<?php echo base_url() ?>editor/find/ckfinder.html',
    filebrowserUploadUrl: '<?php echo base_url() ?>editor/find/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: '<?php echo base_url() ?>editor/find/core/connector/php/connector.php?command=QuickUpload&type=Images',
});

CKEDITOR.replace('content_<?php echo $lang->name ?>', {height: 350, width: "98%", resize_enabled: true,
    filebrowserBrowseUrl: '<?php echo base_url() ?>editor/find/ckfinder.html',
    filebrowserImageBrowseUrl: '<?php echo base_url() ?>editor/find/ckfinder.html',
    filebrowserUploadUrl: '<?php echo base_url() ?>editor/find/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: '<?php echo base_url() ?>editor/find/core/connector/php/connector.php?command=QuickUpload&type=Images',
});


<?php } ?>

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
<script>
    $(document).ready(function() {

        $('#idLT').load("<?= base_url() ?>back/news/danhmuc/33");
        $('#Loai').change(function() {
            gt = $(this).val();
            $('#idLT').load("<?= base_url() ?>back/news/danhmuc/" + gt);
        })


    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#add").click(function() {
            var img = '<div class="div_img"><input  type="file" name="img_other[]"/></div>';
            $("#other_img").append(img);

        })

    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#sever").hide();
        $("#url").hide();
        $("#radio_local").click(function() {
            $("#local").fadeIn("slow");
            $("#sever").fadeOut("slow");
            $("#url").fadeOut("slow");
        });
        $("#radio_sever").click(function() {
            $("#local").fadeOut("slow");
            $("#url").fadeOut("slow");
            $("#sever").fadeIn("slow");
        });
        $("#radio_url").click(function() {
            $("#local").fadeOut("slow");
            $("#sever").fadeOut("slow");
            $("#url").fadeIn("slow");
        });
    });
</script>
