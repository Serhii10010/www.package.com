const slidesCount = $('.print__portfolio-slider').find('.print__portfolio-slider-slide-content').length,
  $nav = $('.print__portfolio-nav'),
  $navInner = $nav.find('.print__portfolio-nav-inner');

$('.nav').on('click', function(e) {
  $('.print__portfolio-slider').slick('slickGoTo', e.offsetX / $nav.width() * slidesCount | 0);
});

$('.print__portfolio-slider').on({
  init(e, slick) {
    updateNav(slick.currentSlide);
  },
  beforeChange(e, slick, currentSlide, nextSlide) {
    updateNav(nextSlide);
  },
}).slick({
  dots: false,
  infinite: true,
  slidesToShow: 4,
  slidesToScroll: 4,
  prevArrow: '<img src="img/Component 18.png" class="slick-btn slider-left">',
  nextArrow: '<img src="img/Component_19.png" class="slick-btn slider-right">',
  responsive: [
    {
      breakpoint: 825,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});


const slidesCounts = $('.review-slider').find('.review-slider-slide-content').length,
  $navs = $('.review-nav'),
  $navInners = $navs.find('.review-nav-inner');



$('.navs').on('click', function(e) {
  $('.review-slider').slick('slickGoTo', e.offsetX / $navs.width() * slidesCounts | 0);
});

$('.review-slider').on({
  init(e, slick) {
    updateNavs(slick.currentSlide);
  },
  beforeChange(e, slick, currentSlide, nextSlide) {
    updateNavs(nextSlide);
  },
}).slick({
  dots: false,
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 1,
  prevArrow: '<img src="img/Component 18.png" class="slick-btn slider-left">',
  nextArrow: '<img src="img/Component_19.png" class="slick-btn slider-right">',
  responsive: [
    {
      breakpoint: 825,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

$('.cooperation-slider').slick({
  dots: false,
  infinite: true,
  slidesToShow: 4,
  slidesToScroll: 1,
  prevArrow: '<img src="img/Component 18.png" class="slick-btn slider-left cooperation-btn">',
  nextArrow: '<img src="img/Component_19.png" class="slick-btn slider-right cooperation-btn">',
  responsive: [
    {
      breakpoint: 825,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

var basketOpenMobile = document.querySelector("#basket-mobile"),
    closeBtn = document.querySelectorAll(".close"),
    openBasketBtn = document.querySelector("#basket"),
    popupBasket = document.querySelector("#popup__basket"),
    basketBtnReturn = document.querySelector("#basket-btn-return"),
    basketOrder = document.querySelector("#basket__order"),
    popupSmall = document.querySelector("#popup"),
    catalogPrice = document.querySelectorAll(".catalog-price"),
    popupMistake = document.querySelector("#popup-mistake"),
    closeMistakePopup = document.querySelector("#close-mistake");

document.body.addEventListener('click', e => {
  if (e.target.classList.contains('catalog-price-check-btn')) {
    popupSmall.style.display = "block";
  }
});

Array.from(closeBtn).forEach(function (element) {
  element.addEventListener("click", function() {
    popupBasket.style.display = "none";
    popupSmall.style.display = "none";
    basketOrder.style.display = "none";
    popupMistake.style.display = "none";
  });
});

openBasketBtn.addEventListener("click", openBasketPopup);
basketBtnReturn.addEventListener("click", closePopup);
closeMistakePopup.addEventListener("click", mistakePopupClose);
basketOpenMobile.addEventListener("click", openBasketPopup);

$("body").on('click', '[href*="#"]', function(e){
  var fixed_offset = 100;
  $('html,body').stop().animate({ scrollTop: $(this.hash).offset().top - fixed_offset }, 1000);
  e.preventDefault();
});

$(function() {
  $('.phone').mask('+38 (000) 00-00-000');
});

function closePopup() {
  popupBasket.style.display = "none";
  popupSmall.style.display = "none";
}

function openBasketPopup() {
  popupBasket.style.display = "block";
}

function openBasketOrderPopup() {
  popupBasket.style.display = "none";
}

function updateNavs(slide) {
  $navInners.width(`${$navs.width() * (slide + 1) / slidesCounts}px`);
}

function updateNav(slide) {
  $navInner.width(`${$nav.width() * (slide + 4) / slidesCount}px`);
}

function mistakePopupClose () {
  popupMistake.style.display = "none";
  popupBasket.style.display = "block";
}
