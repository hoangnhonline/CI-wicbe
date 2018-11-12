<script>
    function goBack() {
    window.history.back()
}

$(document).ready(function(){
    $('#formNewsDetail').submit(function(){
        if($('#TieuDe').val()==''){alert ('Chưa nhập Tiêu Đề'); return false;}
        
    });
    $('#TieuDe').blur(function(){
		var td=$('#TieuDe').val();
		$('#Description').val(td);
	})
});

</script>

<form action="" method="post" enctype="multipart/form-data" id="formNewsDetail">
    <div class="contentcontainer med left">
        <div class="headings altheading">
            <h2>Thêm danh mục</h2>
        </div>
        <div class="contentbox">   

            <!-- -------------------Theo ngon ngu------------------------------- -->
            <p class="" style="padding-bottom: 0px !important;"    >
                <select name="danhmuc" id="danhmuc" class="inputbox" style="">
                            <option value="0">---Chọn Danh Mục---</option>
                            <?php foreach ($listdm as $dm){ ?>
                            <option value="<?=$dm->id?>"><?=$dm->name?></option>
                            <?php } ?>
                        </select>
            </p>


                <p >
                    <label for="textfield"><strong>Tiêu Đề</strong></label>
                    <input name="name" type="text" id="textfield" class="inputbox">
                           <?php echo form_error('name'); ?>
                </p>
            <p>
                <label for="textfield"><strong>Title</strong></label>
                <input name="title" type="text" id="textfield" class="inputbox">
            </p>
            <p>
                <label for="textfield"><strong>keywords: </strong></label>
                <textarea id="" style="height: 100px" name="keywords" class="textarea inputbox" ></textarea>
            </p>
            <p>
                <label for="textfield"><strong>Description: </strong></label>
                <textarea id="" style="height: 100px" name="description" class="textarea inputbox" ></textarea>
            </p>
                

                <p class="danhmuc_admin2">
                    <label for="textfield"><strong>Thứ tự</strong></label>
                    <input name="weight" value="" type="text" id="textfield" class="inputbox">

                </p>
            <p style="display: none">
                <label for="smallbox"><strong>Nổi bật :  </strong></label>
                <input type="radio" value="1" name="hot" >Có
                <input type="radio" value="0" name="hot" checked="checked" >Không
            </p>

            <p>
                <label for="smallbox"><strong>Trạng thái :  </strong></label>
                <input type="radio" value="1" name="status"   checked="checked">Hiển thị
                <input type="radio" value="0" name="status" >Ẩn
            </p>


 <input type="submit" class="btn check_cat" value="Thêm mới" name="ok" />
        </div>   
       
    </div>

    
            </form>

<style>
    .nga{display: none !important;}
</style>