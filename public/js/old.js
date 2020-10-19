plusMinusHandler();
deleteHandler();
addHandler();

function plusMinusHandlerAfterAdding(id){
  var quantityArrowMinus =  document.querySelectorAll(".quantity-arrow-minus"),
      quantityArrowPlus = document.querySelectorAll(".quantity-arrow-plus"),
      quantityNum = document.querySelectorAll(".quantity-num");

  Array.from(quantityArrowPlus).forEach(function(element) {
    if(element.getAttribute('product-id') == id){
      element.addEventListener('click', function () {
        const rowId = element.getAttribute('data-id');
        Array.from(quantityNum).forEach(function (inp_el) {
          var attr = inp_el.getAttribute('data-id');
          if (attr == rowId){
            inp_el.value = Number.parseInt(inp_el.value) + 1;
            axios.patch(`ru/cart/${rowId}`, {
                 quantity: inp_el.value
               })
               .then(function (response) {
                 setTimeout(function (){
                   axios.get('ru/cart_info')
                     .then(function (response) {
                       forDeletingEditing(response['data']['all'], response['data']['count'], response['data']['total']);
                     })
                     .catch(function (error) {
                       // handle error
                       console.log(error);
                     });
                 }, 200);
               })
               .catch(function (error) {
                 console.log(error);
            });

          }
        });
      });
    }
   });

  Array.from(quantityArrowMinus).forEach(function(element) {
    if(element.getAttribute('product-id') == id){
      element.addEventListener('click', function () {
        const rowId = element.getAttribute('data-id');
        Array.from(quantityNum).forEach(function (inp_el) {
        var attr = inp_el.getAttribute('data-id');
        if (attr == rowId && inp_el.value > 1){
           inp_el.value = Number.parseInt(inp_el.value) - 1;

           axios.patch(`ru/cart/${rowId}`, {
               quantity: inp_el.value
             })
             .then(function (response) {
               setTimeout(function (){
                 axios.get('ru/cart_info')
                   .then(function (response) {
                     // handle success
                     forDeletingEditing(response['data']['all'], response['data']['count'], response['data']['total']);
                   })
                   .catch(function (error) {
                     console.log(error);
                   });
               }, 200);
             })
             .catch(function (error) {
               console.log(error);
             });

         }

       });
      });
    }
   });
}
function deleteHandlerAfterAdding(id) {
  var deleteItem =  document.querySelectorAll(".delete-item"),
      basketContainer = document.querySelectorAll(".basket__product-container"),
      additionalPriceAll = document.querySelectorAll('.catalog-price-additional'),
      cartProductAll = document.querySelectorAll(".catalog-price-add");

  Array.from(deleteItem).forEach(function(element) {
    if(element.getAttribute('product-id') == id){
      element.addEventListener('click', function(){
        const product = element.getAttribute('data-id');
        const product_id = element.getAttribute('product-id');
        axios.delete(`ru/cart/${product}`)
           .catch(function (error) {
             console.log(error);
        });
        setTimeout(function (){
          axios.get('ru/cart_info')
            .then(function (response) {
              forDeletingEditing(response['data']['all'], response['data']['count'], response['data']['total']);
              addHandlerAfterDeleting(product_id);
            })
            .catch(function (error) {
              console.log(error);
            });
        }, 200);

        Array.from(basketContainer).forEach(function (element) {
          if(element.getAttribute('data-id') == product){
            element.style.display = "none";
          }
        });

        Array.from(additionalPriceAll).forEach(function (element) {
          if(element.getAttribute('product-id') == product_id){
            element.style.display = "flex";
          }
        });
        Array.from(cartProductAll).forEach(function (element) {
          if(element.getAttribute('data-id') === product_id){
            element.style.display = "none";
          }
        });
        Array.from(catalogPriceAdditional).forEach(function (element) {
          if(element.getAttribute('product-id') == product_id){
            element.style.display = "none";
          }
        });
      });
    }
  });
}
function addHandlerAfterDeleting(id) {
  var catalogPrice = document.querySelectorAll(".catalog-price"),
      additionalPriceAll = document.querySelectorAll('.catalog-price-additional'),
      catalogPriceAdditional = document.querySelectorAll(".catalog-price-add-additional");



  Array.from(additionalPriceAll).forEach(function (element) {
    if(element.getAttribute('product-id') == id) {
      element.addEventListener('click', function () {
        const id = element.getAttribute('product-id');
        const name = element.getAttribute('product-name');
        const price = element.getAttribute('product-price');
        axios.post(`ru/cart`, {
             id: id,
             name: name,
             price: price
           })
           .catch(function (error) {
             console.log(error);
        });

        Array.from(catalogPriceAdditional).forEach(function (element) {
          if(element.getAttribute('product-id') == id){
            element.style.display = "flex";
          }
        });
        Array.from(additionalPriceAll).forEach(function (element) {
          if(element.getAttribute('product-id') == id){
            element.style.display = "none";
          }
        });
        Array.from(catalogPrice).forEach(function (element) {
          if(element.getAttribute('product-id') == id){
            element.style.display = "none";
          }
        });

        setTimeout(function (){
          axios.get('ru/cart_info')
            .then(function (response) {
              // handle success
              updateCart(response['data']['all'], id);
              forDeletingEditing(response['data']['all'], response['data']['count'], response['data']['total']);
            })
            .catch(function (error) {
              console.log(error);
            })
        }, 200);
        openBasketPopup();
      });
    }
  });
}

function addHandler(){

  Array.from(catalogPrice).forEach(function (element) {
    element.addEventListener('click', function () {
      const id = element.getAttribute('product-id');
      const name = element.getAttribute('product-name');
      const price = element.getAttribute('product-price');
      axios.post(`ru/cart`, {
           id: id,
           name: name,
           price: price
         })
         .catch(function (error) {
           console.log(error);
      });

      Array.from(catalogPriceAdditional).forEach(function (element) {
        if(element.getAttribute('product-id') == id){
          element.style.display = "flex";
        }
      });
      Array.from(catalogPrice).forEach(function (element) {
        if(element.getAttribute('product-id') == id){
          element.style.display = "none";
        }
      });

      setTimeout(function (){
        axios.get('ru/cart_info')
          .then(function (response) {
            // handle success
            forDeletingEditing(response['data']['all'], response['data']['count'], response['data']['total']);
            updateCart(response['data']['all'], id);
          })
          .catch(function (error) {
            console.log(error);
          })
      }, 200);
      openBasketPopup();
    });
  });

}

function deleteHandler(){
  var deleteItem =  document.querySelectorAll(".delete-item"),
      basketContainer = document.querySelectorAll(".basket__product-container"),
      additionalPriceAll = document.querySelectorAll('.catalog-price-additional'),
      cartProductAll = document.querySelectorAll(".catalog-price-add");

  Array.from(deleteItem).forEach(function(element) {
    element.addEventListener('click', function(){
      const product = element.getAttribute('data-id');
      const product_id = element.getAttribute('product-id');
      axios.delete(`ru/cart/${product}`)
         .catch(function (error) {
           console.log(error);
      });
      setTimeout(function (){
        axios.get('ru/cart_info')
          .then(function (response) {
            // handle success
            forDeletingEditing(response['data']['all'], response['data']['count'], response['data']['total']);
            addHandlerAfterDeleting(product_id);
          })
          .catch(function (error) {
            console.log(error);
          });
      }, 500);

      Array.from(basketContainer).forEach(function (element) {
        if(element.getAttribute('data-id') == product){
          element.style.display = "none";
        }
      });

      Array.from(additionalPriceAll).forEach(function (element) {
        if(element.getAttribute('product-id') == product_id){
          element.style.display = "flex";
        }
      });
      Array.from(cartProductAll).forEach(function (element) {
        if(element.getAttribute('data-id') === product_id){
          element.style.display = "none";
        }
      });
      Array.from(catalogPriceAdditional).forEach(function (element) {
        if(element.getAttribute('product-id') == product_id){
          element.style.display = "none";
        }
      });
    });
  });
}

function plusMinusHandler () {
  var quantityArrowMinus =  document.querySelectorAll(".quantity-arrow-minus"),
      quantityArrowPlus = document.querySelectorAll(".quantity-arrow-plus"),
      quantityNum = document.querySelectorAll(".quantity-num");

  Array.from(quantityArrowPlus).forEach(function(element) {
    element.addEventListener('click', function () {
      const id = element.getAttribute('data-id');
      Array.from(quantityNum).forEach(function (inp_el) {
        var attr = inp_el.getAttribute('data-id');
        if (attr == id){
          inp_el.value = Number.parseInt(inp_el.value) + 1;
          axios.patch(`ru/cart/${id}`, {
               quantity: inp_el.value
             })
             .then(function (response) {
               setTimeout(function (){
                 axios.get('ru/cart_info')
                   .then(function (response) {
                     forDeletingEditing(response['data']['all'], response['data']['count'], response['data']['total']);
                   })
                   .catch(function (error) {
                     // handle error
                     console.log(error);
                   });
               }, 500);
             })
             .catch(function (error) {
               console.log(error);
          });

        }
      });
    });
   });

  Array.from(quantityArrowMinus).forEach(function(element) {
        element.addEventListener('click', function () {
          const id = element.getAttribute('data-id');
          Array.from(quantityNum).forEach(function (inp_el) {
          var attr = inp_el.getAttribute('data-id');
          if (attr == id && inp_el.value > 1){
             inp_el.value = Number.parseInt(inp_el.value) - 1;
             axios.patch(`ru/cart/${id}`, {
                 quantity: inp_el.value
               })
               .then(function (response) {

                 setTimeout(function (){
                   axios.get('ru/cart_info')
                     .then(function (response) {
                       // handle success
                       forDeletingEditing(response['data']['all'], response['data']['count'], response['data']['total']);
                     })
                     .catch(function (error) {
                       console.log(error);
                     });
                 }, 200);
               })
               .catch(function (error) {
                 console.log(error);
               });

           }

         });
        });
   });
}

function forDeletingEditing(all, count, total){
  var counts = document.querySelectorAll('.basket-finish-price-units'),
      totals = document.querySelectorAll('.basket-finish-price-total'),
      basketNumbers = document.querySelectorAll('.basket-number'),
      subtotals = document.querySelectorAll('.subtotal');

      Array.from(counts).forEach(function(element){
        element.innerHTML = count;
      });
      Array.from(totals).forEach(function(element){
        element.innerHTML = total;
      });
      Array.from(basketNumbers).forEach(function(element){
        element.innerHTML = count;
      });

      Array.from(subtotals).some(function(element){
        var rowId = element.getAttribute('data-id');
        if(all[rowId] != null && rowId != null && rowId == all[rowId]['rowId']){
          let value = all[rowId]['price'] * all[rowId]['qty'];
          element.innerHTML = parseFloat(value).toFixed(4);
        }
      });
}

function updateCart(all, id){
    updateEachElement(id, all);
    plusMinusHandlerAfterAdding(id);
    deleteHandlerAfterAdding(id);
}

function updateEachElement(id, all) {
  var rowId;
  var name;
  var wheel_radius;
  var size;
  var packaging;
  var color;
  var material;
  var price;
  var qty;
  var image;
  for(var i in all){
    if(all[i]['id'] == id){
        rowId = all[i]['rowId'];
        name = all[i]['name'];
        price = all[i]['price'];
        qty = all[i]['qty'];
        subtotal = all[i]['subtotal'];
        wheel_radius = all[i]['options']['wheel_radius'];
        size = all[i]['options']['size'];
        packaging = all[i]['options']['packaging'];
        color = all[i]['options']['color'];
        material = all[i]['options']['material'];
        image = all[i]['options']['image'];
    }
  }


  var basketProduct = document.querySelector("#basket__product");
  var basketProductContainer = document.querySelector("#basket__product-container");
  var clone = basketProductContainer.cloneNode(true);
  clone.removeAttribute('id');
  clone.removeAttribute('style');
  clone.setAttribute('id', 'new-el');
  basketProduct.prepend(clone);
  var newEl = document.querySelector("#new-el");
  newEl.setAttribute('data-id', rowId);
  newEl.childNodes[1].childNodes[1].innerHTML = name;
  newEl.childNodes[1].childNodes[3].childNodes[1].setAttribute('src', 'https://dimastuy-group.site/storage/' + image);
  newEl.childNodes[1].childNodes[5].innerHTML = "Минимальный заказ 200";
  newEl.childNodes[3].childNodes[1].childNodes[1].childNodes[2].childNodes[3].innerHTML = wheel_radius;
  newEl.childNodes[3].childNodes[1].childNodes[1].childNodes[0].childNodes[3].innerHTML = size;
  newEl.childNodes[3].childNodes[1].childNodes[1].childNodes[4].childNodes[3].innerHTML = packaging;
  newEl.childNodes[3].childNodes[1].childNodes[1].childNodes[6].childNodes[3].innerHTML = color;
  newEl.childNodes[3].childNodes[1].childNodes[1].childNodes[8].childNodes[3].innerHTML = material;
  newEl.childNodes[5].innerHTML = parseFloat(price/packaging).toFixed(4);
  newEl.childNodes[7].childNodes[1].childNodes[3].setAttribute('value', qty);
  newEl.childNodes[7].childNodes[1].childNodes[3].setAttribute('data-id', rowId);
  newEl.childNodes[7].childNodes[1].childNodes[1].setAttribute('data-id', rowId);
  newEl.childNodes[7].childNodes[1].childNodes[1].setAttribute('product-id', id);
  newEl.childNodes[7].childNodes[1].childNodes[5].setAttribute('product-id', id);
  newEl.childNodes[7].childNodes[1].childNodes[5].setAttribute('data-id', rowId);
  newEl.childNodes[11].innerHTML = parseFloat(subtotal).toFixed(4);
  newEl.childNodes[11].setAttribute('data-id', rowId);
  newEl.childNodes[13].setAttribute('data-id', rowId);
  newEl.childNodes[13].setAttribute('product-id', id);
}
