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
        saveCart();
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

function createCartItem (itemData) {
  const item = document.createElement("div");
  item.setAttribute("class", "basket__product-container");
  item.setAttribute("cart-item", "null");
  item.setAttribute("style", "display: flex;");
  item.setAttribute("product-id", itemData.id);
  item.innerHTML = `
  <div class="basket__product-desc name">
    <p class="basket__product-desc-title" cart-item-name>${itemData.name}</p>
    <div class="basket__img">
      <img src="${'http://www.package.com/storage/' + itemData.image}" cart-item-image>
    </div>
      <p class="basket__product-desc-min" cart-item-min-order-qty>
        Минимальный заказ 200 шт
      </p>
  </div>
  <div class="basket__product-desc characteristics">
    <table>
      <tr>
        <td>Размер</td>
        <td class="basket__product-size" cart-item-size>${itemData.size}</td>
      </tr>
      <tr>
        <td>Радиус колеса</td>
        <td class="basket__product-wheel_radius" cart-item-wheel-radius>${itemData.wheel_radius}</td>
      </tr>
      <tr>
        <td>Упаковка</td>
        <td class="basket__product-packaging" cart-item-packaging>${itemData.packaging}</td>
      </tr>
      <tr>
        <td>Цвет</td>
        <td class="basket__product-color" cart-item-color>${itemData.color}</td>
      </tr>
      <tr>
        <td>Материал</td>
        <td class="basket__product-material" cart-item-material>${itemData.material}</td>
      </tr>
    </table>
  </div>
  <div class="basket__product-desc price" cart-item-price>${itemData.price}</div>
  <div class="basket__product-desc number">
    <div class="quantity-block">
      <a class="quantity-arrow-minus minus" cart-item-minus cart-item-change-quantity><img src="images/minus.png"></a>
      <input class="quantity-num" type="number" value="${itemData.count}" min="1" cart-item-quantity/>
      <a class="quantity-arrow-plus plus" cart-item-plus cart-item-change-quantity><img src="images/plus.png"></a>
    </div>
  </div>
  <div class="basket__product-desc units">шт.</div>
  <div class="basket__product-desc subtotal" cart-item-subtotal>${itemData.total}</div>
  <a class="delete-item delete" id="delete-item" cart-item-delete>X</a>`;
  return item;
}

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
        item.count = itemCount;
        item.total = itemTotal;
        newCartItem = createCartItem(item);
        basketProduct.prepend(newCartItem);
        basketProductCheckout.prepend(newCartItem.cloneNode(true));

        //adding button "in cart" or "order"
        $(`div[catalog-item-id=\'${item.id}\']`).find('.catalog-price').css('display', 'none');
        $(`div[catalog-item-id=\'${item.id}\']`).find('.catalog-price-add-additional').css('display', 'flex');
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
  if(shoppingCart.totalCount() > 0){
    $('div[cart-items-count]').css('display', 'block');
    $('div[cart-items-count]').html(shoppingCart.totalCount());
  } else {
    $('div[cart-items-count]').css('display', 'none');
    $('div[cart-items-count]').html('');
  }
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
  $('#popup__basket').css('display', 'none');
  $('#basket__order').css('display', 'block');
}

function sendOrderErrorMessage(message){
  $("[message-error]").html(message);
}

function doOrder(form) {
  let locale = window.location.pathname;
  axios.post(`${locale}/checkout`, {
    cart: shoppingCart.listCart(),
    elements_count: shoppingCart.totalCount(),
    total_price: shoppingCart.totalCart(),
    form: form
  })
  .then(function (response) {
    // console.log(response.data);
    if (response.data === 1) {
      shoppingCart.clearCart();
      document.cookie = "successful_order=true;max-age=5";
      window.location.href = `http://www.package.com${locale}`;
    }
  })
  .catch(function (error) {
    console.log(error);
  });
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
    event.preventDefault();
    let locale = window.location.pathname;

    let form = $(this).parent().parent().parent().parent().parent('form[order-form]');

    let name = form.find('input[order-customer-name]').val();
    let surname = form.find('input[order-customer-surname]').val();
    let phone = form.find('input[order-customer-phone]').val();
    let email = form.find('input[order-customer-email]').val();

    let comment = form.find('textarea[order-comment]').val();

    let delivery_way = form.find('select[order-delivery-way]').val();

    delivery_way = (delivery_way == null || delivery_way == "Способ доставки" || delivery_way == "null") ? form.find('select[order-delivery-way]').val() : delivery_way;
    let area = form.find('select[order-area]').val();
    area = (area == "null" || area == null || area == "Выберите область") ? form.find('input[order-area]').val() : area;
    let city = form.find('select[order-city]').val();
    city = (city == 'null' || city == null || city == "Выберите город") ? form.find('input[order-city]').val() : city;
    let address = form.find('select[order-address]').val();
    address = (address == 'null' || address == null || address == 'Выберите отделение') ? form.find('input[order-address]').val() : address;

    let message = "success";

    if (name == '') {message = (locale == '/ru') ? 'Поле Имя должно быть заполненым!' : 'Поле Ім\'я має бути заповнене!';}
    else if (surname == '') {message = (locale == '/ru') ? 'surname' : 'surname';}
    else if (phone == '') {message = (locale == '/ru') ? 'phone' : 'phone';}
    else if (email == '') {message = (locale == '/ru') ? 'email' : 'email';}
    else {
      if (delivery_way == null || delivery_way == "Способ доставки" || delivery_way == "null") {message = (locale == '/ru') ? 'delivery_way' : 'delivery_way';}
      else if (area == "null" || area == null || area == "Выберите область" || area == "") {message = (locale == '/ru') ? 'area' : 'area';}
      else if (city == 'null' || city == null || city == "Выберите город" || city == "") {message = (locale == '/ru') ? 'city' : 'city';}
      else if (address == 'null' || address == null || address == 'Выберите отделение' || address == "") {message = (locale == '/ru') ? 'address' : 'address';}
    }
    if (message == "success"){

      let form = {
        name: name,
        surname: surname,
        phone: phone,
        email: email,
        delivery_way: delivery_way,
        area: area,
        city: city,
        address: address,
        comment: comment
      }

      doOrder(form);
    } else {
      sendOrderErrorMessage(message);
    }
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

  displayCart();
  $('#popup__basket').css('display', 'block');
});

// Clear items
$('button[clear-cart]').click(function() {
  clearAllCartItems();
  displayCart();
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
  if(count > 0 && count <= 1000){
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
