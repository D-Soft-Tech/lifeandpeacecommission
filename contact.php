<?php
include_once 'header/header.php';
?>

<!--SUBPAGE HEAD-->

<div class="subpage-head has-margin-bottom">
  <div class="container">
    <h3>Contact us</h3>
    <p class="lead">Our Church address and contact details</p>
  </div>
</div>

<!-- // END SUBPAGE HEAD -->

<div class="container">
  <div class="row">
    <div class="col-md-6 has-margin-bottom">
      <form id="phpcontactform" role="form">
        <div class="form-group">
          <label>Full Name</label>
          <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="form-group">
          <label>Email ID</label>
          <input type="email" class="form-control" name="email" id="email">
        </div>
        <div class="form-group">
          <label>Phone</label>
          <input type="text" class="form-control" name="mobile" id="mobile">
        </div>
        <div class="form-group">
          <label>Message</label>
          <textarea class="form-control" rows="5" name="message" id="message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-lg">Send message</button>
        <span class="help-block loading"></span>
      </form>
    </div>
    <!--// col md 9-->
    
    <div class="col-md-6 has-margin-bottom">
      <h5>OUR ADDRESS</h5>
      <div class="row">
        <div class="col-lg-6">Mount Zion Fortress<br>
          Along New Ife Road, Opposite Honors Filling Station <br>
          Adegbayi, Ibadan; Oyo State</div>
        <div class="col-lg-6">Phone: +234 65656565<br>
          Fax: +61 38 376 6284<br>
          Email: <a href="#">lifeandpeace@gmail.com</a></div>
      </div>
      <hr>
      </div>
    </div>
  </div>
</div>

<!-- LOCATION MAP -->
<div class="location-map">
  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1575.9186034720387!2d144.95541222452604!3d-37.817281929786624!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642c9a8d8495f%3A0xedc33f230d1355b1!2sEnvato+Pty+Ltd!5e0!3m2!1sen!2sin!4v1407063773571" height="260"></iframe>
</div>
<!-- // END LOCATION MAP  --> 
<?php
  include_once 'footer/footer.php';
?>

</body>
</html>
