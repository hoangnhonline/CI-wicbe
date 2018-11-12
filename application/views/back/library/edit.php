<script>
    function goBack() {
    window.history.back()
}

</script>

<form action="" method="post" enctype="multipart/form-data" id="formNewsDetail">
    <div class="contentcontainer med left">
        <div class="headings altheading">
            <h2>Thêm mới</h2>
        </div>
        <div class="contentbox">
            <p  style="float: right">
                <?php $this->load->view("back/inc/menu_lang") ?>
            </p>
            <!-- -------------------Theo ngon ngu------------------------------- -->
            <?php foreach ($this->M_artice->show_list_lang() as $lang) { ?>

                <?php $row = $this->M_images->check_name_edit(array('video_library.id'=>$id,'country.id'=>$lang->id))  ?>
                <p class="div_lang <?php echo $lang->name ?>" >
                    <label for="textfield"><strong>Tiêu đề<img  src="<?php echo $lang->name . '.png' ?>"/></strong></label>
                    <input name="name_<?php echo $lang->name ?>" value="<?=$row->name?>" type="text" id="textfield" class="inputbox">
                    <?php echo form_error('name_' . $lang->name); ?>
                </p>



<?php } ?>
            <p class="<?php if($type==2){echo "nga";}?>">
                <label for="textfield"><strong>Link</strong></label>
                <input name="link"  type="text" id="textfield" class="inputbox" value="<?=$row->link?>">
            </p>
                <p >
                    <label for="textfield"><strong>Thứ tự</strong></label>
                    <input name="weight" value="<?=$row->weight?>"  type="text" id="textfield" class="inputbox">
                </p>
            <input type="submit" class="btn check_cat" value="Cập nhật" name="ok" />
        </div>   

    </div>
    
    <div class="contentcontainer sml right <?php if($type==3){echo "nga";}?>">
        <div class="headings altheading">
            <h2 class="left">Trạng Thái</h2>
        </div>
        <div class="contentbox">
            <p style="width:40%; float: left">
                <label for="smallbox"><strong>Trạng thái: </strong></label>
                <input type="radio" value="1" name="status"  <?php if($row->status==1) {?> checked="checked" <?php }?>>Hiển thị
                <input type="radio" value="0" name="status" <?php if($row->status==0) {?> checked="checked" <?php }?>>Ẩn
            </p>
            <p style="width:40%; float: left;">
                <label for="smallbox"><strong>Nổi bật : </strong>: </strong></label>
                <input type="radio" value="1" name="hot" <?php if($row->hot==1) {?> checked="checked" <?php }?>>Có
                <input type="radio" value="0" name="hot" <?php if($row->hot==0) {?> checked="checked" <?php }?>>Không
            </p>
            <div style="clear: both"></div>

        </div>
    </div>
    <div class="contentcontainer sml right <?php if($type==3){echo "nga";}?>">
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
     
            <div id="add" class="<?php if($type==1){echo "nga";}?>" >	<img src="theme/img/icons/add.png" alt="Add" /> Thêm Ảnh Khác</div>
            <div id="other_img" class="<?php if($type==1){echo "nga";}?>" ></div>
             <DIV style="clear:both; height:10PX"></DIV>
            <?php foreach ($this->M_images->list_img_orther(array('img_video_library.id_video_library'=>$id)) as $row1) { ?>
              <div class="show_img"><img   alt="Color" src="uploads/san-pham/<?php echo isset($row1->thumb_orther) ? $row1->thumb_orther : '' ?>" height="50" width="70" >
                    <a href="back/library/delete_img/<?=$type?>/<?php echo $row->id . "/" . $row1->id_img ?>" class="delete_img" title="Xóa"><img src="theme/img/icons/icon_delete.png" alt="Delete" /></a>
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
<style>
    .nga{display: none !important;}
</style>