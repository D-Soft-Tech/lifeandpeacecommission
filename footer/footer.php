<!-- SUBSCRIBE -->
<div class="highlight-bg">
  <div class="container">
    <div class="row">
      <form action="subscribe.php" method="post" class="form subscribe-form" role="form" id="subscribeForm">
        <div class="form-group col-md-3 hidden-sm">
          <h5 class="susbcribe-head"> SUBSCRIBE <span>TO OUR NEWSLETTER</span></h5>
        </div>
        <div class="form-group col-sm-8 col-md-6">
          <label class="sr-only">Email address</label>
          <input type="email" class="form-control input-lg" placeholder="Enter email" name="email" id="address" data-validate="validate(required, email)" required>
          <span class="help-block" id="result"></span> </div>
        <div class="form-group col-sm-4 col-md-3">
          <button type="submit" class="btn btn-lg btn-primary btn-block">Subscribe Now →</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- END SUBSCRIBE --> 

<!-- FOOTER -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-3">
        <h5>ABOUT THE CHURCH</h5>
        <p>For the word of God is living and active. Sharper than any double-edged sword, it penetrates even to dividing soul and spirit, joints and marrow; it judges the thoughts and attitudes.</p>
      </div>
      <div class="col-sm-6 col-md-3">
        <h5>QUICK LINKS</h5>
        <ul class="footer-links">
          <li><a href="#">Upcoming events</a></li>
          <li><a href="#">Ministries</a></li>
          <li><a href="#">Recent Sermons</a></li>
          <li><a href="#">Contact us</a></li>
        </ul>
      </div>
      <div class="col-sm-6 col-md-3">
        <h5>OUR ADDRESS</h5>
        <p> Mount Zion Fortress<br>
          Along New Ife Road, Opposite Honors Filling Station <br>
          Adegbayi, Ibadan; Oyo State<br>
          <br>
          Phone: +234 65656565<br>
          Email: <a href="#">lifeandpeace@gmail.com</a></p>
      </div>
      <div class="col-sm-6 col-md-3">
        <h5>CONNECT</h5>
        <div class="social-icons"><a href="#"><img src="images/fb-icon.png" alt="social"></a> <a href="#"><img src="images/tw-icon.png" alt="social"></a> <a href="#"><img src="images/in-icon.png" alt="social"></a></div>
      </div>
    </div>
  </div>
  <div class="copyright">
    <div class="container">
      <p class="text-center">Copyright © - LIFE AND PEACE COMMISSION - 2020. <span>Developed by D-Soft Tech</span> <br /> All rights reserved</p>
    </div>
  </div>
<!-- Warning Modal before deleting a contact message -->
<div class="modal fade bd-example-modal-lg mt-5" id="logoutModal" role="dialog" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header text-danger">
            <h5 class="modal-title">
                Warning <i class="icon fa pe-7s-attention"></i> 
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="position-relative">
                <p>
                    <h6 class="text-center">Are you sure you want to logout?</h6>
                </p>
            </div>
        </div>
        <div class="modal-footer">
            <button class="mr-5 btn-transition btn btn-outline-success" data-dismiss="modal">
                Cancel
            </button>
            <button type="submit" id="" name="logout" value="logout"class="mr-5 btn-transition btn btn-outline-danger finalAccountDelete" data-dismiss="modal">
                Yes, Proceed
            </button>
        </div>
    </div>
</div>
<!-- Warning Modal before deleting a contact message -->
</footer>
<!-- // END FOOTER --> 
<!-- // END --> 

<!-- Bootstrap core JavaScript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/ketchup.all.js"></script> 
<script src="js/fancybox.js"></script>
<script src="assets/fontawesomeForWeb/js/all.js"></script>
<script src="forala/js/froala_editor.pkgd.min.js"></script>

<!--============== SUBSCRIBE FORM =================--> 

<script>

$(function(){
 var shrinkHeader = 300;
  $(window).scroll(function() {
    var scroll = getCurrentScroll();
      if ( scroll >= shrinkHeader ) {
           $('.navbar').addClass('shrink');
        }
        else {
            $('.navbar').removeClass('shrink');
        }
  });
function getCurrentScroll() {
    return window.pageYOffset || document.documentElement.scrollTop;
    }
});

</script> 

<!--============== SUBSCRIBE FORM =================--> 

<script>
$(document).ready(function() {
	$('#subscribeForm').ketchup().submit(function() {
		if ($(this).ketchup('isValid')) {
			var action = $(this).attr('action');
			$.ajax({
				url: action,
				type: 'POST',
				data: {
					email: $('#address').val()
				},
				success: function(data){
					$('#result').php(data);
				},
				error: function() {
					$('#result').php('Sorry, an error occurred.');
				}
			});
		}
		return false;
	});

});
</script>