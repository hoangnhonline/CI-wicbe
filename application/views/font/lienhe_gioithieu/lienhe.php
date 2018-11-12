
<?php

$CI = &get_instance();
$CI->load->model('Thongtin_web');
$CI->load->model('M_category');
$ft= $CI->Thongtin_web->show_company(1);


?>




<div id="wrapper">
    <div class="wrapper">

        <div class="text_contact">
            <?=$ft->contact?>

        </div>

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.429166885188!2d106.5744623148902!3d10.778405262104265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752d6e64dd4db7%3A0xf705bdba488fc6c3!2zTeG7uSBQaOG6qW0gU29zZW5jbw!5e0!3m2!1svi!2s!4v1530846145913" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>


    </div>
</div>
