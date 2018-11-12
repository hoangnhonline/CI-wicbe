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
                    <label for="textfield"><strong>Tên công ty <img  src="<?php echo $lang->name . '.png' ?>"/></strong></label>
                    <input name="name" value="<?=$row->name?>" type="text" id="textfield" class="inputbox weight">
                        
                </p>
                <p class="div_lang <?php echo $lang->name ?>" >
                    <label for="textfield"><strong>Thông tin liên hệ  <img  src="<?php echo $lang->name . '.png' ?>"/></strong></label>
             <textarea class="textarea" cols="80" id="editor" name="editor" rows="15"><?=$row->wellcome?></textarea>
                    </p>


            <?php } ?>
 <input type="submit" class="btn check_cat" value="Thêm mới" name="ok" />
        </div>   
       
    </div>
   

            </form>

            <!-- --------------------------------------------------------------- --> 
            <!-- --------------------------------------------------------------- --> 
           
            <script type="text/javascript">

        
        CKEDITOR.replace('editor', {height: 350, width: "98%", resize_enabled: true,
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
            <script>
                $(document).ready(function() {

                    $('#idLT').load("<?= base_url() ?>back/news/danhmuc/33");
                    $('#Loai').change(function() {
                        gt = $(this).val();
                        $('#idLT').load("<?= base_url() ?>back/news/danhmuc/" + gt);
                    })


                });
            </script>