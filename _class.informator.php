<?php
function db_connect()
{
   /* $link = mysql_connect("localhost", "u0095203_yv17", "jy9tc27e") or die("Не могу подключиться");
        mysql_select_db("u0095203_ls", $link) or die ('Не могу выбрать БД');
        mysql_query("SET NAMES utf8");*/
		$link = mysql_connect("localhost", "u0095203_yv17", "jy9tc27e") or die("Не могу подключиться");
        mysql_select_db("u0095203_ls", $link) or die ('Не могу выбрать БД');
        mysql_query("SET NAMES utf8");
}
function such_model($art)
{
    
    $temp=substr_count($art, "-");
    if ($temp>0){
    $artparts=explode("-",$art);
    $art=$artparts[0];
    }
    
    
    
   $query_such = "SELECT * FROM im_catalog WHERE `show`='1' AND nomer_mod LIKE '$art%'";
        $result_such=mysql_query($query_such);
       // while($r=mysql_fetch_array($result_such))
          $such = mysql_num_rows($result_such);
          $such--;
          return ($such);
}

class informator 
{
	//присутствие модели, товарной позиции
	public $model_existence;
	public $num_rows_model;
	public function model_existence($var)
	{
		db_connect();
		$query = "SELECT * FROM im_catalog WHERE `nomer_mod` like '$var%';";
        $result=mysql_query($query); 
		while($r=mysql_fetch_array($result))
		{
			$this->model_existence=$r[7];
		}
		$this->num_rows_model=mysql_num_rows($result);
        mysql_close($link);    
	}


    //свойства и методы класса
    public $category_id;
    public $category_name;
    public $category_description;
    public $category_image;
	public $category_fulltext;
	public $meta_description;
	public $meta_title;
	public $meta_keywords;
    public function getCategoryDescription($value)
    {
       // $this->prop1 = $value;
        //db connecttion
//        $link = mysql_connect("localhost", "root", "") or die("Не могу подключиться");
//        mysql_select_db("riffter", $link) or die ('Не могу выбрать БД');
//        mysql_query("SET NAMES utf8");
        db_connect();
        $query = "SELECT * FROM im_category WHERE name='$value'";
        $result=mysql_query($query);
        while($r=mysql_fetch_array($result))
            { 
            $this->category_id=$r[0];
            $this->category_name=$r[1];
            $this->category_description=$r[2];
            $this->category_image=$r[3];
			$this->category_fulltext=$r[4];
			$this->meta_description=$r[5];
			$this->meta_title=$r[6];
			$this->meta_keywords=$r[7];
			
			
			
            }
        //db disconnection
       // mysql_close($link);    
    }
    
    
    
    public $item_id;
    public $item_category;
    public $item_name;
    public $item_description;
    public $item_price;
    public $item_price_new;
    public $item_image;
    public $item_show;
    public $item_nomer_mod;
    public $item_content;
    public $item_season;
    public $item_rost;
    public $item_size;
    public $item_also;
    public $num_rows;
    public $item_such;
    public $item_promo;
	public $item_height;
    public function getArtDescription($value)
    {
        //$this->prop1 = $value;
        //db connecttion
//        $link = mysql_connect("localhost", "root", "") or die("Не могу подключиться");
//        mysql_select_db("riffter", $link) or die ('Не могу выбрать БД');
//        mysql_query("SET NAMES utf8");
        db_connect();
	// include_once "../db_connect.php";
        $query = "SELECT * FROM im_catalog WHERE `show`='1' AND nomer_mod='$value'";
        $result=mysql_query($query);
        
        while($r=mysql_fetch_array($result))
            {
            $this->item_id=$r[0];
            $this->item_category=$r[1];
            $this->item_name=$r[2];
            $this->item_description=$r[3];
            $this->item_price=$r[4];
            $this->item_price_new=$r[5];
            $this->item_image=$r[6];
            $this->item_show=$r[7];
            $this->item_nomer_mod=$r[8];
            $this->item_content=$r[9];
            $this->item_season=$r[10];
            $this->item_rost=$r[11];
            $this->item_size=$r[12];
            $this->item_also=$r[14];
            $this->item_promo=$r[15];
			$this->item_height=$r[16];
            
            }
        $this->num_rows=mysql_num_rows($result);
        $this->item_such=such_model($this->item_nomer_mod);
        //echo $num_rows;
        //db disconnection
       // mysql_close($link);    
    }
    
    
    public function getArtDescriptionByID($value)
    {
        //$this->prop1 = $value;
        //db connecttion
//        $link = mysql_connect("localhost", "root", "") or die("Не могу подключиться");
//        mysql_select_db("riffter", $link) or die ('Не могу выбрать БД');
//        mysql_query("SET NAMES utf8");
        db_connect();
        //$query = "SELECT * FROM im_catalog WHERE `show`='1' AND id='$value'";
		$query = "SELECT * FROM im_catalog WHERE id='$value'";
        $result=mysql_query($query);
        
        while($r=mysql_fetch_array($result))
            { 
            $this->item_id=$r[0];
            $this->item_category=$r[1];
            $this->item_name=$r[2];
            $this->item_description=$r[3];
            $this->item_price=$r[4];
            $this->item_price_new=$r[5];
            $this->item_image=$r[6];
            $this->item_show=$r[7];
            $this->item_nomer_mod=$r[8];
            $this->item_content=$r[9];
            $this->item_season=$r[10];
            $this->item_rost=$r[11];
            $this->item_size=$r[12];
            $this->item_also=$r[14];
            $this->item_promo=$r[15];
			$this->item_height=$r[16];
            
            }
        $this->num_rows=mysql_num_rows($result);
        $this->item_such=such_model($this->item_nomer_mod);
        //echo $num_rows;
        //db disconnection
		
        mysql_close($link);    
    //echo "<script>alert('ok');</script>";
	}
    
}




class orders{
    public $id;
     public $items;
    public $date;
    public $status;
    public $user_uniq;
     public function get_order($value)
    {
   
//        $link = mysql_connect("localhost", "root", "") or die("Не могу подключиться");
//        mysql_select_db("riffter", $link) or die ('Не могу выбрать БД');
//        mysql_query("SET NAMES utf8");
        db_connect();
        $query = "SELECT * FROM im_orders WHERE user_uniq='$value'";
        $result=mysql_query($query);
        
        while($r=mysql_fetch_array($result))
            {
            $this->id=$r[0];
            $this->user_uniq=$r[1];
            $this->items=unserialize($r[3]);
            $this->date=$r[2];
            if ($r[4]==0) $this->status='Обработка заказа';
            if ($r[4]==1) $this->status='Ожидание оплаты';
            if ($r[4]==2) $this->status='Ожидайте получения';
            //$this->status=$r[4];
            }
        $this->num_rows=mysql_num_rows($result);
        mysql_close($link);    
    }
    public function get_unprocessed_orders()
    {
//        $link = mysql_connect("localhost", "root", "") or die("Не могу подключиться");
//        mysql_select_db("riffter", $link) or die ('Не могу выбрать БД');
//        mysql_query("SET NAMES utf8");
        db_connect();
        $query = "SELECT * FROM im_orders WHERE status='0'";
        $result=mysql_query($query);
        
        while($r=mysql_fetch_array($result))
            {
            $this->id=$r[0];
            $this->items=unserialize($r[3]);
            $this->date=$r[2];
            if ($r[4]==0) $this->status='Обработка заказа';
            if ($r[4]==1) $this->status='Ожидание оплаты';
            if ($r[4]==2) $this->status='Ожидайте получения';
            if ($r[4]==5) $this->status='В истории (обработан, оплачен и доставлен)';
            //$this->status=$r[4];
            }
        $this->num_rows=mysql_num_rows($result);
        mysql_close($link);    
    }
    
         public function get_order_by_id($value)
    {
   
//        $link = mysql_connect("localhost", "root", "") or die("Не могу подключиться");
//        mysql_select_db("riffter", $link) or die ('Не могу выбрать БД');
//        mysql_query("SET NAMES utf8");
        db_connect();
        $query = "SELECT * FROM im_orders WHERE id='$value'";
        $result=mysql_query($query);
        
        while($r=mysql_fetch_array($result))
            {
            $this->id=$r[0];
            $this->user_uniq=$r[1];
            $this->items=unserialize($r[3]);
            $this->date=$r[2];
            if ($r[4]==0) $this->status='Обработка заказа';
            if ($r[4]==1) $this->status='Ожидание оплаты';
            if ($r[4]==2) $this->status='Ожидайте получения';
            if ($r[4]==5) $this->status='В истории (обработан, оплачен и доставлен)';
            //$this->status=$r[4];
            }
        $this->num_rows=mysql_num_rows($result);
        mysql_close($link);    
    }
}



?>
