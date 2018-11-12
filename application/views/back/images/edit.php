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
            <?php $row = $this->M_images->get_img($id,$album_parent,$lang->id)  ?>
                <p class="div_lang <?php echo $lang->name ?>" >
                    <label for="textfield"><strong>Tiêu Đề <img  src="<?php echo $lang->name . '.png' ?>"/></strong></label>
                    <input name="name_<?php echo $lang->name ?>" value="<?=$row->images_name?>" type="text" id="textfield" class="inputbox">
                </p>

      

<?php } ?>
            <p >
                <label for="textfield"><strong>link</strong></label>
                <input name="link"  type="text" id="textfield" class="inputbox" value="<?=$row->link?>">
            </p>
                <p >
                    <label for="textfield"><strong>Thứ tự</strong></label>
                    <input name="weight" value="<?=$row->weight?>"  type="text" id="textfield" class="inputbox">
                </p>
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
                <input type="radio" value="1" name="status" checked>Hiển thị
                <input type="radio" value="0" name="status">Ẩn 
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
                <label for="smallbox"><strong>Hình đại diện</strong></label>
                <input type="radio" value="local" name="img" id="radio_local" checked>Local
               
            <div style="clear: both"></div>
            <img src="<?=  base_url($row->thumb)?>" height="50" width="50"/></br>
            <span id="imsssg"> 
                <input id="hinhanh" type="file" name="img">
                <img alt="Loading" src="theme/img/loading.gif">
                Uploading... 
            </span>
            <br>
            <span class="smltxt">(Hình mới sẽ đựoc up sau khi thêm mới)</span>

           
            <hr />
     
            <div id="add" >	<img src="theme/img/icons/add.png" alt="Add" /> Thêm Ảnh Khác</div>
            <div id="other_img" ></div>
             <DIV style="clear:both; height:10PX"></DIV>
            <?php foreach ($this->M_images->get_id_img($row->id) as $row1) { ?>
              <div class="show_img"><img   alt="Color" src="uploads/san-pham/<?php echo isset($row1->thumb) ? $row1->thumb : '' ?>" height="50" width="70" >
                    <a href="back/images/delete_img/<?=$album_parent?>/<?php echo $row->id . "/" . $row1->id ?>" class="delete_img" title="Xóa"><img src="theme/img/icons/icon_delete.png" alt="Delete" /></a>
                </div>	
            <?php } ?>
            <DIV style="clear:both; height:10PX"></DIV>
        </div>
    </div>
</form>

<!-- --------------------------------------------------------------- --> 
<!-- --------------------------------------------------------------- --> 


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