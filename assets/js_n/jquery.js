
$(".bannerSliderMainSlider").slick({
        dots: false,
        vertical: false,
        centerMode: false,
		 autoplay: true,
        slidesToShow:1,
		speed: 500,
		 arrows : true,
        slidesToScroll: 1
});

// $(".slideBox").slick({
//         dots: false,
//         vertical: false,
//         centerMode: false,
// 		 autoplay: true,
//         slidesToShow:5,
// 		speed: 500,
// 		 arrows : true,
//         slidesToScroll: 1
// });




$(".slideBox").slick({
    dots: false,
    vertical: false,
    centerMode: false,
    autoplay: true,
    slidesToShow:5,
    speed: 500,
    arrows : true,
    slidesToScroll: 1,
    responsive: [

{
  breakpoint: 768,
  settings: {
    slidesToShow: 3,
    slidesToScroll: 2
  }
},
{
  breakpoint: 480,
  settings: {
    slidesToShow: 1,
    slidesToScroll: 1
  }
}
// You can unslick at a given breakpoint now by adding:
// settings: "unslick"
// instead of a settings object
]

    

});



$(".tabs-menu a").click(function(event) {
                    event.preventDefault();
                    $(this).parent().addClass("current");
                    $(this).parent().siblings().removeClass("current");
                    var tab = $(this).attr("href");
                    $(".tab-content").not(tab).css("display", "none");
                    $(tab).fadeIn();
                });
                $(".tabs-menu1 a").click(function(event) {
                    event.preventDefault();
                    $(this).parent().addClass("current");
                    $(this).parent().siblings().removeClass("current");
                    var tab = $(this).attr("href");
                    $(".tab-content1").not(tab).css("display", "none");
                    $(tab).fadeIn();
                });
                $(".tabs-menu-verti a").click(function(event) {
                    event.preventDefault();
                    $(this).parent().addClass("current");
                    $(this).parent().siblings().removeClass("current");
                    var tab = $(this).attr("href");
                    $(".tab-content-verti").not(tab).css("display", "none");
                    $(tab).fadeIn();
                });