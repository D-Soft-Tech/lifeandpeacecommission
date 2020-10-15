<?php
  include_once 'header/header2.php';
  include_once 'life/php/db.php';

  $conn = get_DB();

  function get_month()
  {
    if (isset($_POST['month']) && $_POST['month'] !== "") {
        return $_POST['month'];
    }elseif(isset($_GET['month']) && $_GET['month'] !== ""){
        return $_GET['month'];
    }
    else{ return date("F");}
  }

  function get_year()
  {
    if (isset($_POST['year']) && $_POST['year'] !== "") {
        return $_POST['year'];
    }elseif (isset($_GET['year']) && $_GET['year'] !== "") {
        return $_GET['year'];
    }
    else{ return date("Y");}
  }


  $month = get_month();
  $year = get_year();

  $limit = 5;
  $page = 1;

  function page()
  {
      global $page;
      if (isset($_GET['page']) && $page <= 1){
          return $_GET['page'];
      }elseif ($page >1){
          return $page;
      }else{
          return 1;
      }
  }

  $page = page();

  function pages()
  {
      global $pages;
      if(isset($_GET['pages']) && $pages === null){
          return $_GET['pages'];
      }elseif ($pages){
          return $pages;
      }else{
          return 5;
      }
  }

  $pages = pages();

  function previous()
  {
      global $pages;
      if($pages <=5){
          return 5;
      }else{
          return $pages - 5;
      }
  }
  $Previous = previous();

  function nextArrow()
  {
      global $pages, $total, $limit;
      $rem = ceil($total % $limit);
      $div = ceil($total / $limit);

      if($pages >= $div){
          if($rem>0){
              return $div + 4;
          }elseif($rem = 0){
              return $div;
          }
      }
      else
      {
          return $pages + 5;
          }
  }
    
  $Next = nextArrow();

  $start = ($page - 1) * $limit;
  $result = $conn->query("SELECT testimonies.*, users.full_name AS full_name FROM testimonies, users WHERE testimonies.status = 'read' && testimonies.user_id = users.user_id && date_added LIKE '%$month%$year' ORDER BY testimonies.id DESC LIMIT $start, $limit");
  $testimonies = $result->fetchAll();

  $result1 = $conn->query("SELECT count(testimonies.id) AS id FROM testimonies, users WHERE testimonies.status = 'read' && testimonies.user_id = users.user_id && date_added LIKE '%$month%$year'");
  $custCount = $result1->fetchAll();
  $total = $custCount[0]['id'];

?>

<!--SUBPAGE HEAD-->

<div class="subpage-head has-margin-bottom">
  <div class="container">
    <h3>Photo Gallery</h3>
    <p class="lead">Curated mages of our church programs and events</p>
  </div>
</div>

<!-- // END SUBPAGE HEAD --> 

<!--OUR GALLERY-->
<div class="container has-margin-bottom">
  <div class="img-gallery row">
    <div class="col-sm-4 col-md-3"> <a class="fancybox" href="images/gallery/asdffg.jpg" data-fancybox-group="gallery" title="church image gallery"> <img src="images/gallery/thumb/gallery_thumb_1.jpg" class="img-responsive" width="270" height="270" alt="church image gallery"> </a> </div>
    <div class="col-sm-4 col-md-3"> <a class="fancybox" href="images/gallery/qwqerert.jpg" data-fancybox-group="gallery" title="church image gallery"> <img src="images/gallery/thumb/gallery_thumb_2.jpg" class="img-responsive" width="270" height="270" alt="church image gallery"> </a> </div>
    <div class="col-sm-4 col-md-3"> <a class="fancybox" href="images/gallery/Early Morning Worship.jpg" data-fancybox-group="gallery" title="church image gallery"> <img src="images/gallery/thumb/gallery_thumb_3.jpg" class="img-responsive" width="270" height="270" alt="church image gallery"> </a> </div>
    <div class="col-sm-4 col-md-3"> <a class="fancybox" href="images/gallery/img_gallery_4.jpg" data-fancybox-group="gallery" title="church image gallery"> <img src="images/gallery/thumb/gallery_thumb_4.jpg" class="img-responsive" width="270" height="270" alt="church image gallery"> </a> </div>
    <div class="col-sm-4 col-md-3"> <a class="fancybox" href="images/gallery/img_gallery_5.jpg" data-fancybox-group="gallery" title="church image gallery"> <img src="images/gallery/thumb/gallery_thumb_5.jpg" class="img-responsive" width="270" height="270" alt="church image gallery"> </a> </div>
    <div class="col-sm-4 col-md-3"> <a class="fancybox" href="images/gallery/img_gallery_6.jpg" data-fancybox-group="gallery" title="church image gallery"> <img src="images/gallery/thumb/gallery_thumb_6.jpg" class="img-responsive" width="270" height="270" alt="church image gallery"> </a> </div>
    <div class="col-sm-4 col-md-3"> <a class="fancybox" href="images/gallery/img_gallery_7.jpg" data-fancybox-group="gallery" title="church image gallery"> <img src="images/gallery/thumb/gallery_thumb_7.jpg" class="img-responsive" width="270" height="270" alt="church image gallery"> </a> </div>
    <div class="col-sm-4 col-md-3"> <a class="fancybox" href="images/gallery/img_gallery_8.jpg" data-fancybox-group="gallery" title="church image gallery"> <img src="images/gallery/thumb/gallery_thumb_8.jpg" class="img-responsive" width="270" height="270" alt="church image gallery"> </a> </div>
  </div>
</div>
<!--// END OUR GALLERY --> 

<?php
  include_once 'footer/footer.php';
?>

<!--============== IMAGE GALLERY =================--> 

<script>
$(document).ready(function() {
 $('.fancybox').fancybox();			
});			
</script> 

</body>
</html>
