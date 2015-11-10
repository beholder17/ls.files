<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title><?php echo TITLE_WORDS; ?></title>
		<meta name="DC.Publisher" content="ООО 'Леди Стайл', производство женской одежды" >
		<meta name="geo.placename" content="Russian federation">
        <?php if ( DOINDEX =="NO") echo '<meta name="robots" content="NOINDEX,NOFOLLOW">'; else echo '<meta name="robots" content="all">'; ?>		
        <meta name="keywords" content='<?php echo KEY_WORDS; ?>' />		
		<meta name="description" content='<?php echo DESCRIPTION; ?>' />
		

        
        <!-- bootstrap Begin -->                
        <link href="<?php echo PATH_TO_ROOT; ?>css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo PATH_TO_ROOT; ?>css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
        <script src="<?php echo PATH_TO_ROOT; ?>js/bootstrap.js" type="text/javascript"></script>
        <!-- bootstrap End -->      

	

        <script src="<?php echo PATH_TO_ROOT; ?>js/jquery.js"></script>
		<script src="<?php echo PATH_TO_ROOT; ?>js/jquery.lazyload.min.js"></script>
        <script src="<?php echo PATH_TO_ROOT; ?>js/zurb.js"></script>
        <link href="<?php echo PATH_TO_ROOT; ?>css/style.css" rel="stylesheet" type="text/css">
       <script type="text/javascript" src="<?php echo PATH_TO_ROOT; ?>ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="<?php echo PATH_TO_ROOT; ?>AjexFileManager/ajex.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Marmelad&amp;subset=latin,cyrillic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed&amp;subset=latin,cyrillic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Arimo&amp;subset=latin,cyrillic' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="http://www.ladystyle.su/gallery/source/jquery.fancybox.css?v=2.1.5" media="screen" />
		<script type='text/javascript' src='http://www.ladystyle.su/js/jquery.jqzoom-core.js'></script>
		<link rel="stylesheet" type="text/css" href="http://www.ladystyle.su/css/jquery.jqzoom.css"> 
		<!-- rocket -->
			<link rel='stylesheet' href='http://cdn.rocketcallback.com/style/tracker_css/static.css'>
			<link rel='stylesheet' href='http://cdn.rocketcallback.com/style/tracker_css/user_css/kYE9RQyQi6.css'>
			<script type='text/javascript'>var widget_code='kYE9RQyQi6';</script>
			<script type='text/javascript' src='http://cdn.rocketcallback.com/loader.js' charset='UTF-8'></script>
			
    </head>
 <body>  
   

     
     <?php
     define ("DIRECT_NAME", "http://www.ladystyle.su");
//include "../auth/_check.php";
include $_SERVER['DOCUMENT_ROOT'].'/auth/_check.php';
     //print_r($_SESSION);

     if (!defined('_SAPE_USER')){
        define('_SAPE_USER', '85e113e6cff782411a24b8e9c36a9c14');
     }
     require_once(realpath($_SERVER['DOCUMENT_ROOT'].'/'._SAPE_USER.'/sape.php'));
        $o['charset'] = 'UTF-8'; 
    $sape = new SAPE_client($o); 
    unset($o);
?>

<div style="border-radius: 0px; border-width: 0px; border-color: #ddd; border-style: solid; padding: 10px 20px 0px 20px; background-color: white;" class="container shadow">
    
    <!-- Header Begin -->
     <div class="row" style="height: 160px;">
           <div class="row" style="height: 1px; margin-bottom: 15px">
             <div style="background-color: #EC008C; margin-left: 60px; margin-top: -20px; margin-bottom: 10px; padding: 10px; margin-bottom: 10px;">
                         
             </div>
               
         </div>
<div class="row" >
      <div class="span4">
          <div style="float: left; margin-top: 20px; margin-left: 60px; width: 300px;"><a href=<?php echo DIRECT_NAME; ?>><div class="logo"></div></a></div></div>
      <div class="span4" style="background-color: rerd;">
<!--[if IE]>
<style>
#rosproizv{
    position: absolute; left: 58%; top: 70px; color: #EC008C; text-shadow: 1px 1px 2px; font: 10px georgia;}
</style>
<![endif]-->

     <div class='phone_title'><a href="http://www.ladystyle.su/contacts/">8-800-707-03-55</a></div>
	 <div class='phone_title_caption'>Звонок бесплатный, Пн-Пт с 9 до 17 по мск</div>
   <div class='phone_title_caption2' style=""><i>"Одевайтесь вместе с нами!"</i></div>

      </div>         
      <div class="span4">
          <?php include "../auth/welcome-form.php";?>
          <br><br><br><br>


         <?php if (($check->accepted==1 && $check->level==2) OR ($check->accepted==1 && $check->level==50)) include "../im/cart_interface.php";?>
     <div class="pull-right"> 
          <div style="display: inline;  float: left;"><a href="#" title="Сто лучших товаров России"><img alt="Сто лучших товаров России" src="<?php echo PATH_TO_ROOT; ?>template/sltr.jpg"/></a></div>
          
          <div style="display: inline; float: left;"><a href="#" title="Лучшие товары Дона"><img alt="Лучшие товары Дона" src="<?php echo PATH_TO_ROOT; ?>template/ltd.jpg"/></a></div>
          <div style="display: inline; float: left;"><a href="#" title="Премия за вклад в экономическое развитие России"><img alt="Премия за вклад в экономическое развитие России" src="<?php echo PATH_TO_ROOT; ?>template/err.jpg"/></a></div>
          <div style="display: inline; float: left;"><a href="#" title="Отличник качества"><img alt="Отличник качества" src="<?php echo PATH_TO_ROOT; ?>template/ok.png"/></a></div>
          <div style="display: inline; float: left;"><a href="#" title="Золото в номинации 'Лидер Российского бизнеса'"><img alt="Золото в номинации 'Лидер Российского бизнеса'" src="<?php echo PATH_TO_ROOT; ?>template/gold.jpg"/></a></div>
          <div style="display: inline; float: left;"><a href="#" title="Межрегиональная организация предпринимателей"><img alt="Межрегиональная организация предпринимателей" src="<?php echo PATH_TO_ROOT; ?>template/mop.jpg"/></a></div>
          </div>     
      </div>
    </div>
	
	
     </div>
    <!-- Header End -->
         <!-- Navigation Begin -->

             <?php 
include $_SERVER['DOCUMENT_ROOT'].'/navigation.php';
?>
     <!-- Navigation End -->    
    <!-- Body Begin -->    
    
     <div style="margin-top: 20px;" class="row">
      <div class="span12" style="min-height: 700px;">