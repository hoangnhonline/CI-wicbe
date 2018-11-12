<form action="" method="post" enctype="multipart/form-data">
    <div class="contentcontainer med left">
        <div class="headings altheading">
            <h2>Cập nhật thông tin website</h2>
        </div>
        <div class="contentbox">

            <!-- -------------------Theo ngon ngu------------------------------- -->

                <p>
                    <label for="textfield"><strong>Title: </strong></label>
                    <input name="name" value="<?=$row->name?>" type="text" id="textfield" class="inputbox">

                </p>
                <p>
                    <label for="textfield"><strong>Description: </strong></label>
                    <textarea id="" style="height: 100px" name="description" class="textarea inputbox" ><?=$row->description?></textarea>
                </p>

                <p>
                    <label for="textfield"><strong>Keywords: </strong></label>
                    <textarea id="" style="height: 100px" name="keywords" class="textarea inputbox" ><?=$row->keywords?></textarea>
                </p>
            <p>
                <label for="textfield"><strong>Google analytic : </strong></label>
                <textarea id="" style="height: 100px" name="analytic" class="textarea inputbox" ><?=$row->analytic?></textarea>
            </p>

                   <p>
                    <label for="textfield"><strong>Thông tin liên hệ </strong></label>
                    <textarea class="textarea" cols="80" id="contact" name="contact" rows="15"><?=$row->contact?></textarea>
                   </p>
                   
                 <p>
                    <label for="textfield"><strong>Thông tin dưới footer  </strong></label>
                        <textarea class="textarea" cols="80" id="footer" name="footer" rows="15"><?=$row->footer?></textarea>
                   </p>


 <input type="submit" class="btn check_cat" value="Cập nhật" name="ok" />
        </div>
       
    </div>
   
<div class="contentcontainer sml right">
	<div class="headings altheading">
		<h2 class="left">Logo công ty </h2>
                
	</div>
	<div class="contentbox">
            <img src="<?=$row->logo?>" width="150"></br>
        <input type="file" name="img" id="hinh" value="" />(không quá 1MB)
	</div>
</div>
    <div class="contentcontainer sml right">
	<div class="headings altheading">
		<h2 class="left">Mạng Xã Hội</h2>
                
	</div>
	<div class="contentbox">
            <p>
                    <label for="textfield"><strong>Facebook : </strong></label>
                    <input name="facebook" value="<?=$row->face?>" type="text" id="textfield" class="inputbox weight">
            </p>

           <p >
               <label for="textfield"><strong>Youtube :</strong></label>
               <input name="youtube" value="<?=$row->youtube?>" type="text" id="textfield" class="inputbox weight">
           </p>

        <p>
            <label for="textfield"><strong>Twitter : </strong></label>
            <input name="twitter" value="<?=$row->twitter?>" type="text" id="textfield" class="inputbox weight">
        </p>

        <p >
            <label for="textfield"><strong>G+ :</strong></label>
            <input name="gg" value="<?=$row->gg?>" type="text" id="textfield" class="inputbox weight">
        </p>


        <p>
                <label for="textfield"><strong>Địa chỉ : </strong></label>
               <input name="address" value="<?=$row->address?>" type="text" id="textfield" class="inputbox weight">

            </p>



        <p>
            <label for="textfield"><strong>Phone :  </strong></label>
            <input name="phone" value="<?=$row->phone?>" type="text" id="textfield" class="inputbox weight">
        </p>



	</div>
</div>
   
            </form>
<style>
    .nga{display: none !important;}
</style>
            <!-- --------------------------------------------------------------- --> 
            <!-- --------------------------------------------------------------- --> 
           
            <script type="text/javascript">

    
     CKEDITOR.replace('footer', {height: 350, width: "98%", resize_enabled: true,
     filebrowserBrowseUrl: '<?php echo base_url() ?>editor/find/ckfinder.html',
       filebrowserImageBrowseUrl: '<?php echo base_url() ?>editor/find/ckfinder.html',
       filebrowserUploadUrl: '<?php echo base_url() ?>editor/find/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl: '<?php echo base_url() ?>editor/find/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                                    });
      CKEDITOR.replace('contact', {height: 350, width: "98%", resize_enabled: true,
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


<style>
    .nga{display: none !important;}
</style>