<script>
    function goBack() {
    window.history.back()
}

   
</script>

<form action="" method="post" enctype="multipart/form-data" id="formNewsDetail">
    <div class="contentcontainer med left">
        <div class="headings altheading">
            <h2>Thêm mới bài viết</h2>
        </div>
        <div class="contentbox">
            <p  style="float: right">
                <?php $this->load->view("back/inc/menu_lang") ?>
            </p>
            <!-- -------------------Theo ngon ngu------------------------------- -->
            <?php foreach ($this->M_artice->show_list_lang() as $lang) { ?>
             <?php $edit = $this->M_artice->get_list_article_baiviet(4,$id,$lang->name) ?>
                <p class="div_lang <?php echo $lang->name ?>" >
                    <label for="textfield"><strong>Tiêu Đề <img  src="<?php echo $lang->name . '.png' ?>"/></strong></label>
                    <input name="name_<?php echo $lang->name ?>"  value="<?=$edit->article_name?>" type="text" id="textfield" class="inputbox">
                

                    <p class="div_lang <?php echo $lang->name ?>">
                    <label for="textfield"><strong>Link Youtube <img  src="<?php echo $lang->name . '.png' ?>"/></strong></label>
                    <input name="link_<?=$lang->name?>"  type="text" id="textfield" value="<?=$edit->link?>" class="inputbox weight">
                 </p>
                 <?php } ?>
                    <p>
                    <label for="textfield"><strong>Thứ tự (Thứ tự càng lớn độ ưu tiên càng cao)</strong></label>
                    <input name="article_weight"  type="text" id="textfield" value="<?=$edit->article_weight?>" class="inputbox weight">
                 </p>
                         <div style="clear: both"></div>

            <input type="submit" class="btn check_cat" value="Thêm mới" name="ok" />
        </div>   

    </div>
    
    <div class="contentcontainer sml right">
        <div class="headings altheading">
            <h2 class="left">Trạng Thái</h2>
        </div>
        <div class="contentbox">
            <p style="width:40%; float: left">
                <label for="smallbox"><strong>Trạng thái: </strong></label>
                <input type="radio" value="1" name="status" <?php if($edit->article_status==1){?> checked="checked" <?php }?>>Hiển thị
                <input type="radio" value="0" name="status" <?php if($edit->article_status==0){?> checked="checked" <?php }?>>Ẩn 
            </p>
          
          
            <p style="clear:both"></p>

        </div>
    </div>
    <div class="contentcontainer sml right">
        <div class="headings altheading">
            <h2 class="left">Album Ảnh</h2>

        </div>
        <div class="contentbox">
            <p>
                <label for="smallbox"><strong>Hình đại diện</strong></label>
                <input type="radio" value="local" name="chose_img" id="radio_local" checked>Local
               
            <div style="clear: both"></div>

            <span id="imsssg"> 
                <?php $add = $this->M_artice->get_id_imgages($id) ?>
            
            <img src="<?= base_url($add->thumb) ?>" height="60" width="100"/>
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

<!-- --------------------------------------------------------------- --> 
<!-- --------------------------------------------------------------- --> 

<script type="text/javascript">
<?php foreach ($this->M_artice->show_list_lang() as $lang) { ?>
        CKEDITOR.replace('item_content_<?php echo $lang->name ?>', {height: 350, width: "98%", resize_enabled: true,
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