<?php if(!empty($noibat)) { ?>
<div style="float:left; width:860px; min-height:250px"> <span class="play"></span> <span id="mediaplayer"></span> 
     <?php $add = $this->M_artice->get_id_imgages($noibat->id) ?>
          <script type="text/javascript">
                               jwplayer("mediaplayer").setup({
                               autostart: false,
                               flashplayer: "<?=base_url()?>theme/mediaplayer/player.swf",
                               file: "<?= $noibat->link ?>",
                               image: "<?php echo base_url(). $add->thumb ?>",
							   width: 860,
                               height: 475,
                               backcolor: '#003A7B',
                               frontcolor: 'FFFFFF',
                               controlbar: 'over',
                                "controlbar.idlehide": true,
                              });
                             </script>
          <div style="clear:both; height:5px"></div>
          <div id="name_video" style="color:#000; font-weight:bold; width:530px; float:left">
            <?= $noibat->article_name?>
          </div>
          <div style="color:#000; font-weight:bold; width:321px; float:left">
          
          </div>
        </div>
<?php } ?>



   <div style="clear:both; height:50px">
        <div style="width:100%; float:left; margin-top:50px; margin-bottom:50px;">
        <div style="float:left; font-size:17px; font-weight:bold; border-bottom:#32ADF1 solid 2px; width:100%">Videos khác</div>
        <div style="clear:both; height:20px"></div>
          <?php $i = 1;
                 if(!empty($list)){
                 foreach($list as $r){ ?>
        <?php $thum = $this->M_artice->get_id_imgages($r->id) ?>
          <div title="<?= $r->article_name ?>" id="<?= $r->id?>" class="video_middle<?php if($i%2==0){ echo ' end-margin';} ?>" style="width:214px; margin-right:21px; float:left; position:relative"> <a href="#" onclick="jwplayer().load('<?= $r->link;?>');return false;" >
            <div class="bg_video_small"></div>
            </a> <a href="#" onclick="jwplayer().load('<?= $r->link;?>');return false;" > <img src="<?=base_url()?>timthumb.php?src=<?php echo base_url($thum->thumb)?>&h=128&w=214&zc=1" alt="video"/></a> <a href="#" onclick="jwplayer().load('<?= $r->link;?>');return false;" ><span class="play small"></span></a></a>
            <div style="width: 220px; text-align:center" >
              <?= $r->article_name ?>
            </div>
          </div>
          <?php if($i%5 == 0){?>
          <div style="clear:both; height:10px"></div>
          <?php }?>
          <?php $i++; }} ?>
        </div>
        <div style="clear:both; height:10px">
          <div class="navigation" style="margin-left:0px; text-align:center">
            <div style="display:inline">
              <center>
                <?php echo $link;?>
              </center>
            </div>
          </div>
           <div style="clear:both; height:50px">
        </div>
      </div>
    </div>

<script type="text/javascript">
    $(document).ready(function(){

        $('#list_scrool_f').niceScroll({

            cursorwidth :"10px",
            cursorborder :"1px solid #c5c9cf",
            cursorborderradius :"5px",
            cursoropacitymin:1,
            //touchbehavior:true,
            // smoothscroll:false,
            //   directionlockdeadzone:20,
            bouncescroll:true,
            enabletranslate3d:false
        });
////////////////////////////////////////////////////////////
         $(".video_middle, .video_middle_hot").live("click",function(){
			alert('áaaaa');
           var video_id =  $(this).attr('id');
           $.ajax({
               type: "POST",
               url: "<?=  site_url('font/video/get_video')?>",
               data: "video_id="+video_id,
               cache: false,
               dataType:'html',
               beforeSend: function(data){
                     
               },
               success: function(data){
             	   var php = data.split("||"); 
                   $("#name_video").empty();
                     $("#name_video").html(php[0]).show('slow').fadeIn().fadeOut().fadeIn();   

                  return false;
               }
            }); 
           
        });

    });
</script> 