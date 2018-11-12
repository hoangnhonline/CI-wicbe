<script>
    function goBack() {
        window.history.back()
    }


</script>
<form action="" method="post" enctype="multipart/form-data">
    <div class="contentcontainer med left">
        <div class="headings altheading">
            <h2>Thêm danh mục</h2>
        </div>
        <div class="contentbox">


            <p class="" style="padding-bottom: 0px !important;">
                      <select name="danhmuc" id="danhmuc" class="inputbox"   >
                            <option value="0">---Chọn Danh Mục---</option>
                            <?php foreach ($listdm as $ldm) { ?>
                            <option value="<?=$ldm->id?>" <?php if($row->top == $ldm->id){ ?> selected="selected" <?php } ?>><?=$ldm->name?></option>
                            <?php } ?>
                        </select>
            </p>

                <p >
                    <label for="textfield"><strong>Tiêu Đề</strong></label>
                    <input name="name" value="<?=$row->name?>" type="text" id="textfield" class="inputbox">
                           <?php echo form_error('name'); ?>
                </p>

            <p >
                <label for="textfield"><strong>Title</strong></label>
                <input name="title" value="<?=$row->title?>" type="text" id="textfield" class="inputbox">
            </p>
            <p>
                <label for="textfield"><strong>Keywords: </strong></label>
                <textarea id="" style="height: 100px" name="keywords" class="textarea inputbox" ><?=$row->keywords?></textarea>
            </p>
            <p>
                <label for="textfield"><strong>Description: </strong></label>
                <textarea id="" style="height: 100px" name="description" class="textarea inputbox" ><?=$row->description?></textarea>
            </p>

            <p >
                <label for="textfield"><strong>Thu tu</strong></label>
                <input name="weight" value="<?=$row->weight?>" type="text" id="textfield" class="inputbox">
            </p>
            <p>
                <label for="smallbox"><strong>Trạng thái :  </strong></label>
                <input type="radio" value="1" name="status" <?php if($row->status==1){ ?>  checked="checked" <?php }?>>Hiển thị
                <input type="radio" value="0" name="status" <?php if($row->status==0){ ?>  checked="checked" <?php }?>>Ẩn
            </p>
            <p style="clear: both;width: 100%;float: left"></p>

 <input type="button" class="btn check_cat" value="Quay lại" name="huy" onclick="goBack()" />
 <input type="submit" class="btn check_cat" value="Cập Nhật" name="ok" />

        </div>

    </div>


            </form>


<style>
    .nga{display: none !important;}
</style>