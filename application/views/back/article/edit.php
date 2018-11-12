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
            <?php $edit = $this->M_artice->get_article_all(array('article.id'=>$id,'country.name'=>$lang->name)) ?>
            
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
                    <textarea class="textarea" cols="80" id="editor_<?php echo $lang->name ?>" name="editor_<?php echo $lang->name ?>" rows="15"><?php
                        if ($this->input->post('editor_' . $lang->name)) {
                            echo $this->input->post('editor_' . $lang->name);
                        } else {
                            echo 'Updating...';
                        }
                        ?>
                    </textarea>
                    <?php echo form_error('editor_' . $lang->name); ?> </p>


            <?php } ?>
 <input type="submit" class="btn check_cat" value="Thêm mới" name="ok" />
        </div>   
       
    </div>
        <div class="contentcontainer sml right">
	<div class="headings altheading">
		<h2 class="left">Sơ đồ danh mục</h2>
	</div>
	<div class="contentbox">
		<ul class="list">
           
                    <li><input class="check_item" type="radio" value=""><a style="text-decoration: none;"></a></li>
            
		</ul>
	</div>
</div>
<div class="contentcontainer sml right">
	<div class="headings altheading">
		<h2 class="left">Album Ảnh</h2>
                
	</div>
	<div class="contentbox">
            <img src="<?=  base_url($img->thumb)?>"/>
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
