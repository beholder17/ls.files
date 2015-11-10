<?php

function db_connect() {
    $link = mysql_connect("localhost", "root", "") or die("Не могу подключиться");
    mysql_select_db("riffter", $link) or die('Не могу выбрать БД');
    mysql_query("SET NAMES utf8");
}


class gallery_category_info{
 public $id;
 public $name;
 public $description; 
 public $fulltext;
 public $alias;
 public $keywords;
 
 public function get_gallery_info_by_alias($alias)
 {
	db_connect();
	$query = "SELECT * FROM gallery_category WHERE `alias`='$alias'";
    $result=mysql_query($query);
    while($r=mysql_fetch_array($result))
        { 
        $this->id=$r[0];
        $this->name=$r[1];
		$this->description=$r[2];
		$this->fulltext=$r[3];
		$this->alias=$r[4];
		$this->keywords=$r[5];
		}
    //    mysql_close($link);    
 }
 
}


class gallery
{
    //свойства и методы класса
    public $id;
    public $photo;
    public $text;
    public $date;
    public $category;
    public $show;
    
    public function gallery_output($value)
    {
        db_connect();
        $query = "SELECT * FROM gallery WHERE category='$value'";
        $result=mysql_query($query);
        while($r=mysql_fetch_array($result))
            { 
            $this->id=$r[0];
            $this->photo=$r[1];
            $this->text=$r[2];
            $this->date=$r[3];
            $this->category=$r[4];
            $this->show=$r[5];
            }
        mysql_close($link);    
    }

        public function gallery_record($value)
    {
        db_connect();
        $query = "SELECT * FROM gallery WHERE category='$value'";
        $result=mysql_query($query);
        while($r=mysql_fetch_array($result))
            { 
            $this->category_id=$r[0];
            $this->category_name=$r[1];
            $this->category_description=$r[2];
            $this->category_image=$r[3];
            }
        mysql_close($link);    
    }
    
}
?>