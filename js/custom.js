$(window).on("scroll", function() {
    $("nav.navbar").toggleClass("shrink", $(this).scrollTop() > 50)
});