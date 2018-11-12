<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;language=vi"></script>
<script type="text/javascript" src="<?= base_url('theme/js/js.js') ?>"></script>









<input value="10.76167,106.68970" type="hidden" id="LangLoc">











<div id="id_map_1">
    <div class="id_map_1">
        <div id="map-canvas" style="width:100%; height:390px; padding:0px; margin:0px"></div>

        <div class="location_map_1">
            <div class="name_contact_1">
                <p><?php if($lang=='vn'){echo 'Liên hệ';}else{echo 'Contact';} ?></p>
                <i class="icon_lh"></i>
            </div>
            <div class="name_contact_2">258A Trần Hưng Đạo, P.Nguyễn Cư Trinh, Q.1, TP.HCM</div>

            <div class="name_contact_3">(028) 39200215</br>
                (028) 39200183</div>
            <div class="name_contact_4"> tttb.spccc@tphcm.gov.vn</br>
                phongkinhdoanh410@gmail.com</div>


        </div>
    </div>
</div>












<script>
   $(document).ready(function(){
      initialize();
       codeLatLng('<?php echo base_url()?>theme/images/icon_loacation.png','258A Trần Hưng Đạo, P.Nguyễn Cư Trinh, Q.1, TP.HCM');
    });


</script>
