<?
include_once('./includes/functions.php');
include_once('./includes/header.php');
if (isset($_GET['page'])) {
    include_once("./page/$_GET[page].php");
}else{
    ?><script>location = '/home'</script><?
}
include_once("./includes/footer.php");

?>
