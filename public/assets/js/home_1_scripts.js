


// ------------ swiper sliders -----------
$(document).ready(function () {

    // ------------ tc-services-st1 -----------
    var swiper = new Swiper('.tc-services-st1 .services-slider', {
        slidesPerView: 4,
        spaceBetween: 30,
        // centeredSlides: true,
        speed: 1500,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: false,
        mousewheel: false,
        keyboard: true,
        autoplay: {
            delay: 5000,
        },
        loop: true,
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            480: {
                slidesPerView: 2,
            },
            787: {
                slidesPerView: 2,
            },
            991: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 4,
            }
        }
    });


    // ------------ tc-testimonials-st1 -----------
    var swiper = new Swiper('.tc-testimonials-st1 .testi-slider', {
        slidesPerView: 1,
        spaceBetween: 30,
        // centeredSlides: true,
        speed: 1500,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: false,
        mousewheel: false,
        keyboard: true,
        autoplay: {
            delay: 5000,
        },
        loop: true,
    });

});



// ------------ gsap scripts -----------
$(function () {
    gsap.registerPlugin(ScrollTrigger, ScrollSmoother);

    // create the smooth scroller FIRST!
    const smoother = ScrollSmoother.create({
        content: "#scrollsmoother-container",
        smooth: 1.5,
        normalizeScroll: true,
        ignoreMobileResize: true,
        effects: true,
        //preventDefault: true,
        //ease: 'power4.out',
        //smoothTouch: 0.1, 
    });

    // ------ cases colmns effect ------

    // -------
    const tl1 = gsap.timeline({
        scrollTrigger: {
            trigger: ".tc-video-st1",
            start: "-700 top",
            // end: "bottom bottom",
            scrub: true // Smooth scrolling effect
        }
    });

    tl1.to(".tc-video-st1 .img img", {
        x: 0,
        y: 0,
        scale: 1.15,
        duration: 15,
        ease: "linear",
        delay: 1
    });


    // -------
    const tl2 = gsap.timeline({
        scrollTrigger: {
            trigger: ".tc-about-st1",
            start: "-700 top",
            // end: "bottom bottom",
            scrub: true // Smooth scrolling effect
        }
    });

    tl2.to(".tc-about-st1 .float-imgs", {
        x: 0,
        y: -150,
        scale: 1,
        duration: 15,
        ease: "linear",
        delay: 1
    });


    // -------
    const tl3 = gsap.timeline({
        scrollTrigger: {
            trigger: ".tc-portfolio-st1",
            start: "-700 top",
            // end: "bottom bottom",
            scrub: true // Smooth scrolling effect
        }
    });

    tl3.to(".tc-portfolio-st1 .project-card .img img", {
        x: 0,
        y: 0,
        scale: 1.15,
        duration: 15,
        ease: "linear",
        delay: 1
    });


});
