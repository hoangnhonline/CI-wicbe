<script>
    function goBack() {
    window.history.back()
}
</script>
<form action="" method="post" enctype="multipart/form-data">
    <div class="contentcontainer med left">
        <div class="headings altheading">
            <h2>Nội Dung Liên Hệ</h2>
        </div>
        <div class="contentbox">
           
            <!-- -------------------Theo ngon ngu------------------------------- -->
          
                    <p>
                    <label for="textfield"><strong>Tên Liên Hệ </strong></label>
               <input name="name_" value="<?= $row->name?>" type="text" id="textfield" class="inputbox">
                        
                </p>
             
                <p>
                    <label for="textfield"><strong>Email </strong></label>
               <input name="name_" value="<?= $row->email?>" type="text" id="textfield" class="inputbox">
                        
                </p>

                 <p>
                    <label for="textfield"><strong>Số điện thoại </strong></label>
               <input name="name_" value="<?= $row->phone?>" type="text" id="textfield" class="inputbox">
                        
                </p>
                 <p>
                    <label for="textfield"><strong>Địa chỉ </strong></label>
               <input name="name_" value="<?= $row->address?>" type="text" id="textfield" class="inputbox">
                        
                </p>


                <p style="float:left;">
                    <label for="textfield"><strong>Nội Dung</strong></label>
                    <textarea style="width:500px;height: 400px" class="textarea" cols="80" id="editor" name="editor" rows="15"><?=$row->note?></textarea>
                   

                <div style="clear:both"></div>
          
   <input type="button" class="btn check_cat" onclick="goBack()" value="Trở Về" name="ok" />
        </div>   
       
    </div>
     
            </form>

            <!-- --------------------------------------------------------------- --> 
            <!-- --------------------------------------------------------------- --> 
            
          