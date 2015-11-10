<ul class="breadcrumb">
  <li><a href="<?php echo PATH_TO_ROOT; ?>">Главная</a> <span class="divider">/</span></li>
  <li><a href="http://www.ladystyle.su/articles/by_category/about">О компании</a> <span class="divider">/</span></li> 
  <li><a href="<?php echo PATH_TO_ROOT.'maps/'; ?>">Зона присутствия</a> <span class="divider">/</span></li>
  <?php if ($title!=NULL) { ?>
  <li><a href="#"><?php echo $title;?></a> <span class="divider">/</span></li>
  <?php } ?>
</ul>
