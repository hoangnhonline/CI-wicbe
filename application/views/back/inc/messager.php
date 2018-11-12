<div class="messages" id="message-fadeout">
    <?php
    switch ( mb_strtolower( $type_messager ) )
    {
        /*
         * THAO TAC THANH CONG
         */
        case 'success' : echo '
				 <!-- Red Status Bar Start -->
        <div class="status success">
        	<p><span>Success!</span> Thao tác thành công.</p>
        </div>
        <!-- Red Status Bar End -->
			';
            break;
        /*
         * THAO TAC THAT BAI
         */
        case 'error' : echo '
				<div class="status error">
        	<p><span>Error!</span> Thao tác thất bại.</p>
        </div>
			';
            break;
        /*
         * CANH BAO
         */
        case 'warning' : echo '
				<div class="status warning">
					<p>
						<img alt="Warning" src="theme_admin/img/icons/icon_warning.png">
						<span>Warning!</span>
						Không thể thao tác với dữ liệu này.
					</p>
				</div>
			';
            break;

        /*
         * CANH BAO
         */
        case 'information' :
            if(isset($id) && $id!=NULL){
                $art=array();
                if($type=='article')
                    $art=$this->m_article->show_detail_article_id($id);
                if($type=='term')
                    $art=$this->m_article->show_detail_term_id($id);
                if(count($art)>0){
                    echo '
				<div class="status info">
					<p>
						<img alt="Information" src="theme_admin/img/icons/icon_info.png">
						<span>Information:</span>
						Tạo lúc <i>'.date('H:i:s d-m-Y',strtotime($art->date_create)).'</i>. Bởi: <b>'. $this->general->admin_detail($art->author)->user_name.'</b>
					</p>
				</div>
				<div class="status info">
					<p>
						<img alt="Information" src="theme_admin/img/icons/icon_info.png">
						<span>Information:</span>
						Chỉnh sửa lần cuối lúc <i>'. date('H:i:s d-m-Y',strtotime($art->date_modify)).'</i>. Bởi: <b>'. $this->general->admin_detail($art->edit)->user_name.'</b>
					</p>
				</div>
			';
                }else{
                    echo '<div class="status info">
					<p>
						<img alt="Information" src="theme_admin/img/icons/icon_info.png">
						<span>Information:</span>
						Chưa có thông tin hoặc thông tin đang cập nhật.
					</p>
				</div>';
                }
            }else{
                echo '
				<div class="status info">
					<p>
						<img alt="Information" src="theme_admin/img/icons/icon_info.png">
						<span>Information:</span>
						Chưa có thông tin hoặc thông tin đang cập nhật.
					</p>
				</div>
			';
            }
            break;



    }

    ?>
</div>

<script language="javascript">
    setTimeout( function(){
        $("div#message-fadeout").fadeOut();
    }, 5000);
</script>

