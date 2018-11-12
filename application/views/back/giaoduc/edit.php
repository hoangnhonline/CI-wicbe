

<?php
$CI = &get_instance();
$CI->load->model('M_user');
$CI->load->model('M_artice');

?>
<form action="" method="post" enctype="multipart/form-data">
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
            <?php $edit = $this->M_artice->get_list_article_baiviet($type,$id,$lang->name) ?>

                 <p class="div_lang <?php echo $lang->name ?>" >
                    <label for="textfield"><strong>Tiêu Đề <img  src="<?php echo $lang->name . '.png' ?>"/></strong></label>
               <input name="name_<?php echo $lang->name ?>" value="<?= $edit->article_name?>" type="text" id="textfield" class="inputbox">
                           <?php echo form_error('name_' . $lang->name); ?> 
                </p>
                <p class="div_lang <?php echo $lang->name ?>" >
                    <label for="textfield"><strong>Tóm Tắt <img  src="<?php echo $lang->name . '.png' ?>"/></strong></label>
                    <textarea  style="height: 100px" name="sum_<?php echo $lang->name ?>" class="textarea inputbox" ><?= isset($edit->article_summary) ? $edit->article_summary : 'Đang cập nhật...' ?></textarea>
                </p>

                <p class="div_lang <?php echo $lang->name ?>" >
                    <label for="textfield"><strong>Mô tả <img  src="<?php echo $lang->name . '.png' ?>"/></strong></label>
   <textarea class="textarea" cols="80" id="editor_<?php echo $lang->name ?>" name="editor_<?php echo $lang->name ?>" rows="15"><?= isset($edit->article_content) ? $edit->article_content : 'Đang cập nhật...' ?></textarea>
                    <?php echo form_error('editor_' . $lang->name); ?> </p>

 <?php } ?>
           
                 <p>
                <label for="smallbox"><strong>Trạng thái: </strong></label>
                <input type="radio" value="1" name="status" <?php if($edit->article_status==1) {?> checked="checked" <?php }?>>Hiển thị
                <input type="radio" value="0" name="status"<?php if($edit->article_status==0) {?> checked="checked" <?php }?> >Ẩn 
            </p>

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
                    <?php foreach ($this->M_category->list_category_all(array('category.category_top' => 0, 'category.category_type' => 4),'vn') as $row) { ?>

                        <option style="color:#f00" <?php if($this->M_category->count_category($row->id) > 0){ ?> disabled="disable"<?php }?> value="<?=$row->id?>"  <?php if ($this->M_artice->category_nam($id,$row->id) >0) { ?> selected="selected"<?php } ?> ><?=$row->category_name?></option>

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
          
            <?php foreach ($this->M_artice->show_list_lang() as $lang) { ?>
            <?php $edit = $this->M_artice->get_list_article_baiviet($type,$id,$lang->name) ?>
		 <p class="div_lang <?php echo $lang->name ?>" >
                    <label for="textfield"><strong>Keywords <img  src="<?php echo $lang->name . '.png' ?>"/></strong></label>
               <input name="keywords_<?php echo $lang->name ?>" value="<?= $edit->article_keywords?>" type="text" id="textfield" class="inputbox weight">
                </p>
                <p class="div_lang <?php echo $lang->name ?>" >
                    <label for="textfield"><strong>Description <img  src="<?php echo $lang->name . '.png' ?>"/></strong></label>
               <input name="description_<?php echo $lang->name ?>" value="<?= $edit->article_description?>" type="text" id="textfield" class="inputbox weight">
                </p>

                 <?php } ?>


        <p>
            <label for="textfield"><strong>Thứ tự </strong></label>
            <input name="article_views" value="<?=$edit->article_weight?>" type="text" id="textfield" class="inputbox weight">
        </p>
           <p>
               <label for="smallbox"><strong>Nổi bật : </strong></label>
               <input type="radio" value="1" name="article_hot" <?php if($edit->article_hot==1) {?> checked="checked" <?php }?>>Hiển thị
               <input type="radio" value="0" name="article_hot"<?php if($edit->article_hot==0) {?> checked="checked" <?php }?> >Ẩn
           </p>
           
	</div>
</div>
    
<div class="contentcontainer sml right">
	<div class="headings altheading">
		<h2 class="left">Album Ảnh</h2>
                
	</div>
	<div class="contentbox">
           
            <?php $add = $this->M_artice->get_id_imgages($id) ?>
            
            <img src="<?= base_url($add->thumb) ?>" height="60" width="100"/>
		<input type="file" name="img" id="hinh" value="" />(không quá 1MB)
	</div>
</div>
    
            </form>

            <!-- --------------------------------------------------------------- --> 
            <!-- --------------------------------------------------------------- --> 
            
            <script type="text/javascript">
<?php foreach ($this->M_artice->show_list_lang() as $lang) { ?>
                                                    CKEDITOR.replace('editor_<?php echo $lang->name ?>', {height: 350, width: "98%", resize_enabled: true,
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
<script>
    $(document).ready(function(){
        jQuery('#datetimepicker').datetimepicker({
            //  format:'d/m/Y',
            lang:'de',
            i18n:{
                de:{
                    months:[
                        'Januar','Februar','März', 'April',
                        'Mai', 'Juni', 'Juli', 'August',
                        'September', 'Oktober', 'November', 'Dezember',
                    ],
                    dayOfWeek: [
                        "Sun", "Mon", "Tue", "Wed",
                        "Thu", "Fri", "Sat",
                    ]
                }
            },
            timepicker: false,
            format: 'd-m-Y'
        });


        jQuery('#datetimepicker1').datetimepicker({
            //  format:'d/m/Y',
            lang:'de',
            i18n:{
                de:{
                    months:[
                        'Januar','Februar','März', 'April',
                        'Mai', 'Juni', 'Juli', 'August',
                        'September', 'Oktober', 'November', 'Dezember',
                    ],
                    dayOfWeek: [
                        "Sun", "Mon", "Tue", "Wed",
                        "Thu", "Fri", "Sat",
                    ]
                }
            },
            timepicker: false,
            format: 'd-m-Y'
        });

    });
</script>