 <?php 
 $CI=&get_instance();
 $CI->load->model('M_item');
 $tn = $CI->M_item->item_color($item->id)
 ?>

<div class="tinhnang_oder">
    <?php if(!empty($tn)) { ?>
    <div class="tinhnang">
        <?php foreach ($tn as $t) { ?>
        <img src="<?=$t->thumb?>" width="85" height="52">
        <?php }?>
    </div>
    <?php }?>
    <div class="oder"><a href="#inline2"  class="myButton" id="tk" onclick="return false"><?= $l->lang_dathang[$lang]?></a></div>
        <?php $this->load->view("font/sanpham/login") ?>
        </div>
   <script type="text/javascript">

    $(document).ready(function() {
    $(".category").click(function() {
    $(this).find(".id_cate").attr("checked", "checked");
    var name = $(this).attr("data");
    $("#name_cate").html(name);
    })
    $("#icon_cart").fancybox();
    $("#btn-send-email").click(function() {
    var email = $("#input-email").val();
    if (IsEmail(email) == false) {
    $("#input-email").val("");
    $("#input-email").attr("placeholder", "Email không chính xác");
    } else {
    $.post("save-email-sale", {email: email}, function(dt) {
    $("#input-email").val("");
    $("#input-email").attr("placeholder", dt);
    })
    }
    })
    })
    function CheckLogin(url) {
    var id = $("#user_id").val();
    if (id == 0)
    alert("Bạn vui lòng đăng nhập để thực hiện chức năng này");
    else {
    window.location.href = url;
    }
    }
</script>
