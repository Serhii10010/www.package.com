<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>{{ config('app.name', 'Tire packages') }}</title>
  <link rel="stylesheet" type="text/css" href="../css/app.css">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700;800&display=swap" rel="stylesheet">
</head>
<body>
	<h3>Тип: {{$theme}}.                        </h3>
	<h3>Успех: {{$success}}.                    </h3>
  <br>
	<h3>Имя:  {{$name}}.                        </h3>
	<h3>Фамилия:  {{$surname}}.                 </h3>
	<h3>Отчество:  {{$patronymic}}.             </h3>
	<h3>Email:  {{$email}}.                    </h3>
	<h3>Телефон: {{$tel}}.                       </h3>
	<h3>Комментарий: {{$comment}}.                 </h3>
  <br>
	<h3>Delivery: {{$delivery['delivery_way']}}.</h3>
	<h3>Area name: {{$delivery['area_name']}}.   </h3>
	<h3>City name: {{$delivery['city_name']}}.</h3>
	<h3>Warehouse: {{$delivery['warehouse']}}.</h3>
  <h3>Товаров в корзине: {{$count}}</h3>
  <h3>Цена за всё: {{$total_price}}</h3>

  @foreach ($cart_products as $item)
    <div class="basket__product-container">
      <div class="basket__product-desc name">
        <p class="basket__product-desc-title">{{$item->name}}</p>
        <h4>Product ID: {{$item->id}}</h4>
        <p class="basket__product-desc-min">Минимальный заказ @if($item->options->min_quantity != null) {{$item->options->min_quantity}} @else 200 @endif шт</p>
      </div>
      <div class="basket__product-desc characteristics">
        <table>
          <tr>
            <td>Размер</td>
            <td>{!! $item->options->size !!}</td>
          </tr>
          <tr>
            <td>Радиус колеса</td>
            <td>{!! $item->options->wheel_radius !!}</td>
          </tr>
          <tr>
            <td>Упаковка</td>
            <td>{!! $item->options->packaging !!}</td>
          </tr>
          <tr>
            <td>Цвет</td>
            <td>{!! $item->options->color !!}</td>
          </tr>
          <tr>
            <td>Материал</td>
            <td>{!! $item->options->material !!}</td>
          </tr>
          <tr>
            <td><div class="basket__product-desc price">{!! $item->price / $item->options->packaging !!}</div></td>
            <td><div class="bastet__product-desc units">за шт.</div></td>
          </tr>
          <tr>
            <td>
              За всё
            </td>
            <td>
              <div class="bastet__product-desc subtotal">{!! $item->subtotal  !!}</div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  @endforeach

</body>
</html>
