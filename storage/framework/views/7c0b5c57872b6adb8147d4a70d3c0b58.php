<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metas -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- Favicon -->
        <link rel="shortcut icon" href="assets/img/fav.png" title="Favicon" sizes="16x16">
    
    <title>Empowering Businesses in the Digital Age with Complete Digital Solutions</title> 
    <meta name="description" content="Conceptiqs is an IT company that offers solutions worldwide. We have clients in India and the Middle East. We pride ourselves on delivering solutions that exceed expectations, adhere to industry best practices, and drive measurable results for our clients. From the initial consultation to post-launch support, we are committed to excellence every step of the way. At Conceptiqs, we specialize in delivering end-to-end services tailored to meet your every digital need, from website development to mobile app creation, digital marketing and e-commerce solutions.">
    <link rel="canonical" href="https://www.conceptiqs.com/contact.php">


<!--cnd bootstrap-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Facebook Meta Tags -->
  <meta property="og:url" content="https://www.conceptiqs.com/">
  <meta property="og:type" content="website">
  <meta property="og:title" content="Empowering Businesses in the Digital Age with Complete Digital Solutions">
  <meta property="og:description" content="Conceptiqs is an IT company that offers solutions worldwide. We pride ourselves on delivering solutions that exceed expectations, adhere to industry best practices, and drive measurable results for our clients. From the initial consultation to post-launch support, we are committed to excellence every step of the way. At Conceptiqs, we specialize in delivering end-to-end services tailored to meet your every digital need, from website development to mobile app creation, digital marketing and e-commerce solutions.">
  <meta property="og:image" content="https://www.conceptiqs.com/assets/img/logo-search.png">

  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta property="twitter:domain" content="https://www.conceptiqs.com/">
  <meta property="twitter:url" content="https://www.conceptiqs.com/">
  <meta name="twitter:title" content="Empowering Businesses in the Digital Age with Complete Digital Solutions">
  <meta name="twitter:description" content="Conceptiqs is an IT company that offers solutions worldwide. We pride ourselves on delivering solutions that exceed expectations, adhere to industry best practices, and drive measurable results for our clients. From the initial consultation to post-launch support, we are committed to excellence every step of the way. At Conceptiqs, we specialize in delivering end-to-end services tailored to meet your every digital need, from website development to mobile app creation, digital marketing and e-commerce solutions.">
  <meta name="twitter:image" content="https://www.conceptiqs.com/assets/img/logo-search.png">

    



    <!-- bootstrap 5 -->
    <link rel="stylesheet" href="common/assets/css/lib/bootstrap.min.css">

    <!-- bootstrap 5 rtl -->
    <!-- <link rel="stylesheet" href="common/assets/css/lib/bootstrap.rtl.min.css"> -->

    <!-- font family -->
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@100..900&amp;display=swap" rel="stylesheet">
    
    <!-- fontawesome icons  -->
    <link rel="stylesheet" href="common/assets/css/lib/all.css">
    <!-- animate css  -->
    <link rel="stylesheet" href="common/assets/css/lib/animate.css">
    <!-- fancybox popup  -->
    <link rel="stylesheet" href="common/assets/css/lib/jquery.fancybox.css">
    <!-- lity popup  -->
    <link rel="stylesheet" href="common/assets/css/lib/lity.css">
    <!-- swiper slider  -->
    <link rel="stylesheet" href="common/assets/css/lib/swiper8.min.css">

    <!-- common style -->
    <link rel="stylesheet" href="common/assets/css/common_style.css">
    <link rel="stylesheet" href="assets/css/home_1_style.css">

    <!-- home style -->
    <link rel="stylesheet" href="assets/css/inner_pages.css">

    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WHRXP99L');</script>
    <!-- End Google Tag Manager -->
</head>

<body class="home-st1 inner-page contact-page-st1">
     <!-- Google Tag Manager (noscript) -->
     <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WHRXP99L"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->

    <!--  start cursor  -->
    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>
    <!--  end cursor  -->

    <!-- ====== Start Loading ====== -->

    <div class="loader-wrap">
        <svg viewBox="0 0 1000 1000" preserveAspectRatio="none">
            <path id="svg" d="M0,1005S175,995,500,995s500,5,500,5V0H0Z"></path>
        </svg>

        <div class="loader-wrap-heading">
            <div class="load-text">
                <span>L</span>
                <span>o</span>
                <span>a</span>
                <span>d</span>
                <span>i</span>
                <span>n</span>
                <span>g</span>
            </div>
        </div>
    </div>

 <?php echo $__env->make('sidemenu', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <div id="scrollsmoother-container">
    <?php echo $__env->make('header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
   


        <!--  Start header  -->
        <header class="tc-header-st13">
            <div class="container">
              <?php if(session('success')): ?>
                  <script>
                      alert("<?php echo e(session('success')); ?>");
                  </script>
              <?php endif; ?>

                <!-- <?php if(session('recaptcha_error')): ?>
                <div class="alert alert-danger">
                <?php echo e(session('recaptcha_error')); ?>

                </div>
                <?php endif; ?> -->

                <?php if(session('recaptcha_error')): ?>
                    <div class="col-lg-12 mt-3">
                        <div class="alert alert-danger">
                            <?php echo e(session('recaptcha_error')); ?>

                        </div>
                    </div>
                <?php endif; ?>
                <!-- Success Modal -->
<!-- <?php if(session('success')): ?>
<div class="modal fade" id="successModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content bg-success text-white">
      <div class="modal-header">
        <h5 class="modal-title">Success</h5>
      </div>
      <div class="modal-body">
        <?php echo e(session('success')); ?>

      </div>
    </div>
  </div>
</div>
<?php endif; ?> -->

<!-- reCAPTCHA Error Modal -->
<?php if(session('recaptcha_error')): ?>
<div class="modal fade" id="recaptchaErrorModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content bg-danger text-white">
      <div class="modal-header">
        <h5 class="modal-title">reCAPTCHA Error</h5>
      </div>
      <div class="modal-body">
        <?php echo e(session('recaptcha_error')); ?>

      </div>
    </div>
  </div>
</div>
<?php endif; ?>

<!-- General Error Modal -->
<?php if(session('error')): ?>
<div class="modal fade" id="errorModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content bg-danger text-white">
      <div class="modal-header">
        <h5 class="modal-title">Error</h5>
      </div>
      <div class="modal-body">
        <?php echo e(session('error')); ?>

      </div>
    </div>
  </div>
</div>
<?php endif; ?>

  <?php if(session('success')): ?>
            <!-- new bootstrap.Modal(document.getElementById('successModal')).show();
        <?php endif; ?> -->

        <?php if(session('recaptcha_error')): ?>
            new bootstrap.Modal(document.getElementById('recaptchaErrorModal')).show();
        <?php endif; ?>

        <!-- <?php if(session('error')): ?>
            new bootstrap.Modal(document.getElementById('errorModal')).show();
        <?php endif; ?>  -->

                <div class="title">
                    <div class="row gx-5">
                        <div class="col-lg-6">
                            <h1 class=""> Let's Chat About Your Project or Just Say Hi!</h1>
<p class="contact-dec">Your perfect technological partner is 
    just one click away. Whether you have a project in mind or simply want to say ‘hi’, we're here to help. Get in touch with us today and let's start discussing how we can work together to achieve your goals!
</p>
                        </div>
                        <div class="col-lg-6">
                            <div class="info">
                                
                                <ul class="check-list mb-30">
                                    <li> <a href="tel:+918075726356"> <i class="fa-solid fa-phone"></i> +91 8075 726 356</a> </li>
                                    <li> <a href="mailto:info@conceptiqs.com"> <i class="fa-solid fa-envelope"></i> info@conceptiqs.com</a> </li>
                                    <li> <a href="#"> <i class="fa-solid fa-location-dot"></i>  1408, 4th Floor, Hilite Business Park, Hilite City kozhikode, 673014 </a> </li>
                                </ul>
                                <div class="social-links">
                                    <!-- <a href="#"> <i class="fab fa-facebook-f"></i> </a> -->
                                    <a href="https://www.linkedin.com/company/conceptiqs-technologies/" target="_blank"> <i class="fab fa-linkedin-in"></i> </a>
                                    <a href="https://www.instagram.com/conceptiqs/?igsh=MWF1NGI5M3JlamZzdA%3D%3D&utm_source=qr" target="_blank"> <i class="fab fa-instagram"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
        </header>
        <!--  End header  -->


        <!--Contents-->
        <main>
      
  
            <!--  Start services  -->
          <section class="tc-map-st13">
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d978.2960750636031!2d75.83327006960043!3d11.247848914654059!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba6597c304c1f3b%3A0xbb7abc23c1ea8a!2sHiLITE%20Business%20Park!5e0!3m2!1sen!2sin!4v1716662462104!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        
        <div class="contact-form col-lg-7">
            <h5 class="fsz-30"> Contact Us </h5>
            
            <!-- REMOVED the conflicting JavaScript form submission -->
                  <form method="POST" action="<?php echo e(route('contactsubmit')); ?>" id="contactForm">
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group mt-4">
                <input type="text" name="firstname" class="form-control" placeholder="Your first name" required>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group mt-4">
                <input type="text" name="lastname" class="form-control" placeholder="Your last name" required>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group mt-4">
                <input type="email" name="emailaddress" class="form-control" placeholder="Your email address" required>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group mt-4">
                <input type="text" name="phone" class="form-control" placeholder="Your phone number" required>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group mt-4">
                <textarea rows="5" name="message" class="form-control" placeholder="Your message" required></textarea>
            </div>
        </div>
        <?php if(session('recaptcha_error')): ?>
            <div class="col-lg-12 mt-3">
                <div class="alert alert-danger">
                    <?php echo e(session('recaptcha_error')); ?>

                </div>
            </div>
        <?php endif; ?>
        <div class="col-lg-12 mt-4">
            <div class="g-recaptcha" data-sitekey="<?php echo e(config('services.recaptcha.site_key')); ?>"></div>
        </div>

        <div class="col-lg-12">
            <button type="submit"
                    class="butn bg-dark1 fsz-16 text-white py-3 mt-50 hover-bg-orange1">
                <span> Submit Now <img class="ms-2 icon-6 w-auto" src="assets/img/arrow_wh.svg" alt=""> </span>
            </button>
        </div>
    </div>
</form>
        </div>
    </div>
</section>


            <!--  End services  -->
           



            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
     

        </main>
        <!--End-Contents-->
         <!--  Start footer  -->
         <?php echo $__env->make('footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <!--  End footer  -->
    </div>
 <a href="#" class="to_top" id="to_top">
 <i class="fa-solid fa-arrow-up"></i>
    </a> 
<!-- Success Popup -->
<!-- <?php if(session('success')): ?>
<div class="modal fade" id="successModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content bg-success text-white">
      <div class="modal-header"><h5 class="modal-title">Success</h5></div>
      <div class="modal-body"><?php echo e(session('success')); ?></div>
    </div>
  </div>
</div>
<?php endif; ?> -->

<!-- reCAPTCHA Error Modal -->
<?php if(session('recaptcha_error')): ?>
<div class="modal fade" id="recaptchaErrorModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content bg-danger text-white">
      <div class="modal-header"><h5 class="modal-title">reCAPTCHA Error</h5></div>
      <div class="modal-body"><?php echo e(session('recaptcha_error')); ?></div>
    </div>
  </div>
</div>
<?php endif; ?>

<!-- General Error Modal -->
<?php if(session('error')): ?>
<div class="modal fade" id="errorModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content bg-danger text-white">
      <div class="modal-header"><h5 class="modal-title">Error</h5></div>
      <div class="modal-body"><?php echo e(session('error')); ?></div>
    </div>
  </div>
</div>
<?php endif; ?>

<script>
document.getElementById('contactForm').addEventListener('submit', function (e) {
    const response = grecaptcha.getResponse();
    if (response.length === 0) {
        e.preventDefault(); // Stop form submission
        alert('Please complete the reCAPTCHA before submitting the form.');
    }
});
</script>


<!-- jQuery and Bootstrap -->
<script src="common/assets/js/lib/jquery-3.0.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-YUe2LzesAfftltw+PEaao2tjU/QATaW/rOitAq67e0CT0Zi2VVRL0oC4+gAaeBKu" crossorigin="anonymous"></script>

<!-- Other libraries -->
<script src="common/assets/js/lib/wow.min.js"></script>
<script src="common/assets/js/lib/jquery.fancybox.js"></script>
<script src="common/assets/js/lib/lity.js"></script>
<script src="common/assets/js/lib/swiper8-bundle.min.js"></script>
<script src="common/assets/js/lib/jquery.waypoints.min.js"></script>
<script src="common/assets/js/lib/jquery.counterup.js"></script>
<script src="common/assets/js/lib/parallaxie.js"></script>
<script src="common/assets/js/common_js.js"></script>
<script src="assets/js/innerPages.js"></script>

<!-- FontAwesome -->
<script src="https://kit.fontawesome.com/16b0815225.js" crossorigin="anonymous"></script>

<!-- GSAP -->
<script src="common/assets/js/gsap_lib/gsap.min.js"></script>
<script src="common/assets/js/gsap_lib/ScrollTrigger.min.js"></script>
<script src="common/assets/js/gsap_lib/SplitText.min.js"></script>

<!-- CSRF Token for AJAX -->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    window.addEventListener('DOMContentLoaded', function () {
       
    });
</script>


<!-- reCAPTCHA onSubmit Handler -->
<script>
function onSubmit(token) {
    document.querySelector("form").submit();
}
</script>


<!-- Show Bootstrap Modals Based on Session -->
 <script>

<?php if(session('success')): ?>
    const successModal = new bootstrap.Modal(document.getElementById('successModal'));
    successModal.show();
<?php endif; ?>

</script>

$(document).ready(function() {
    <?php if(session('success')): ?>
        const successEl = document.getElementById('successModal');
        if (successEl) {
            const successModal = new bootstrap.Modal(successEl);
            successModal.show();
        }
    <?php endif; ?>

    <?php if(session('recaptcha_error')): ?>
        const recaptchaEl = document.getElementById('recaptchaErrorModal');
        if (recaptchaEl) {
            const recaptchaModal = new bootstrap.Modal(recaptchaEl);
            recaptchaModal.show();
        }
    <?php endif; ?>

    <?php if(session('error')): ?>
        const errorEl = document.getElementById('errorModal');
        if (errorEl) {
            const errorModal = new bootstrap.Modal(errorEl);
            errorModal.show();
        }
    <?php endif; ?>
});
</script>
<script>
    
$(document).ready(function() {
    <?php if(session('success')): ?>
        const successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();
    <?php endif; ?>

    <?php if(session('recaptcha_error')): ?>
        const recaptchaModal = new bootstrap.Modal(document.getElementById('recaptchaErrorModal'));
        recaptchaModal.show();
    <?php endif; ?>

    <?php if(session('error')): ?>
        const errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
        errorModal.show();
    <?php endif; ?>
});
</script>
</body>
</html><?php /**PATH C:\xampp\htdocs\conceptiqs12\conceptiqs\resources\views/contact.blade.php ENDPATH**/ ?>