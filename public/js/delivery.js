$('select[order-delivery-way]').on("change", function () {
  console.log($(this).val());
  $('[order-area]').css('display', 'none');
  $('[order-city]').css('display', 'none');
  $('[order-address]').css('display', 'none');

  $('[order-address]').val('');
  $('[order-city]').val('');
  $('[order-area]').val('');

  $('#addressID').find('option').remove();
  $('#addressID').append($('<option>').text('Выберите отделение').attr('value', 'Выберите отделение'));
  $('#addressID select').val('Выберите отделение');

  $('#areaID').find('option').remove();
  $('#areaID').append($('<option>').text('Выберите область').attr('value', 'Выберите область'));
  $('#areaID select').val('Выберите область');

  $('#cityID').find('option').remove();
  $('#cityID').append($('<option>').text('Выберите город').attr('value', 'Выберите город'));
  $('#cityID select').val('Выберите город');

  if($(this).val() == 'np'){
    npDelivery();
  } else if($(this).val() == 'tohome') {
    tohomeDelivery();
  }
});

function npDelivery () {
  $('#areaID').css('display', 'inline-block');
  $('#cityID').css('display', 'inline-block');
  $('#addressID').css('display', 'inline-block');

  $('#areaID').prop('disabled', false);
  $('#cityID').prop('disabled', 'disabled');
  $('#addressID').prop('disabled', 'disabled');

  $(function() {
    var settings = {
      "async": true,
      "crossDomain": true,
      "url": "https://api.novaposhta.ua/v2.0/json/",
      "method": "POST",
      "headers": {
        "content-type": "application/json",
      },
      "processData": false,
      "data": "{\"apiKey\": \"0768ba96d33e597f02eee417ff2538a9\", \"modelName\": \"Address\",\"calledMethod\": \"getAreas\"}"
    }
    $.ajax(settings).done(function (response) {
      $('#areaID').find('option').remove();
      $('#areaID').append($('<option>').text('Выберите область').attr('value', 'null'));
      $.each(response['data'], function(i, value) {
         $('#areaID').append($('<option>').text(value['Description']).attr('value', value['Description']));
      });
    });
  });

  $('#areaID').change( function() {
    $('#cityID').find('option').remove();
    $('#cityID').prop('disabled', 'disabled');

    $('#addressID').find('option').remove();
    $('#addressID').append($('<option>').text('Выберите отделение').attr('value', 'Выберите отделение'));
    $('#addressID select').val('Выберите отделение');
    $('#addressID').prop('disabled', 'disabled');

    var area = $('#areaID').val();
    city_show(area);

    $('#cityID').prop('disabled', false);
  });

  $('#cityID').change( function() {
    $('#addressID').find('option').remove();
    $('#addressID select').val('Выберите отделение');

    var city = $('#cityID');
    var city_name = city.val();
    var cityRef = $('option:selected', city).attr('city_ref');

    warehouses_show(cityRef);
    $('#cityID').attr({'value': city_name, 'city_ref': cityRef});
    $('#addressID').prop('disabled', false);
  });

  $('#addressID').click( function() {
    var warehouse = $('#addressID');
    var warehouseRef = warehouse.val();
    var option = $('option:selected', warehouse).attr('address');
    $('#addressID').attr({'value': option, 'warehouse_ref': warehouseRef});
  });

  function warehouses_show(CityRef) {
    var settings = {
      "async": true,
      "crossDomain": true,
      "url": "https://api.novaposhta.ua/v2.0/json/",
      "method": "POST",
      "headers": {
        "content-type": "application/json",
      },
      "processData": false,
      "data": "{\"apiKey\": \"0768ba96d33e597f02eee417ff2538a9\", \"modelName\": \"AddressGeneral\",\"calledMethod\": \"getWarehouses\", \"methodProperties\":{\"CityRef\" : \"" + CityRef + "\"}}"
    }

    $.ajax(settings).done(function (response) {
      $('#addressID').find('option').remove();
      $.each(response['data'], function(i, value) {
         $('#addressID').append($('<option>').text(value['Description']).attr({'value': value['Description'], 'warehouse_ref': value['Ref']}));
      });
    });
  }

  function city_show(area) {
    var settings = {
      "async": true,
      "crossDomain": true,
      "url": "https://api.novaposhta.ua/v2.0/json/",
      "method": "POST",
      "headers": {
        "content-type": "application/json",
      },
      "processData": false,
      "data": "{\"apiKey\": \"0768ba96d33e597f02eee417ff2538a9\", \"modelName\": \"Address\",\"calledMethod\": \"getCities\"}"
    }

    $.ajax(settings).done(function (response) {
      $('#cityID').find('option').remove();
      $('#cityID').append($('<option>').text('Выберите город').attr('value', 'null'));
      $.each(response['data'], function(i, value) {
        if(value['AreaDescription'] == area){
         $('#cityID').append($('<option>').text(value['Description']).attr({'value': value['Description'], 'city_ref': value['Ref']}));
       }
      });
    });
  }
}

function tohomeDelivery () {
  $('.basket__order-input-delivery').css('display', 'inline-block');
}
