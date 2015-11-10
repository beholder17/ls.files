<?php
  function count_comments($var)
    {
        $query = "SELECT COUNT(*) FROM responses WHERE alias = '".$var."';";
        $count_result=mysql_query($query);
        $temp=mysql_fetch_array($count_result);
        $count_responses=$temp[0];
        return $count_responses;
    }
    
class articles{       
    public $id;
    public $title;
    public $subtitle;
    public $text;
    public $date;
    public $show;
    public $author;
    public $alias;
    public $category;
    public $comments;
	public $keywords;
	public $undefined;
    public $category_alias;
  


    public function get_article_by_alias($var)
    {
        include "../db_connect.php";
        $query = "SELECT * FROM articles WHERE `show`=1 AND `alias`='".$var."';";
        $result=mysql_query($query);
        if ($result!=NULL){
        while($r=mysql_fetch_array($result))
            {
            $this->id=$r[0];
            $this->title=$r[1];
            $this->subtitle=$r[2];
            $this->text=$r[3];
            $this->date=$r[4];
            $this->show=$r[5];
            $this->author=$r[6];
            $this->alias=$r[7];
            $this->category=$r[8];
            $tt=count_comments($r[7]);
            $this->comments=$tt;
			$this->keywords=$r[9];
			$this->category_alias=$r[10];
			$this->undefined=mysql_num_rows($result);	
            }
    }
     mysql_close($link);
    }
    
      public function update_article_by_alias($text,$alias)
    {
        include "../db_connect.php";
        $query = "UPDATE articles SET `text`='".$text."' WHERE `alias`='".$alias."';";
        $result=mysql_query($query);
        mysql_close($link);
    }
      public function delete_article_by_alias($alias)
    {
        include "../db_connect.php";
        $query = "DELETE FROM `articles` WHERE `alias` = '".$alias."' ";
        $result=mysql_query($query);
        mysql_close($link);
    }
}
?>