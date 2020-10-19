class Cart {
  constructor (locale) {
    this.locale = locale;
    this.updateCartDisplay();
  }

  addItem (id) {
    if (id != null){
      axios.post(`${this.locale}/cart`, {
           id: id
         })
         .catch(function (error) {
           return error;
      });
    } else return "Error! Id == null !";
    this.updateCartDisplay();
  }

  deleteItem (rowId) {
    if (rowId != null) {
      axios.delete(`${this.locale}/cart/${rowId}`)
         .catch(function (error) {
           return error;
      });
    } else return "Error! Id == null !";
    this.updateCartDisplay();
  }

  changeQuantity (id, quantity) {
    if (id != null) {
      axios.patch(`${this.locale}/cart/${id}`, {
           quantity: quantity
         })
         .catch(function (error) {
           return error;
      });
    } else return "Error! Id == null !";
    this.updateCartDisplay();
  }

  updateCartDisplay () {
    axios.get(`${this.locale}/cart_info`)
      .then(function (response) {
        let items = response['data']['all'];
        let count = response['data']['count'];
        let total = response['data']['total'];

        if (items != []) {
          for (var i in items) {
            let rowId = all[i]['rowId'];
            let id = all[i]['id'];
            let name = all[i]['name'];
            let price = all[i]['price'];
            let qty = all[i]['qty'];
            let subtotal = all[i]['subtotal'];
            let wheelRadius = all[i]['options']['wheel_radius'];
            let size = all[i]['options']['size'];
            let packaging = all[i]['options']['packaging'];
            let color = all[i]['options']['color'];
            let material = all[i]['options']['material'];
            let image = all[i]['options']['image'];

            let cartItemNew = document.querySelector('div[cart-item-new])').cloneNode(true);
            cartItemNew.removeAttribute('cart-item-new');
            cartItemNew.setAttribute('cart-item');
            cartItemNew.setAttribute('row-id', rowId);
            cartItemNew.setAttribute('product-id', id);

            cartItemNew.querySelector('div[cart-item-name]').innerHTML = name;
            cartItemNew.querySelector('div[cart-item-image]').setAttribute('src', 'http://www.package.com/storage/' + image);
            cartItemNew.querySelector('div[cart-item-min-order-qty]').innerHTML = "Минимальный заказ 200";
            cartItemNew.querySelector('div[cart-item-size]').innerHTML = size;
            cartItemNew.querySelector('div[cart-item-wheel-radius]').innerHTML = wheelRadius;
            cartItemNew.querySelector('div[cart-item-packaging]').innerHTML = packaging;
            cartItemNew.querySelector('div[cart-item-color]').innerHTML = color;
            cartItemNew.querySelector('div[cart-item-material]').innerHTML = material;
            cartItemNew.querySelector('div[cart-item-price]').innerHTML = price;
            cartItemNew.querySelector('div[cart-item-subtotal]').innerHTML = parseFloat(subtotal).toFixed(4);

            basketProduct.prepend(cartItemNew);
          }
          $("[cart-items-count]").each(function() {
            $(this).val(count);
          });
          $("[cart-total-price]").each(function() {
            $(this).val(total);
          });
        }

      })
      .catch((error) => {
        return error;
      });
  }
}

class Catalog {
  constructor(locale) {
    this.locale = locale;
    this.updateCatalogDisplay();
  }

  updateCatalogDisplay(){
    axios.get(`${this.locale}/catalog_info`)
        .then(function (catalog_response) {
          var catalogItems = catalog_response['data']['catalogItems'];
          axios.get(`ru/cart_info`).then(function (cart_response) {
            var cartItems = cart_response['data']['all'];

            let catalogMap = new Map();

            for (let i in catalogItems) {
              let id = catalogItems[i]['id'];
              let availability = catalogItems[i]['is_available'];

              for (let k in cartItems){
                if (catalogItems[i]['id'] == cartItems[i]['id']){
                  catalogMap.set(id, 'cart');
                  break;
                }
                else if (availability){
                  catalogMap.set(id, 'clarify');
                  break;
                }
                 else {
                  catalogMap.set(id, 'catalog');
                  break;
                }
              }
            }
            // console.log(catalogMap);


            $("[catalog-item]").each(function () {
              var $catalogItemId = $(this).attr('catalog-item-id');
              if (catalogMap.get($catalogItemId) == false) {
                $(this).children('div[catalog-item-in-cart]').css('display', 'flex');
                $(this).children('div[catalog-item-add-to-cart]').css('display', 'none');
              } else {
                $(this).children('div[catalog-item-add-to-cart]').css('display', 'flex');
                $(this).children('div[catalog-item-in-cart]').css('display', 'none');
              }
            });
          }).catch(function (error) {
            console.log(error);
          });
        })
        .catch(function (error) {
          console.log(error);
        });
  }
}

const basketProduct = document.querySelector("#basket__product");
const locale = document.querySelector("span[locale]").getAttribute('value');

const cart = new Cart(locale);
const catalog = new Catalog(locale);

$("a[cart-item-delete]").click(function () {
  var $rowId = $(this).parent().attr("row-id");
  var $productId = $(this).parent().attr("product-id");

  cart.deleteItem($rowId);
  cart.updateDisplay();

  catalog.updateCatalogInfo();
});

$("button[catalog-item-order]").click(function () {
  var $catalogItemId = $(this).parent(".catalog-price").parent(".catalog-item").attr("catalog-item-id");

  cart.addItem($catalogItemId);
  cart.updateDisplay();

  catalog.updateCatalogInfo();
});

$("a[cart-item-change-quantity]").click(function () {
  let $cartItemQuantity = $(this).parent().querySelector("input[cart-item-quantity]").val();
  let $operation = ($(this).attr("cart-item-minus") != null) ? "minus" : "plus";

  if($operation == "plus") {
    $(this).parent().querySelector("input[cart-item-quantity]").val(parseInt($cartItemQuantity) + 1);
  } else {
    $(this).parent().querySelector("input[cart-item-quantity]").val(parseInt($cartItemQuantity) - 1);
  }

  var $rowId = $(this).parent().parent().parent().attr("row-id");
  var $productId = $(this).parent().parent().parent().attr("product-id");
  var $quantity = $(this).parent().querySelector("input[cart-item-quantity]").val();

  cart.changeQuantity($rowId, $quantity);
  cart.updateDisplay();
});
