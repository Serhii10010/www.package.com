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

    function mistakePopupClose () {
      popupMistake.style.display = "none";
      popupBasket.style.display = "block";
    }
