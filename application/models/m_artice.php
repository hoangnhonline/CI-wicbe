<?php

class M_artice extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function show_list_lang()
    {
        $this->db->where('status', 1);
        return $this->db->get('country')->result();
    }

    //=========================tin danh muc===============================
    function show_list_article_all($where = array(), $lang = 'vn')
    {
        $this->db->select("articledetail.article_link,articledetail.article_name,articledetail.article_summary,article.id,article.date_create,article.date_modify,article.article_status");
        $this->db->where($where);
        $this->db->where("country.name", $lang);
        //$this->db->where("article.article_type",2);
        $this->db->order_by('article.article_weight', "ASC");
        $this->db->from('article');
        $this->db->join('articledetail', 'articledetail.article_id=article.id');
        $this->db->join('country', 'articledetail.country_id=country.id');
        return $this->db->get()->result();
    }

    function get_id($id)
    {
        $this->db->where('id',$id);
        $this->db->from('article');
        return $this->db->get()->row();
    }

    //==========================giới thiệu=======================
    public function show_list_nga($where = array(), $limit, $offset)
    {
        $this->db->order_by("article.weight", "ASC");
        $this->db->order_by("article.id", "DESC");
        $this->db->where($where);
        $this->db->limit($limit, $offset);
        $this->db->from('article');
        return $this->db->get()->result();
    }

    public function show_list_page($where = array(), $limit, $offset, $key)
    {
        $this->db->order_by("weight", "DESC");
        $this->db->order_by("article.id", "DESC");
        $this->db->where($where);
        $this->db->limit($limit, $offset);
        $this->db->like('name', $key);
        $this->db->from('article');
        return $this->db->get()->result();
    }
    public function show_list_homes($where = array(),$limit, $offset)
    {
        $this->db->order_by("article.weight", "DESC");
        $this->db->order_by("article.id", "DESC");
        $this->db->where($where);
        $this->db->limit($limit, $offset);
        $this->db->from('article');
        return $this->db->get()->result();
    }

    public function count_page($where = array())
    {
        $this->db->where($where);
        $query = $this->db->get('article');
        return $query->num_rows();
    }

    public function get_link_cate($link)
    {
        $this->db->where("link", $link);
        $this->db->where('status', 1);
        $this->db->from('category');
        return $this->db->get()->row();
    }

    function category_detail($link) {
        $this->db->where("link", $link);
        $this->db->where("status", 1);
        $this->db->from('category');
        return $this->db->get()->row();
    }
    function get_article_home($where = array())
    {
        $this->db->where($where);
        $this->db->from('article');
        return $this->db->get()->row();
    }

    public function tinlienquan($where = array())
    {
        $this->db->where($where);
        $this->db->order_by('weight', "DESC");
        $this->db->order_by('article.id', "DESC");
        $this->db->limit(6, 0);
        $this->db->group_by('article.id');
        $this->db->from('article');
        return $this->db->get()->result();
    }
    public function check_cate_show($id,$table){
        $this->db->where('article_id',$id);
        $this->db->from($table);
        return $this->db->get()->num_rows();
    }
    function tas_row($link)
    {
        $this->db->where("status", '1');
        $this->db->where("link", $link);
        $this->db->from('tags');
        return $this->db->get()->row();
    }
    public function tinlienquan_home($where = array(), $lang)
    {
        $this->db->select("articledetail.article_name,articledetail.article_link,article.date_modify");
        $this->db->where($where);
        $this->db->where("country.name", $lang);
        $this->db->where("article.article_type", 5);
        $this->db->order_by('article.article_weight', "DESC");
        $this->db->order_by('article.id', "DESC");
        $this->db->limit(5, 0);
        $this->db->group_by('article.id');
        $this->db->from('article');
        $this->db->join('articledetail', 'articledetail.article_id=article.id');
        $this->db->join('country', 'articledetail.country_id=country.id');
        return $this->db->get()->result();
    }
    public function tin_lien_quan($where = array(), $lang)
    {
        $this->db->select("articledetail.article_name,articledetail.article_link,article.date_modify");
        $this->db->where($where);
        $this->db->where("country.name", $lang);
        $this->db->order_by('article.article_weight', "DESC");
        $this->db->order_by('article.id', "DESC");
        $this->db->limit(10, 0);
        $this->db->group_by('article.id');
        $this->db->from('article');
        $this->db->join('articledetail', 'articledetail.article_id=article.id');
        $this->db->join('country', 'articledetail.country_id=country.id');
        return $this->db->get()->result();
    }

    public function chektags($link)
    {
        $this->db->where('link', $link);
        $query = $this->db->get('tags');
        return $query->row();
    }

    public function chekpage($link)
    {
        $this->db->where('link', $link);
        $query = $this->db->get('article');
        return $query->row();
    }

    public function chekpage_edit($link, $id)
    {
        $this->db->where('link', $link);
        $this->db->where("id !=", $id);
        $query = $this->db->get('article');
        return $query->row();
    }

    public function show_list_page_tag($where = array())
    {
        $this->db->order_by("weight", "DESC");
        $this->db->order_by("article.id", "DESC");
        $this->db->where("status", '1');
        $this->db->limit(4, 0);
        $this->db->where($where);
        $this->db->from('article');
        return $this->db->get()->result();
    }
    



    function fb_count( $url )
    {
        $fql = "SELECT share_count, like_count, comment_count ";
        $fql .= " FROM link_stat WHERE url = '$url'";
        $fqlURL = "https://api.facebook.com/method/fql.query?format=json&query=" . urlencode( $fql );
        $response = $this->getSSLPage( $fqlURL );
        return json_decode( $response );
    }

    function getSSLPage( $url )
    {
        $userAgents = array( //
            'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.1) Gecko/20090624 Firefox/3.5 (.NET CLR 3.5.30729)', //
            'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', //
            'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0)', //
            'Mozilla/4.8 [en] (Windows NT 6.0; U)', //
            'Opera/9.25 (Windows NT 6.0; U; en)'
        );
        srand( (float) microtime( ) * 10000000 );
        $rand = array_rand( $userAgents );
        $agent = $userAgents[$rand];
        $agent = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.1) Gecko/20090624 Firefox/3.5 (.NET CLR 3.5.30729)';
        $ch = curl_init( );
        curl_setopt( $ch, CURLOPT_URL, $url );
        curl_setopt( $ch, CURLOPT_HEADER, 0 );
        $safe_mode = (ini_get( 'safe_mode' ) == '1' || strtolower( ini_get( 'safe_mode' ) ) == 'on') ? 1 : 0;
        $open_basedir = @ini_get( 'open_basedir' ) ? true : false;
        if( !$safe_mode and !$open_basedir )
        {
            curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
            curl_setopt( $ch, CURLOPT_MAXREDIRS, 10 );
        }
        curl_setopt( $ch, CURLOPT_TIMEOUT, 20 );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch, CURLOPT_USERAGENT, $agent );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
        $html = curl_exec( $ch );
        $curl_error = trim( curl_error( $ch ) );
        curl_close( $ch );
        return $html;
    }
    function count_table_where($where=array(),$table){
        $this->db->where($where);
        $this->db->from($table);
        return $this->db->get()->num_rows();
    }



    function check_tags($id_article, $tags)
    {
        $this->db->where('id_article', $id_article);
        $this->db->where('id_tags', $tags);
        $this->db->from('tags_id');
        return $this->db->get()->num_rows();
    }

    function list_tags($id_article)
    {
        $this->db->where('id_article', $id_article);
        $this->db->from('tags_id');
        $this->db->join('tags', 'tags.id=tags_id.id_tags');
        return $this->db->get()->result();
    }

    function category_nam($id_article, $id_cate)
    {
        $this->db->where('article_id', $id_article);
        $this->db->where('category_id', $id_cate);
        $this->db->from('nam_codong');
        return $this->db->get()->num_rows();
    }

    function category_tinhthanh($id_article, $id_cate)
    {
        $this->db->where('article_id', $id_article);
        $this->db->where('category_id', $id_cate);
        $this->db->from('tinhthanh');
        return $this->db->get()->num_rows();
    }

    public function tintuc_hot($lang)
    {
        $this->db->select("articledetail.article_name,articledetail.article_link,article.id,articledetail.article_summary");
        $this->db->order_by("article.article_weight", "DESC");
        $this->db->order_by("article.id", "DESC");
        $this->db->where('article.article_type', 4);
        $this->db->where('article.article_status', 1);
        $this->db->where("country.name", $lang);
        $this->db->from('article');
        $this->db->join('articledetail', 'articledetail.article_id=article.id');
        $this->db->join('country', 'articledetail.country_id=country.id');
        return $this->db->get()->first_row();
    }



    public function link_vn_en_cate_2($id, $lang)
    {
        $this->db->select("category.category_type,categorydetail.category_name,category.id,categorydetail.category_link");
        $this->db->where("categorydetail.category_link", $id);
        $this->db->where("country.name", $lang);
        $this->db->from('category');
        $this->db->join('categorydetail', 'categorydetail.category_id=category.id');
        $this->db->join('country', 'categorydetail.country_id=country.id');
        return $this->db->get()->row();
    }
    function update_tableID($id, $sql = array(), $table) {
        $this->db->where('id', $id);
        $this->db->update($table, $sql);

    }

    public function article_link($id, $lang)
    {
        $this->db->where("articledetail.article_id", $id);
        $this->db->where("articledetail.country_id", $lang);
        $this->db->from('articledetail');
        return $this->db->get()->row();
    }

    public function get_article_id_cate($id,$name)
    {

        $this->db->where("cate", $id);
        $this->db->like("name", $name);
        $this->db->order_by('weight', 'DESC');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(50, 0);
        $this->db->from('article');
        return $this->db->get()->result();
    }

    public function get_article_id_cate_2($id_tags,$id,$name)
    {
        $this->db->select("article.name,article.id");
        $this->db->where("tags_id.id_tags", $id_tags);
        $this->db->where("article.cate", $id);
        $this->db->like("article.name", $name);
        $this->db->order_by('article.weight', 'DESC');
        $this->db->order_by('article.id', 'DESC');
        $this->db->where("article.type", 2);
        $this->db->group_by('article.id');
        $this->db->limit(50, 0);
        $this->db->from('article');
        $this->db->join('tags_id', 'tags_id.id_article != article.id');
        return $this->db->get()->result();
    }
    public function get_article_id_2($id_tags,$name)
    {
        $this->db->select("article.name,article.id");
        $this->db->where("tags_id.id_tags", $id_tags);
        $this->db->like("article.name", $name);
        $this->db->where("article.type", 2);
        $this->db->order_by('article.weight', 'DESC');
        $this->db->order_by('article.id', 'DESC');
        $this->db->group_by('article.id');
        $this->db->limit(50, 0);
        $this->db->from('article');
        $this->db->join('tags_id', 'tags_id.id_article!=article.id');
        return $this->db->get()->result();
    }

    public function get_article_id_cate_1($name)
    {
        $this->db->like("name", $name);
        $this->db->from('article');
        return $this->db->get()->result();
    }

    public function get_id_check($id_tags,$id_article)
    {
        $this->db->where("id_tags", $id_tags);
        $this->db->where("id_article", $id_article);
        $this->db->from('tags_id');
        return $this->db->get()->num_rows();
    }


    public function get_article_id($name)
    {
        $this->db->like("name", $name);
        $this->db->where("type", 2);
        $this->db->order_by('weight', 'DESC');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(50, 0);
        $this->db->group_by('article.id');
        $this->db->from('article');
        return $this->db->get()->result();
    }
    function show_list_category_child($category_top)
    {
        $this->db->select("category.id");
        $this->db->where("top", $category_top);
        $this->db->from('category');
        return $this->db->get()->result();
    }


    function show_list_news()
    {
        $this->db->where("status", '1');
        $this->db->order_by('weight', 'DESC');
        $this->db->group_by('article.id');
        $this->db->from('article');
        return $this->db->get()->result();
    }

    function show_list_news_1($type)
    {
        $this->db->where("status", '1');
        $this->db->where("type", $type);
        $this->db->order_by('weight', 'DESC');
        $this->db->group_by('article.id');
        $this->db->from('article');
        return $this->db->get()->result();
    }

    function show_list_news_2($type,$hot,$limit, $offset)
    {
        $this->db->where("status", '1');
        $this->db->where("type", $type);
        $this->db->where("hot", $hot);
        $this->db->order_by('weight', 'DESC');
        $this->db->limit($limit, $offset);
        $this->db->group_by('article.id');
        $this->db->from('article');
        return $this->db->get()->result();
    }

    public function file($id)
    {
        $this->db->where("article.id", $id);
        $this->db->from('article');
        return $this->db->get()->row();
    }

    function show_list_index($cate,$hot)
    {

        $this->db->where("status", '1');
        $this->db->where("cate", $cate);
        $this->db->where("hot", $hot);
        $this->db->limit(4, 0);
        $this->db->from('article');
        $this->db->order_by('weight', 'DESC');
        $this->db->group_by('article.id');
        return $this->db->get()->result();
    }
    function timkiem($limit, $offset,$key,$lang,$user_id) {

        $this->db->select("articledetail.article_name,articledetail.article_link,articledetail.article_summary,article.id,article.file,articledetail.link");
        $this->db->order_by('article.id', "DESC");
        $this->db->order_by('article.article_weight', "DESC");

        $this->db->group_by('article.id');
        $this->db->limit($limit, $offset);
        $this->db->like('articledetail.article_name',$key);
        $this->db->where('country.name',$lang);
        $this->db->where("xemtailieu.user_id", $user_id);

if($_GET['danhmuc'] != -1){

        $this->db->where("noibo.category_id",$_GET['danhmuc']);
}
        $this->db->from('article');
        $this->db->join('articledetail', 'articledetail.article_id=article.id');
        $this->db->join('noibo', 'noibo.article_id=article.id');
        $this->db->join('xemtailieu', 'xemtailieu.article_id=article.id');
        $this->db->join('country', 'articledetail.country_id=country.id');
        return $this->db->get()->result();
    }
    function count_timkiem($key,$lang,$user_id) {
        $this->db->select("articledetail.article_name,articledetail.article_link,articledetail.article_summary,article.id,article.file");
        $this->db->order_by('article.id', "DESC");
        $this->db->order_by('article.article_weight', "DESC");

        $this->db->group_by('article.id');
      //  $this->db->limit($limit, $offset);
        $this->db->like('articledetail.article_name',$key);
        $this->db->where('country.name',$lang);
        $this->db->where("xemtailieu.user_id", $user_id);

        if($_GET['danhmuc'] != -1){

            $this->db->where("noibo.category_id",$_GET['danhmuc']);
        }
        $this->db->from('article');
        $this->db->join('articledetail', 'articledetail.article_id=article.id');
        $this->db->join('noibo', 'noibo.article_id=article.id');
        $this->db->join('xemtailieu', 'xemtailieu.article_id=article.id');
        $this->db->join('country', 'articledetail.country_id=country.id');
        return $this->db->get()->num_rows();
    }
    public function get_link_ct ($link){
        $this->db->where('articledetail.article_link',$link);
        $this->db->from('articledetail');
        return $this->db->get()->row();

    }
    public function cate_nb($id){
        $this->db->where('noibo.article_id',$id);
        $this->db->from('noibo');
        return $this->db->get()->row();
    }
    public function list_tin_nb($lang){
        $this->db->select("articledetail.article_name,articledetail.article_link,articledetail.article_summary,article.id");
        $this->db->order_by('article.article_weight', "DESC");
        $this->db->order_by('article.id', "DESC");
        $this->db->where("country.name", $lang);
        $this->db->from('article');
        $this->db->where('article.article_type',4);
        $this->db->where('article.article_status',1);
        $this->db->limit(10,0);
        $this->db->join('articledetail', 'articledetail.article_id=article.id');
        $this->db->join('country', 'articledetail.country_id=country.id');
        return $this->db->get()->result();

    }
    public function list_tin_nb_cd($lang){
        $this->db->select("articledetail.article_name,articledetail.article_link,articledetail.article_summary,article.id");
        $this->db->order_by('article.article_weight', "DESC");
        $this->db->order_by('article.id', "DESC");
        $this->db->where("country.name", $lang);
        $this->db->from('article');
        $this->db->where('article.article_type',7);
        $this->db->where('article.article_status',1);
        $this->db->limit(20,0);
        $this->db->join('articledetail', 'articledetail.article_id=article.id');
        $this->db->join('country', 'articledetail.country_id=country.id');
        return $this->db->get()->result();

    }
    public function chek_ct($table,$link){
        $this->db->select($table.".*");
        $this->db->where('articledetail.article_link',$link);
        $this->db->from('articledetail');
        $this->db->join($table,$table.'.article_id=articledetail.article_id');
        return $this->db->get()->row();
    }
    public function chek_ct_cd($link){
        $this->db->select("codong.*");
        $this->db->where('articledetail.article_link',$link);
        $this->db->from('articledetail');
        $this->db->join('codong', 'codong.article_id=articledetail.article_id');
        return $this->db->get()->row();
    }
    public function chek_cate_tt($lang,$id,$id_article){
        $this->db->select("articledetail.article_name,articledetail.article_link,articledetail.article_summary,article.id,article.date_modify,article.date_create");
        $this->db->order_by('article.article_weight', "DESC");
        $this->db->order_by('article.id', "DESC");
        $this->db->where("country.name", $lang);
        $this->db->where('dangbo.category_id',$id);
        $this->db->where('article.id !=',$id_article);
        $this->db->from('article');
        $this->db->where('article.article_type',7);
        $this->db->where('article.article_status',1);
        $this->db->limit(10,0);
        $this->db->join('articledetail', 'articledetail.article_id=article.id');
        $this->db->join('dangbo', 'dangbo.article_id=article.id');
        $this->db->join('country', 'articledetail.country_id=country.id');
        return $this->db->get()->result();


    }
    public function chek_cate_cd($lang,$id,$id_article){
        $this->db->select("articledetail.article_name,articledetail.article_link,articledetail.article_summary,article.id,article.date_modify");
        $this->db->order_by('article.article_weight', "DESC");
        $this->db->order_by('article.id', "DESC");
        $this->db->where("country.name", $lang);
        $this->db->where('codong.category_id',$id);
        $this->db->where('article.id !=',$id_article);
        $this->db->from('article');
        $this->db->where('article.article_type',7);
        $this->db->where('article.article_status',1);
        $this->db->limit(5,0);
        $this->db->join('articledetail', 'articledetail.article_id=article.id');
        $this->db->join('codong', 'codong.article_id=article.id');
        $this->db->join('country', 'articledetail.country_id=country.id');
        return $this->db->get()->result();


    }
    public function danhsach_cd($link, $lang, $type, $limit, $offset)
    {
        $this->db->select("article.*,articledetail.*");
        $this->db->where("categorydetail.category_link", $link);
        $this->db->where("country.name", $lang);
        $this->db->where('article.article_status', 1);
        $this->db->where('article.article_type', $type);
        $this->db->order_by('article.article_weight', "DESC");
        $this->db->order_by('article.id', 'DESC');
        $this->db->limit($limit, $offset);
        $this->db->group_by('article.id');
        $this->db->from('categorydetail');
        $this->db->join('codong', 'codong.category_id=categorydetail.category_id');
        $this->db->join('articledetail', 'articledetail.article_id=codong.article_id');
        $this->db->join('article', 'article.id=articledetail.article_id');
        $this->db->join('country', 'articledetail.country_id=country.id');
        return $this->db->get()->result();
    }

    public function count_cd($link, $type)
    {
        $this->db->where("categorydetail.category_link", $link);
        $this->db->where('article.article_status', 1);
        $this->db->where('article.article_type', $type);
        $this->db->from('categorydetail');
        $this->db->group_by('article.id');
        $this->db->join('codong', 'codong.category_id=categorydetail.category_id');
        $this->db->join('articledetail', 'articledetail.article_id=codong.article_id');
        $this->db->join('article', 'article.id=articledetail.article_id');
        return $this->db->get()->num_rows();
    }
    function get_nb_home($where = array(),$lang,$id)
    {
        $this->db->select("articledetail.article_name,articledetail.link,articledetail.article_keywords,articledetail.article_description,articledetail.article_content,articledetail.article_link,articledetail.article_summary,article.id,article.date_create,article.date_modify,article.article_status,article.file");
        //$this->db->where("article.id",$id);
        $this->db->where($where);
        $this->db->where("country.name",$lang);
        $this->db->where('xemtailieu.user_id',$id);
        $this->db->order_by('article.article_weight', "ASC");
        $this->db->from('articledetail');
        $this->db->join('article', 'articledetail.article_id=article.id');
        $this->db->join('xemtailieu', 'xemtailieu.article_id=article.id');
        $this->db->join('country', 'articledetail.country_id=country.id');
        return $this->db->get()->row();
    }
    public function danhsach_cd_tk($id,$year, $lang, $type, $limit, $offset)
    {
        $this->db->select("article.*,articledetail.*");
        $this->db->where("categorydetail.category_id", $id);
        $this->db->where("nam_codong.category_id", $year);
        $this->db->where("country.name", $lang);
        $this->db->where('article.article_status', 1);
        $this->db->where('article.article_type', $type);
        $this->db->order_by('article.article_weight', "DESC");
        $this->db->order_by('article.id', 'DESC');
        $this->db->limit($limit, $offset);
        $this->db->group_by('article.id');
        $this->db->from('categorydetail');
        $this->db->join('codong', 'codong.category_id=categorydetail.category_id');
        $this->db->join('articledetail', 'articledetail.article_id=codong.article_id');
        $this->db->join('nam_codong', 'nam_codong.article_id=codong.article_id');
        $this->db->join('article', 'article.id=articledetail.article_id');
        $this->db->join('country', 'articledetail.country_id=country.id');
        return $this->db->get()->result();
    }
    public function count_cd_tk($id,$year, $lang, $type)
    {
        $this->db->select("article.*,articledetail.*");
        $this->db->where("categorydetail.category_id", $id);
        $this->db->where("nam_codong.category_id", $year);
        $this->db->where("country.name", $lang);
        $this->db->where('article.article_status', 1);
        $this->db->where('article.article_type', $type);
        $this->db->group_by('article.id');
        $this->db->from('categorydetail');
        $this->db->join('codong', 'codong.category_id=categorydetail.category_id');
        $this->db->join('articledetail', 'articledetail.article_id=codong.article_id');
        $this->db->join('nam_codong', 'nam_codong.article_id=codong.article_id');
        $this->db->join('article', 'article.id=articledetail.article_id');
        $this->db->join('country', 'articledetail.country_id=country.id');
        return $this->db->get()->num_rows();
    }
    public function show_sodo_gt($where = array(), $lang)
    {
        $this->db->select("articledetail.article_name,articledetail.link,articledetail.article_content,articledetail.article_link,articledetail.article_summary,article.id,article.date_modify,article.article_status,article.date_create");
        $this->db->order_by("article.article_weight", "ASC");
        $this->db->order_by("article.id", "DESC");
        $this->db->where($where);
        $this->db->where("country.name", $lang);
        $this->db->from('article');
        $this->db->join('articledetail', 'articledetail.article_id=article.id');
        $this->db->join('country', 'articledetail.country_id=country.id');
        return $this->db->get()->row();
    }

    function show_list_tags($id,$limit, $offset, $page = 1)
    {

        $this->db->where("status", '1');
        $this->db->where("tags_id.id_tags", $id);
        if ($page == 1)
            $this->db->limit($limit, $offset);
        $this->db->group_by('article.id');
        $this->db->from('article');
        $this->db->join('tags_id', 'tags_id.id_article=article.id');
        if ($page == 0)
            return $this->db->get()->num_rows();
        else
            return $this->db->get()->result();
    }


    function show_list_item_category_top_page($id,$limit, $offset, $page = 1)
    {
        $array = array($id);
        $list = $this->show_list_category_child($id);
        foreach ($list as $l) {
            $array[] = $l->id;
        }
        $this->db->order_by('article.weight', "DESC");
        $this->db->order_by('article.id', "DESC");
        $this->db->where("status", '1');
        $this->db->where_in("cate", $array);
        if ($page == 1)
            $this->db->limit($limit, $offset);

        $this->db->group_by('article.id');
        $this->db->from('article');
        if ($page == 0)
            return $this->db->get()->num_rows();
        else
            return $this->db->get()->result();
    }


    function show_list_item_category_top($id,$limit, $offset, $page = 1)
    {
        $this->db->where("status", '1');
        $this->db->where("cate", $id);
        if ($page == 1)
            $this->db->limit($limit, $offset);
        $this->db->group_by('article.id');
        $this->db->order_by('article.weight', "DESC");
        $this->db->order_by('article.id', "DESC");
        $this->db->from('article');
        if ($page == 0)
            return $this->db->get()->num_rows();
        else
            return $this->db->get()->result();
    }

    public function check_link_search($type){
        $this->db->where('article.article_status', 1);
        $this->db->where('article.article_type', $type);
        $this->db->from('article');
        $this->db->group_by('article.id');
        return $this->db->get()->row();
    }





}
?>