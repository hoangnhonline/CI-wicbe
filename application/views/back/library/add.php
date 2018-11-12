<script>
    function goBack() {
    window.history.back()
}
$(document).ready(function(){
    $('#formNewsDetail').submit(function(){
     //   if($('#hinhanh').val()==''){alert ('Chưa nhập hình'); return false;}
        
    });
    });
</script>

<form action="" method="post" enctype="multipart/form-data" id="formNewsDetail">
    <div class="contentcontainer med left">
        <div class="headings altheading">
            <h2><?php if($type==2){echo "Thêm mới";}else{echo "Thêm mới hình ảnh";}?></h2>
        </div>
        <div class="contentbox">
            <p  style="float: right">
                <?php $this->load->view("back/inc/menu_lang") ?>
            </p>
            <!-- -------------------Theo ngon ngu------------------------------- -->
            <?php foreach ($this->M_artice->show_list_lang() as $lang) { ?>
                <p class="div_lang <?php echo $lang->name ?>" >
                    <label for="textfield"><strong><?php if($type==3){echo "Tên ngân hàng";}else{echo "Tiêu đề";}?> <img  src="<?php echo $lang->name . '.png' ?>"/></strong></label>
                    <input name="name_<?php echo $lang->name ?>" onblur="if (this.value == '')
                                    this.value = 'Updating...';" onfocus="if (this.value == 'Updating...')
                                                this.value = '';" value="<?php
                           if ($this->input->post('name_' . $lang->name)) {
                               echo $this->input->post('name_' . $lang->name);
                           } else {
                               echo 'Updating...';
                           }
                           ?>" type="text" id="textfield" class="inputbox">
                 <?php echo form_error('name_' . $lang->name); ?> 
                </p>

<?php } ?>
            <p  class="<?php if($type==2){echo "nga";}?>">
                <label for="textfield"><strong>Link</strong></label>
                <input name="link"  type="text" id="textfield" class="inputbox">
            </p>
                <p >
                    <label for="textfield"><strong>Thứ tự</strong></label>
                    <input name="weight"  type="text" id="textfield" class="inputbox">
                </p>

            <input type="submit" class="btn check_cat" value="Thêm mới" name="ok" />
        </div>   

    </div>
    
    <div class="contentcontainer sml right <?php if($type==3){echo "nga";}?>">
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
                <label for="smallbox"><strong>Nổi bật : </strong>: </strong></label>
                <input type="radio" value="1" name="hot">Có
                <input type="radio" value="0" name="hot" checked>Không
            </p>
            
            <div style="clear: both"></div>

        </div>
    </div>
    <div class="contentcontainer sml right  <?php if($type==3){echo "nga";}?>">
        <div class="headings altheading">
            <h2 class="left">Album Ảnh</h2>

        </div>
        <div class="contentbox">
            <p>
                <label for="smallbox"><strong>Hình đại diện</strong></label>
                <input type="radio" value="local" name="img" id="radio_local" checked>Local
               
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
     
            <div id="add" class="<?php if($type==1){echo "nga";}?>">	<img src="theme/img/icons/add.png" alt="Add" /> Thêm Ảnh Khác</div>
            <div id="other_img" class="<?php if($type==1){echo "nga";}?>"></div>
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