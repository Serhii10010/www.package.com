<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>{{ config('app.name', 'Tire packages') }}</title>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700;800&display=swap" rel="stylesheet">
</head>
<body>
	<h3>Тип: {{$theme}}.</h3>
  <br>
	<h3>Ім'я':  {{$name}}.</h3>
	<h3>Прізвище:  {{$surname}}.</h3>
	<h3>Email:  {{$email}}.</h3>
	<h3>Телефон: {{$phone}}.</h3>
	<h3>Коментар: {{$comment}}.</h3>
  <br>
	<h3>Доставка: {{$delivery['delivery_way']}}.</h3>
	<h3>Область: {{$delivery['area']}}.</h3>
	<h3>Місто: {{$delivery['city']}}.</h3>
	<h3>Адреса: {{$delivery['address']}}.</h3>
  <h3>Товарів у корзині: {{$count}}</h3>
  <h3>Ціна за все: {{$cart_total}}</h3>
	<br>
	<br>
  @foreach ($cart as $item)
    <div class="basket__product-container">
      <div class="basket__product-desc name">
        <h4>Product ID: {{ $item['productId'] }}</h4>
      </div>
			<div class="count">
				<p>Кількість: {{ $item['count'] }}</p>
			</div>
      <div class="basket__product-desc characteristics">
				<div class="basket__product-desc price">Ціна: {!! $item['price'] !!}</div>
				<div class="bastet__product-desc subtotal">Всього за продукт: {!! $item['total'] !!}</div>
      </div>
    </div>
  @endforeach

</body>
</html>
