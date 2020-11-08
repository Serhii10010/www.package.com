var deliveryMethod = document.querySelector("#delivery");

$('#areaID').prop('disabled', 'disabled');
$('#cityID').prop('disabled', 'disabled');
$('#warehouseID').prop('disabled', 'disabled');

deliveryMethod.addEventListener('change', delivery);

function delivery() {

  if (deliveryMethod.value == 'np') {
    $('#areaID').css('display', 'inline-block');
    $('#cityID').css('display', 'inline-block');
    $('#warehouseID').css('display', 'inline-block');

    $('#areaID').prop('disabled', false);
    $('#cityID').prop('disabled', 'disabled');
    $('#warehouseID').prop('disabled', 'disabled');

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
        $('#cityID').append($('<option>').text('Выберите область').attr('value', 'null'));
        $.each(response['data'], function(i, value) {
           $('#areaID').append($('<option>').text(value['Description']).attr('value', value['Description']));
        });
      });
    });

    $('#areaID').change( function() {
      $('#cityID').find('option').remove();
      $('#cityID').prop('disabled', 'disabled');
      $('#cityID').prop('disabled', false);

      $('#warehouseID').find('option').remove();
      $('#warehouseID').append($('<option>').text('Выберите отделение').attr('value', 'Выберите отделение'));
      $('#warehouseID select').val('Выберите отделение');
      $('#warehouseID').prop('disabled', 'disabled');
      var area = $('#areaID').val();

      city_show(area);
    });

    $('#cityID').change( function() {
      $('#warehouseID').find('option').remove();
      $('#warehouseID').prop('disabled', false);
      $('#warehouseID select').val('Выберите отделение');

      var city = $('#cityID');
      var city_name = city.val();
      var cityRef = $('option:selected', city).attr('city_ref');

      warehouses_show(cityRef);
      $('#cityID').attr({'value': city_name, 'city_ref': cityRef});
    });

    $('#warehouseID').click( function() {
      var warehouse = $('#warehouseID');
      var warehouseRef = warehouse.val();
      var option = $('option:selected', warehouse).attr('address');
      $('#warehouseID').attr({'value': option, 'warehouse_ref': warehouseRef});
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
        $('#warehouseID').append($('<option>').text('Выберите адрес').attr('value', 'null'));
        $.each(response['data'], function(i, value) {
           $('#warehouseID').append($('<option>').text(value['Description']).attr({'value': value['Description'], 'warehouse_ref': value['Ref']}));
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
        $('#cityID').append($('<option>').text('Выберите город').attr('value', 'null'));
        $.each(response['data'], function(i, value) {
          if(value['AreaDescription'] == area){
           $('#cityID').append($('<option>').text(value['Description']).attr({'value': value['Description'], 'city_ref': value['Ref']}));
         }
        });
      });
    }

  }
  else if (deliveryMethod.value == 'pickup'){
    $('#areaID').css('display', 'none');
    $('#cityID').css('display', 'none');
    $('#warehouseID').css('display', 'none');

    //TODO: add fields for PICKUP way
    //use NP api for getting all cities from Ukraine
  }
}
