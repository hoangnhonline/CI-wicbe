<?php
$CI = &get_instance();
$CI->load->model('M_user')

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
           
             
                <p class="div_lang <?php echo $lang->name ?>" >
                    <label for="textfield"><strong>Tiêu Đề <img  src="<?php echo $lang->name . '.png' ?>"/></strong></label>
               <input name="name_<?php echo $lang->name ?>" value="<?=$this->input->post('name_' . $lang->name)?>" type="text" id="textfield" class="inputbox">
                           <?php echo form_error('name_' . $lang->name); ?> 
                </p>
               

                <p class="div_lang <?php echo $lang->name ?>" >
                    <label for="textfield"><strong>Tóm Tắt <img  src="<?php echo $lang->name . '.png' ?>"/></strong></label>
                    <textarea  style="height: 100px" name="sum_<?php echo $lang->name ?>" class="textarea inputbox" ></textarea>
                </p>

                <p class="div_lang <?php echo $lang->name ?>" >
                    <label for="textfield"><strong>Mô tả <img  src="<?php echo $lang->name . '.png' ?>"/></strong></label>
            <textarea class="textarea" cols="80" id="editor_<?php echo $lang->name ?>" name="editor_<?php echo $lang->name ?>" rows="15"><?php
                        if ($this->input->post('editor_' . $lang->name)) {
                            echo $this->input->post('editor_' . $lang->name);
                        } else {
                            echo 'Updating...';
                        }
                        ?>
                    </textarea>
                    


            
                      <?php } ?>
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
            <h2 class="left">Danh mục</h2>
        </div>
        <div class="contentbox">
            <p>
                <select name="check_category" id="check_category" style="width:350px;height: 35px">
                    <option value="">Chọn danh mục</option>
                    <?php foreach ($this->M_category->list_category_all(array('category.category_top' => 0, 'category.category_type' => 3),'vn') as $row) { ?>

                        <option style="color:#f00" <?php if($this->M_category->count_category($row->id) > 0){ ?> disabled="disable"<?php }?> value="<?=$row->id?>"><?=$row->category_name?></option>
                        <?php foreach ($this->M_category->list_category_chill($row->id,'vn') as $dmcon) { ?>
                            <option value="<?=$dmcon->id?>">|--<?=$dmcon->category_name?></option>
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
            <?php foreach ($this->M_artice->show_list_lang() as $lang) { ?>
           
		 <p class="div_lang <?php echo $lang->name ?>" >
                    <label for="textfield"><strong>Keywords <img  src="<?php echo $lang->name . '.png' ?>"/></strong></label>
               <input name="keywords_<?php echo $lang->name ?>" value="" type="text" id="textfield" class="inputbox weight">
                          
                </p>
                <p class="div_lang <?php echo $lang->name ?>" >
                    <label for="textfield"><strong>Description <img  src="<?php echo $lang->name . '.png' ?>"/></strong></label>
               <input name="description_<?php echo $lang->name ?>" value="" type="text" id="textfield" class="inputbox weight">
                </p>
            <?php }?>


        <p>
            <label for="textfield"><strong>Thứ tự </strong></label>
            <input name="article_weight" value="" type="text" id="textfield" class="inputbox weight">
        </p>
           <p>
               <label for="smallbox"><strong>Nổi bật : </strong></label>
               <input type="radio" value="1" name="hot">Hiển thị
               <input type="radio" value="0" name="hot" checked="checked">Ẩn
           </p>
	</div>
</div>
    <div class="contentcontainer sml right">
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
            
        </div>  </div>

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
