// ************************************************
// Shopping Cart API
// ************************************************

var shoppingCart = (function() {
  // =============================
  // Private methods and propeties
  // =============================
  cart = [];

  // Constructor
  function Item(productId, price, count) {
    this.productId = productId;
    this.price = price;
    this.count = count;
  }

  // Save cart
  function saveCart() {
    sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
  }

    // Load cart
  function loadCart() {
    cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
  }
  if (sessionStorage.getItem("shoppingCart") != null) {
    loadCart();
  }


  // =============================
  // Public methods and propeties
  // =============================
  var obj = {};

  // Add to cart
  obj.addItemToCart = function(productId, price, count) {
    for(var item in cart) {
      if(cart[item].productId === productId) {
        cart[item].count ++;
        saveCart();
        return;
      }
    }
    var item = new Item(productId, price, count);
    cart.push(item);
    saveCart();
  }
  // Set count from item
  obj.setCountForItem = function(productId, count) {
    for(var i in cart) {
      if (cart[i].productId === productId) {
        cart[i].count = count;
        break;
      }
    }
  };
  // Remove item from cart
  obj.removeItemFromCart = function(productId) {
      for(var item in cart) {
        if(cart[item].productId === productId) {
          cart[item].count --;
          if(cart[item].count === 0) {
            cart.splice(item, 1);
          }
          break;
        }
    }
    saveCart();
  }

  // Remove all items from cart
  obj.removeItemFromCartAll = function(productId) {
    for(var item in cart) {
      if(cart[item].productId === productId) {
        cart.splice(item, 1);
        break;
      }
    }
    saveCart();
  }

  // Clear cart
  obj.clearCart = function() {
    cart = [];
    saveCart();
  }

  // Count cart
  obj.totalCount = function() {
    var totalCount = 0;
    for(var item in cart) {
      totalCount += cart[item].count;
    }
    return totalCount;
  }

  // Total cart
  obj.totalCart = function() {
    var totalCart = 0;
    for(var item in cart) {
      totalCart += cart[item].price * cart[item].count;
    }
    return Number(totalCart.toFixed(2));
  }

  // List cart
  obj.listCart = function() {
    var cartCopy = [];
    for(i in cart) {
      item = cart[i];
      itemCopy = {};
      for(p in item) {
        itemCopy[p] = item[p];

      }
      itemCopy.total = Number(item.price * item.count).toFixed(2);
      cartCopy.push(itemCopy)
    }
    return cartCopy;
  }

  // cart : Array
  // Item : Object/Class
  // addItemToCart : Function
  // removeItemFromCart : Function
  // removeItemFromCartAll : Function
  // clearCart : Function
  // countCart : Function
  // totalCart : Function
  // listCart : Function
  // saveCart : Function
  // loadCart : Function
  return obj;
})();

// *****************************************
// Triggers / Events
// *****************************************

function displayCart() {
  var cartArray = shoppingCart.listCart();

  let locale = window.location.pathname;

  let ids = [];
  for(var i in cartArray) {
    ids[i] = cartArray[i].productId;
  }

  if(cartArray.length != 0){
    axios.post(`${locale}/catalog`, {
      ids: ids
    })
    .then(function (response) {
      for(var i in response['data']){
        let item = response.data[i][0];
        let cartItemNew = document.querySelector('div[cart-item-new]').cloneNode(true);

        let itemTotal;
        let itemCount;
        for(let i in cartArray){
          if(cartArray[i].productId == item.id) {
            itemTotal = cartArray[i].total;
            itemCount = cartArray[i].count;
            break;
          }
        }

        cartItemNew.removeAttribute('cart-item-new');
        cartItemNew.setAttribute('cart-item', null);
        cartItemNew.setAttribute('product-id', item.id);

        cartItemNew.querySelector('p[cart-item-name]').innerHTML = item.name;
        cartItemNew.querySelector('img[cart-item-image]').setAttribute('src', 'http://www.package.com/storage/' + item.image);
        cartItemNew.querySelector('p[cart-item-min-order-qty]').innerHTML = "Минимальный заказ 200";
        cartItemNew.querySelector('td[cart-item-size]').innerHTML = item.size;
        cartItemNew.querySelector('td[cart-item-wheel-radius]').innerHTML = item.wheel_radius;
        cartItemNew.querySelector('td[cart-item-packaging]').innerHTML = item.packaging;
        cartItemNew.querySelector('td[cart-item-color]').innerHTML = item.color;
        cartItemNew.querySelector('input[cart-item-quantity]').value = itemCount;
        cartItemNew.querySelector('td[cart-item-material]').innerHTML = item.material;
        cartItemNew.querySelector('div[cart-item-price]').innerHTML = item.price;
        cartItemNew.querySelector('div[cart-item-subtotal]').innerHTML = parseFloat(itemTotal).toFixed(2);
        cartItemNew.style.display = 'flex';

        //adding new html elements to cart
        basketProduct.prepend(cartItemNew);
        let basketChechout = cartItemNew.cloneNode(true);
        basketProductCheckout.prepend(basketChechout);
      }
    })
    .catch(function (error) {
      console.log(error);
    })

    $('button[clear-cart]').css('display', 'flex');
    $('button[cart-prepare-order]').css('display', 'flex');
    $('button[cart-do-order]').css('display', 'block');
  }
  else {
    $('button[clear-cart]').css('display', 'none');
    $('button[cart-prepare-order]').css('display', 'none');
    $('button[cart-do-order]').css('display', 'none');

    $('button[cart-return-to-catalog]').css('display', 'flex');
  }

  $('span[cart-total-price]').html(shoppingCart.totalCart());
  $('.basket-finish-price-units').html(shoppingCart.totalCount());
  $('div[cart-items-count]').html(shoppingCart.totalCount());
}

function emptyCart(event) {
  if (!confirm("Корзина будет очищена! Продолжить?")) {
    event.preventDefault();
  } else {
    if(event.handleObj.selector === 'a[locale-ru]'){
      clearAllCartItems();
      window.location.href = 'http://www.package.com/ru';
    } else if(event.handleObj.selector === 'a[locale-ua]') {
      clearAllCartItems();
      window.location.href = 'http://www.package.com/ua';
    }
  }
}

function clearAllCartItems () {
  shoppingCart.clearCart();
  $('[cart-item]').remove();
  $('button[catalog-item-order]').parent().css('display', 'flex');
  $('a[catalog-item-in-cart]').parent().css('display', 'none');

  displayCart();
}

function prepareOrder() {
  let locale = window.location.pathname;
  window.location.href = `http://www.package.com${locale}/checkout`;
}

function doOrder() {
  let locale = window.location.pathname;
  // console.log('lol');
  axios.post(`${locale}/checkout`, {
    cart: shoppingCart.listCart()
  })
  .then(function (response) {
    console.log(response);
    alert('lol');
    event.preventDefault();
  })
  .catch(function (error) {
    console.log(error);
  })
}

$("div[locale=\'ua\']").on("click", "a[locale-ru]", emptyCart);
$("div[locale=\'ru\']").on("click", "a[locale-ua]", emptyCart);

$("button[cart-prepare-order]").click(function () {
  if (shoppingCart.listCart() != []) {
    prepareOrder();
  }
});

$("button[cart-do-order]").click(function () {
  if (shoppingCart.listCart() != []) {
    doOrder();
  }
});

const basketProduct = document.querySelector("#basket__product");
const basketProductCheckout = document.querySelector("#basket__product_checkout");

// Add item
$("button[catalog-item-order]").click(function () {
  event.preventDefault();
  let productId = $(this).parent(".catalog-price").parent(".catalog-item").attr("catalog-item-id");
  let price = Number($(this).parent(".catalog-price").parent(".catalog-item").attr("catalog-item-price"));

  shoppingCart.addItemToCart(productId, price, 1);
  $('[cart-item]').remove();

  $(this).parent().css('display', 'none');
  let productInCart = $(this).parent().parent().children()[2];
  productInCart.style.display = 'flex';

  displayCart();
});

// Clear items
$('button[clear-cart]').click(function() {
  clearAllCartItems();
});

// Delete item button
$('div[basket-items]').on("click", "a[cart-item-delete]", function(event) {
  var productId = $(this).parent().attr("product-id");
  shoppingCart.removeItemFromCartAll(productId);
  $('[cart-item]').remove();

  let productOrderButton = $('button[catalog-item-order]').parent();
  let productInCartButton = $('a[catalog-item-in-cart]').parent();

  $(`[catalog-item-id=${productId}]`).find(productOrderButton).css('display', 'flex');
  $(`[catalog-item-id=${productId}]`).find(productInCartButton).css('display', 'none');

  displayCart();
});

// -1
$('div[basket-items]').on("click", "a[cart-item-minus]", function () {
  var productId = $(this).parent().parent().parent().attr("product-id");

  var count = Number($(this).parent().find('input[cart-item-quantity]').val());

  if (count == 1) {
    let productOrderButton = $('button[catalog-item-order]').parent();
    let productInCartButton = $('a[catalog-item-in-cart]').parent();

    $(`[catalog-item-id=${productId}]`).find(productOrderButton).css('display', 'flex');
    $(`[catalog-item-id=${productId}]`).find(productInCartButton).css('display', 'none');
  }

  shoppingCart.removeItemFromCart(productId);
  $('[cart-item]').remove();

  displayCart();
});

// +1
$('div[basket-items]').on("click", "a[cart-item-plus]", function () {
  var productId = $(this).parent().parent().parent().attr("product-id");
  shoppingCart.addItemToCart(productId);
  $('[cart-item]').remove();

  displayCart();
});

// Item count input
$('div[basket-items]').on("change", "input[cart-item-quantity]", function(event) {
  var productId = $(this).parent().parent().parent().attr("product-id");
  var count = Number($(this).val());
  if(count > 0){
    shoppingCart.setCountForItem(productId, count);
    $('[cart-item]').remove();
    displayCart();
  } else {
    $('[cart-item]').remove();
    shoppingCart.addItemToCart(productId);
    shoppingCart.removeItemFromCart(productId);
    displayCart();
  }
});

displayCart();
