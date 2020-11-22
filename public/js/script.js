var basketOpenMobile = document.querySelector("#basket-mobile"),
    closeBtn = document.querySelectorAll(".close"),
    openBasketBtn = document.querySelector("#basket"),
    popupBasket = document.querySelector("#popup__basket"),
    basketOrder = document.querySelector("#basket__order"),
    basketBtnReturn = document.querySelector("#basket-btn-return"),
    popupSmall = document.querySelector("#popup"),
    catalogPrice = document.querySelectorAll(".catalog-price"),
    btnReturnCatalog = document.querySelector("button[cart-return-to-catalog]");

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
      });
    });

    openBasketBtn.addEventListener("click", openBasketPopup);
    basketBtnReturn.addEventListener("click", closePopup);
    basketOpenMobile.addEventListener("click", openBasketPopup);
    btnReturnCatalog.addEventListener("click", closeOrder);


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

    function closeOrder(){
      basketOrder.style.display = "none";
    }
