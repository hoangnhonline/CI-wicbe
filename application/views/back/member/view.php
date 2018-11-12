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
            <h2>Thông tin thành viên</h2>
        </div>
        <div class="contentbox">
         
            <!-- -------------------Theo ngon ngu------------------------------- -->

                <p>
                    <label for="textfield"><strong>Họ Tên</strong></label>
                    <input name="" type="text" value="<?=$row->name?>" id="textfield" class="inputbox">

                </p>
                <p" >
                    <label for="textfield"><strong>Email</strong></label>
                    <input name="" type="text" value="<?=$row->email?>" id="textfield" class="inputbox">

                </p>
                <p>
                    <label for="textfield"><strong>Address</strong></label>
                    <input name="" type="text" value="<?=$row->address?>" id="textfield" class="inputbox">

                </p>
            <p>
                <label for="textfield"><strong>Phone</strong></label>
                <input name="" type="text" value="<?=$row->mobile?>" id="textfield" class="inputbox">

            </p>
            <input type="button" class="btn check_cat" onclick="goBack()" value="Trở Về" name="ok" />


            <input style="display: none" type="submit" class="btn check_cat" value="Thêm mới" name="ok" />
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