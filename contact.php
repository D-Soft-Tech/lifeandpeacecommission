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
          <label for="subject">Subject</label>
          <input type="text" class="form-control" placeholder="summarize your message in one sentence" name="subject" id="subject" required>
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea class="form-control" rows="6" name="message" id="message" placeholder="Your message in full" required></textarea>
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
          Along New Ibadan - Ife Express Road, Opposite Honors Filling Station <br>
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
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.707156579709!2d3.9813427497178786!3d7.386676824211546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbd047882cd5a5941!2sLife%20and%20Peace%20Commission!5e0!3m2!1sen!2sng!4v1602564445016!5m2!1sen!2sng" 
width="100%" height="450" frameborder="0" style="border:0; margin-bottom: 15px;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

<!-- // END LOCATION MAP  --> 
<?php
  include_once 'footer/footer.php';
?>

</body>
</html>
