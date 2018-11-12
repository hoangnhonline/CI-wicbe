 <script type="text/javascript" language="javascript"  src="<?= base_url('theme/js/slide_item.js') ?>" ></script>
 
<?php $thumb = $this->M_item->show_thumb($item->id) ?>



           <?php $chek = $this->M_item->other_img($item->id)?>    
    <div class="lay_chitiet_sp">
        
          <div class="top_content_sp">
           
              <div class="list_thumnail">

                  <div class="thumnail_large">
               
                  <img src="<?=  base_url($item->thumb)?>"
                       alt=""
                       title="<?=$item->item_name?>"
                       />
                    <?php if(!empty($chek)){ ?>
                  <?php $i=1; ?>
                  <?php foreach ($chek as $r){?>
                  <img src="uploads/san-pham/<?= $r->thumb ?>" alt="<?=$item->item_name.'_'.$i++?>" width="548"/>
                  <?php } ?>
                        <?php  }?>      
                                </div>
                 
                            <div class="lay_thumnail_small">
                    <div class="control_thum left_thum"></div>
                    <div class="thumnail_mall">
                          <?php if(!empty($chek)){ ?>
                         <?php foreach ($chek as $r){?>
    <a href="javascript:void(0)" class="small_m"><img src="<?=  base_url('uploads/san-pham/'.$r->thumb)?>" alt=""/></a>
                                             <?php } ?>
     <?php } ?>
     <?php if(empty($chek)){ ?>
                      <a href="javascript:void(0)" class="small_m"><img src="<?=  base_url($item->thumb)?>" alt=""/></a>
                       <?php  }?>
                                            </div>
                     
                  <div class="control_thum right_thum"></div>
              </div> 
                            </div>
              

          </div>
             
      </div> 
      
      

    
   
      



       
<script type="text/javascript">
    (function($){


        if($('.thumnail_mall .small_m').length < 4)
        {
            $('.thumnail_mall .small_m').click(function(event)
            {
                $(this).each(function(index,el){
                    src = $(this).children('img').attr('src');
                    $('.thumnail_large img:eq(0)').animate({opacity:0.5},600,function(){$('.thumnail_large img:eq(0)').attr('src',src)});
                    $('.thumnail_large img:eq(0)').animate({opacity:1},600);
                });
            })
        }
        $('.thumnail_mall .small_m').click(function() {
            $('.thumnail_mall').trigger('slideTo', [this, 0] );
        });

        $('.lay_thumnail_small .thumnail_mall').carouFredSel({
            items: {
                minimum: 4,
                start:0
            },
            width:457,
            height:70,
            auto: false,
            next:{
                button:'.lay_thumnail_small .left_thum'
            },
            prev:{
                button:'.lay_thumnail_small .right_thum'
            },
            direction:'left',
            synchronise: ['.list_thumnail .thumnail_large', false, true],
            scroll: {
                // easing: "easeInOutQuad",
                //fx: 'crossfade',
                onBefore: function( data ) {
                   data.items.old.eq(0).removeClass('selected');
                   data.items.visible.eq(0).addClass('selected');
                },

                items:1,
                duration: 1000,
                pauseOnHover: true
            }
        });
        $('.list_thumnail .thumnail_large').carouFredSel({
           // synchronise: ['#antest .thumnail_mall', false, true],
            width: 548,
            height: 350,
            auto: false,
            items: 1,
            //  direction:'left',
            scroll: {
                items:1,
                fx: 'fade',
                duration: 1500
                //fx: 'directscroll'
            }
        });
        /*
        if($('.thumnail_mall .small_m').length < 4)
        {
            $('.thumnail_mall .small_m').each(function(index,el)
            {
                src = $(this).attr('src');
                    $(this).click(function(event){
                        $('.thumnail_large img:eq(0)').animate({opacity:0.5},600,function(){$('.thumnail_large img:eq(0)').attr('src',src)});
                        $('.thumnail_large img:eq(0)').animate({opacity:1},600);
                });
            })
        }
        */
    }(jQuery));

</script>
