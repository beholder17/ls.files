<?php
include_once '../template/header.php';
if ($check->accepted==1 && $check->level==80) {
    include "_class.articles.php";
   
$alias=$_GET['alias'];
$article = new articles();
$article->delete_article_by_alias($alias);
}
?>
<script>
window.location = "<?php echo DIR;?>articles/";
</script>