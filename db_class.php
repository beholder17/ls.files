<?php
include "db_connect.php";
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//require 'db_connect.php';
/*function db_connect()
{
    $link = mysql_connect("localhost", "u0095203_yv17", "jy9tc27e") or die("Не могу подключиться");
    mysql_select_db("u0095203_ls", $link) or die ('Не могу выбрать БД');
    mysql_query("SET NAMES utf8");		
}
*/


class users{
    public $accepted;
    public $address;
    public $name;
    public $famil;
    public $li;
    public $pw;
    public function get_user_info($value)
    {
   $link = mysql_connect("localhost", "u0095203_yv17", "jy9tc27e") or die("?? ???? ????????????");
mysql_select_db("u0095203_ls", $link) or die ('?? ???? ??????? ??');
mysql_query("SET NAMES utf8");
        $query = "SELECT * FROM users WHERE user_uniq LIKE '$value%'";
        $result=mysql_query($query);
        if ($result!=NULL){       
        while($r=mysql_fetch_array($result))
            { 
            $this->li=$r[1];
            $this->pw=$r[2];
            $this->info=$r[3];
            $this->name=$r[4];
            $this->famil=$r[5];
            $this->otch=$r[6];
            $this->email=$r[7];
            $this->level=$r[8];
            $this->reg_date=$r[9];
            $this->reg_time=$r[10];
            $this->user_uniq=$r[11];
            $this->address=$r[12];
            
            //$this->category_image=$r[3];
            }
        //db disconnection
        
        } else echo "???????????? ?? ??????";
        mysql_close($link);    
    }
    
    
    public function get_user_info_by_login($value)
    {
   $link = mysql_connect("localhost", "u0095203_yv17", "jy9tc27e") or die("?? ???? ????????????");
mysql_select_db("u0095203_ls", $link) or die ('?? ???? ??????? ??');
mysql_query("SET NAMES utf8");
        $query = "SELECT * FROM users WHERE li = '$value'";
        $result=mysql_query($query);
        if ($result!=NULL){       
        while($r=mysql_fetch_array($result))
            { 
            $this->li=$r[1];
            $this->pw=$r[2];
            $this->info=$r[3];
            $this->name=$r[4];
            $this->famil=$r[5];
            $this->otch=$r[6];
            $this->email=$r[7];
            $this->level=$r[8];
            $this->reg_date=$r[9];
            $this->reg_time=$r[10];
            $this->user_uniq=$r[11];
                
            
            //$this->category_image=$r[3];
            }
        //db disconnection
        
        } else echo "???????????? ?? ??????";
        mysql_close($link);    
    }
    
    
    
    
    
    
    
    
    
    
}
/*
class informator 
{
    //???????? ? ?????? ??????
    public $category_id;
    public $category_name;
    public $category_description;
    public $category_image;
    public function getCategoryDescription($value)
    {
       // $this->prop1 = $value;
        //db connecttion
   $link = mysql_connect("localhost", "root", "") or die("?? ???? ????????????");
mysql_select_db("riffter", $link) or die ('?? ???? ??????? ??');
mysql_query("SET NAMES cp1251");
        
        $query = "SELECT * FROM im_category WHERE name='$value'";
        $result=mysql_query($query);
        while($r=mysql_fetch_array($result))
            { 
            $this->category_id=$r[0];
            $this->category_name=$r[1];
            $this->category_description=$r[2];
            $this->category_image=$r[3];
            }
        //db disconnection
        mysql_close($link);    
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
    public $num_rows;
    public function getArtDescription($value)
    {
        //$this->prop1 = $value;
        //db connecttion
   $link = mysql_connect("localhost", "root", "") or die("?? ???? ????????????");
mysql_select_db("riffter", $link) or die ('?? ???? ??????? ??');
mysql_query("SET NAMES cp1251");
        
        $query = "SELECT * FROM im_catalog WHERE nomer_mod='$value'";
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
            
            }
        $this->num_rows=mysql_num_rows($result);
        //echo $num_rows;
        //db disconnection
        mysql_close($link);    
    }

}*/
?>