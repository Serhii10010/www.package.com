<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="css/app.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="slick/slick.css">
	<link rel="stylesheet" type="text/css" href="slick/slick-theme.css">
</head>
<body>
<header>
	<div class="container">
		<div class="header">
			<div class="header__logo">
				<p>LOGO</p>
			</div>
			<div class="header__contact">
				<div class="header__contact-tell">
					<a href="tel:"><img src="img/vector-phone.png">+38 066 666 6666</a>
					<a href="tel:">+38 066 666 6666</a>
				</div>
				<div class="header__contact-address">
					<p><img src="img/address-vector.png">{{__('г. Киев ул. Майдан независимости, 15А')}}</p>
				</div>
			</div>
			<div class="header__social">
				<a href="#"><img src="img/youtube.png"></a>
				<a href="#"><img src="img/facebook.png"></a>
				<a href="#"><img src="img/instagram.png"></a>
				<a href="#"><img src="img/viber.png"></a>
			</div>
			<div class="header__language">
				<p><a href="{{ route('cart.empty', 'ru') }}" id="header__language-a-rus">
						@if(app()->getLocale() == 'ru')
							<span locale="ru" value="ru">Рус</span>
						@else
							Рус
						@endif
					</a> | <a href="{{ route('cart.empty', 'ua') }}" id="header__language-a-ukr">
						@if(app()->getLocale() == 'ua')
							<span locale="ua" value="ua">Укр</span>
						@else
							Укр
						@endif
					</a></p>
			</div>
		</div>
		<div class="header__menu">
			<ul>
				<li><a href="#about">{{__('О нас')}}</a></li>
				<li><a href="#catalog">{{__('Продукция')}}</a></li>
				<li><a href="#print">{{__('Печать с логотипом')}}</a></li>
				<li><a href="#wholesale">{{__('Партнерам')}}</a></li>
				<li><a href="#review">{{__('Отзывы')}}</a></li>
				<li><a href="#footer">{{__('Контакты')}}</a></li>
			</ul>
			<div class="header__basket">
				<a id="basket">
					<img src="img/basket.png" alt="">
					@if(Cart::instance('default')->count() >= 0)
						<div class="basket-number" id="basket-number-1" cart-items-count>{{Cart::instance('default')->count()}}</div>
					@endif
				</a>
			</div>
		</div>
		<div class="header__mobile">
			<div class="header__mobile-container">
				<div class="hamburger-menu">
					<input id="menu__toggle" type="checkbox" />
					<label class="menu__btn" for="menu__toggle">
						<span></span>
					</label>
					<ul class="menu__box">
						<li><a href="#about" class="menu__item">{{__('О нас')}}</a></li>
						<li><a href="#catalog"class="menu__item">{{__('Продукция')}}</a></li>
						<li><a href="#print" class="menu__item">{{__('Печать с логотипом')}}</a></li>
						<li><a href="#wholesale" class="menu__item">{{__('Партнерам')}}</a></li>
						<li><a href="#review" class="menu__item">{{__('Отзывы')}}</a></li>
						<li><a href="#footer" class="menu__item">{{__('Контакты')}}</a></li>
					</ul>
				</div>
				<div class="header__mobile-logo">
					<p>LOGO</p>
				</div>
				<div class="header__basket">
					<a id="basket-mobile">
						<img src="img/basket.png" alt="">
					@if(Cart::instance('default')->count() >= 0)
							<div class="basket-number" id="basket-number-2">{{Cart::instance('default')->count()}}</div>
					@endif
				</div>
				</a>
			</div>
		</div>
	</div>
	</div>
</header>
<section id="order">
	<div class="container">
		<div class="order">
			<div class="order__title">
				<p><span class="fz-99">Пакеты<br></span><span class="fz-48">для хранения</span><br><span class="fz-158">ШИН</span></p>
				<a class="order__title-btn" href="#catalog">{{__('Заказать сейчас')}}</a>
			</div>
			<div class="order__img">
				<img src="img/bg-1-road.png">
			</div>
		</div>
	</div>
</section>
<section id="about">
	<div class="about-bg">
		<div class="container">
			<div class="about">
				<p class="about-title"><span>О</span> нас</p>
				<p class="about-subtitle">Мы производим пакеты для автомобильных колес. При производстве пакетов для шин мы используем только первинное сырье, что не дает возможность пакетам выделять неприятные запахи, при этом придавая пакету прочность.
															<br>Актуальное предложение для шиномонтажей, автосервисов и автосалонов. Этот пакет защитит салон автомобиля от грязи, во время сменны шин, также колесо в пакете можно удобно и практично хранить в гараже. На нашем складе всегда есть в наличии готовая продукция.
															<br>По вашему желанию можем изготовить пакеты для шин с печатью логотипа Вашей компании. Мы используем у тебя полноцветную печатную машину,с помощью которой есть возможность нанесение печати  – до 6 цветов.
															<br>К примеру, пакет с логотипом станет отличным подарком владельцу машины от СТО, магазина автозапчастей, или автосалона. Это напомнит клиенту о качественном обслуживании, и он обязательно к вам вернется.</p>
				<div class="about__items">
					<div class="about__item">
						<img src="img/about-shopping.png" alt="">
						<p>lorem ipsum</p>
					</div>
					<span></span>
					<div class="about__item">
						<img src="img/about-around.png" alt="">
						<p>lorem ipsum</p>
					</div>
					<span></span>
					<div class="about__item">
						<img src="img/about-award.png" alt="">
						<p>lorem ipsum</p>
					</div>
					<span></span>
					<div class="about__item">
						<img src="img/about-cash.png" alt="">
						<p>lorem ipsum</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="catalog">
	<div class="container">
		<div class="catalog">
			<p class="catalog-title"><span>Каталог</span> товаров</p>
			<div class="catalog-items">
				@foreach ($products as $product)
					<div class="catalog-item" catalog-item catalog-item-id="{{$product->id}}" catalog-item-price="{{$product->price}}">
						<div class="catalog-item-border">
							@if($product->material_description == 'Плотный')
								<div class="catalog-item-label">Плотный</div>
							@endif
							<img src="{{ asset('storage/'.$product->image) }}" alt="">
							<p class="catalog-item-title">{{$product->name}}</p>
							<div class="catalog-item-desc">
								<table>
									<tr>
										<td>{{__('Размер')}}</td>
										<td>{{ $product->size }}</td>
									</tr>
									<tr>
										<td>{{__('Радиус колеса')}}</td>
										<td>{{ $product->wheel_radius }}</td>
									</tr>
									<tr>
										<td>{{__('Упаковка')}}</td>
										<td>{{ $product->packaging }} шт.</td>
									</tr>
									<tr>
										<td>{{__('Цвет')}}</td>
										<td>{{ $product->color }}</td>
									</tr>
									<tr>
										<td>{{__('Материал')}}</td>
										<td>{{ $product->material }}</td>
									</tr>
								</table>
							</div>

							@if($product->is_available)
								<p class="catalog-availability">{{__('Есть в наличии')}}</p>
							@else
								<p class="catalog-availability">{{__('Нет в наличии')}}</p>
							@endif
						</div>
						@if(Cart::content()->where('id', $product->id) != '[]')
							<div class="catalog-price-add">
								<a>{{__('Товар в корзине')}}</a>
							</div>
						@elseif($product->price != '')
							@if($product->is_available)
								<div class="catalog-price">
									<span>{{ $product->price }} грн</span>
									<button type="submit" class="catalog-price-submit" catalog-item-order>{{__('Заказать')}}</button>
								</div>
								<div class="catalog-price-add-additional" >
									<a catalog-item-in-cart>{{__('Товар в корзине')}}</a>
								</div>
							@else
								<div class="catalog-price-check">
									<a class="catalog-price-check-btn">Уточнить цену</a>
								</div>
							@endif
						@else
							<div class="catalog-price-check">
								<a class="catalog-price-check-btn">Уточнить цену</a>
							</div>
						@endif
					</div>
				@endforeach
			</div>
		</div>
	</div>
</section>
<section id="print">
	<div class="print-bg">
		<div class="container">
			<div class="print">
				<p class="print__title"><span>Печать</span><br>С логотипом</p>
				<div class="print__desc">
					<div class="print__desc-text">
						<p>Наносим печать<br> на пакеты</p>
						<span>Тираж от <span class="bold">3 000 шт</span></span>
					</div>
					<div class="print__desc-img">
						<img src="img/print.png" alt="">
					</div>
				</div>
				<div class="print__portfolio">
					<p class="print__portfolio-title">Портфолио</p>
					<div class="print__portfolio-slider">
						@foreach ($portfolios as $portfolio)
							{{-- <div class="print__portfolio-slider-slide-content"><img src="{{ asset('storage/'.$portfolio->image) }}"></div> --}}
						@endforeach
						<div class="print__portfolio-slider-slide-content"><img src="img/slider-img.png"></div>
						<div class="print__portfolio-slider-slide-content"><img src="img/slider-img.png"></div>
						<div class="print__portfolio-slider-slide-content"><img src="img/slider-img.png"></div>
						<div class="print__portfolio-slider-slide-content"><img src="img/slider-img.png"></div>
						<div class="print__portfolio-slider-slide-content"><img src="img/slider-img.png"></div>
						<div class="print__portfolio-slider-slide-content"><img src="img/slider-img.png"></div>
						<div class="print__portfolio-slider-slide-content"><img src="img/slider-img.png"></div>
						<div class="print__portfolio-slider-slide-content"><img src="img/slider-img.png"></div>
						<div class="print__portfolio-slider-slide-content"><img src="img/slider-img.png"></div>
						<div class="print__portfolio-slider-slide-content"><img src="img/slider-img.png"></div>
						<div class="print__portfolio-slider-slide-content"><img src="img/slider-img.png"></div>
						<div class="print__portfolio-slider-slide-content"><img src="img/slider-img.png"></div>
					</div>
					<div class="print__portfolio-nav">
						<div class="print__portfolio-nav-inner"></div>
					</div>
				</div>
				<div class="print__order">
					<p class="print__order-title">Закажите печать на пакеты</p>
					<p class="print__order-subtitle">Мы перезвоним Вам в течение 15 минут</p>
					<form method="POST" action="{{ route('messout.sendmessage', app()->getLocale()) }}">
						{{ csrf_field() }}
						<input type="hidden" name="message_theme" value="PRINT">
						<div class="print__order-form-input">
							<input type="text" placeholder="Имя" class="print__order-form-input-name" name="name" value="" required>
							<input type="tel" name="tel" value="" placeholder="+38 (000) 00-00-000" class="print__order-form-input-phone phone" required>
							<button type="submit" class="print__order-form-input-btn">Отправить &nbsp;</button>
						</div>
						<div class="print__order-form-checkbox">
							<input type="checkbox" id="checkbox1" name="checkbox" required>
							<label for="checkbox1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</label>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="wholesale">
	<div class="container">
		<div class="wholesale">
			<div class="wholesale__text">
				<p class="wholesale__text-title"><span>{{__('Хотите купить')}}</span><br>оптом?</p>
				<p class="wholesale__text-subtitle">У нас гибкая система скидок для диллеров и магазинов</p>
			</div>
			<div class="wholesale__form">
				<form method="POST" action="{{ route('messout.sendmessage', app()->getLocale()) }}">
					{{ csrf_field() }}
					<input type="hidden" name="message_theme" value="OPT_PARTNER">
					<input type="text" name="name" value="" placeholder="Имя" class="wholesale__form-input-name" required>
					<input type="tel" name="tel" value="" placeholder="+38 (000) 00-00-000" class="wholesale__form-input-phone phone" required>
					<button type="submit" class="wholesale__form-input-btn">Стать партнером &nbsp;</button>
					<div class="print__order-form-checkbox">
						<input type="checkbox" id="checkbox2" name="checkbox" required>
						<label for="checkbox2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</label>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<section id="benefits">
	<div class="container">
		<div class="benefits">
			<p class="benefits__title"><span>Преимущества</span><br>пакета для шин</p>
			<div class="benefits__items">
				<div class="benefits-item">
					<div>
						<p class="benefits__items-digit">01</p>
						<p class="benefits__items-desc">lorem ipsum</p>
					</div>
					<div>
						<p class="benefits__items-digit">02</p>
						<p class="benefits__items-desc">lorem ipsum</p>
					</div>
					<div>
						<p class="benefits__items-digit">03</p>
						<p class="benefits__items-desc">lorem ipsum</p>
					</div>
				</div>
				<img src="img/benefit.png">
				<div class="benefits-item">
					<div>
						<p class="benefits__items-desc">lorem ipsum</p>
						<p class="benefits__items-digit">04</p>
					</div>
					<div>
						<p class="benefits__items-desc">lorem ipsum</p>
						<p class="benefits__items-digit">05</p>
					</div>
					<div>
						<p class="benefits__items-desc">lorem ipsum</p>
						<p class="benefits__items-digit">06</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="review">
	<div class="container">
		<div class="review">
			<p class="review__title">Отзывы</p>
			<div class="review-slider">
				@foreach ($reviews as $review)
					<div class="review-slider-slide-content">
						<div class="review-slider-slide-content-top">
							{{-- <img src="{{ asset('storage/'.$review->photo) }}"> --}}
							<p class="review-slider-slide-content-name">{{$review->fio}}</p>
						</div>
						<div>
							<p class="review-slider-slide-content-review">{{$review->review}}</p>
						</div>
					</div>
				@endforeach
				<div class="review-slider-slide-content">
					<div class="review-slider-slide-content-top">
						<img src="img/avatar.png">
						<p class="review-slider-slide-content-name">lorem ipsum</p>
					</div>
					<div>
						<p class="review-slider-slide-content-review">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
					</div>
				</div>
				<div class="review-slider-slide-content">
					<div class="review-slider-slide-content-top">
						<img src="img/avatar.png">
						<p class="review-slider-slide-content-name">lorem ipsum</p>
					</div>
					<div>
						<p class="review-slider-slide-content-review">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
					</div>
				</div>
				<div class="review-slider-slide-content">
					<div class="review-slider-slide-content-top">
						<img src="img/avatar.png">
						<p class="review-slider-slide-content-name">lorem ipsum</p>
					</div>
					<div>
						<p class="review-slider-slide-content-review">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
					</div>
				</div>
				<div class="review-slider-slide-content">
					<div class="review-slider-slide-content-top">
						<img src="img/avatar.png">
						<p class="review-slider-slide-content-name">lorem ipsum</p>
					</div>
					<div>
						<p class="review-slider-slide-content-review">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
					</div>
				</div>
			</div>
			<div class="review-nav">
				<div class="review-nav-inner"></div>
			</div>
		</div>
	</div>
</section>
<section id="cooperation">
	<div class="container">
		<div class="cooperation">
			<p class="cooperation__title"><span>С нами </span>работают</p>
			<div class="cooperation-slider">
				@foreach ($partners as $partner)
					<div>
						{{-- <img src="{{ asset('storage/'.$partner->image) }}"> --}}
					</div>
				@endforeach
				<div>
					<img src="img/malte.png">
				</div>
				<div>
					<img src="img/malte.png">
				</div>
				<div>
					<img src="img/malte.png">
				</div>
				<div>
					<img src="img/malte.png">
				</div>
				<div>
					<img src="img/malte.png">
				</div>
				<div>
					<img src="img/malte.png">
				</div>
				<div>
					<img src="img/malte.png">
				</div>
				<div>
					<img src="img/malte.png">
				</div>
			</div>
		</div>
	</div>
</section>
<section id="footer">
	<div class="container">
		<p class="footer__title"><span>Остались</span> вопросы?</p>
		<div class="footer">
			<div class="footer-contact">
				<p class="footer-contact-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a</p>
				<div class="footer-contacts">
					<div class="footer-contacts-tell">
						<a href="tel:"><img src="img/vector-phone.png">+38 066 666 6666</a>
						<a href="tel:"><img src="img/vector-phone.png">+38 066 666 6666</a>
						<a href="mail:"><img src="img/email.png">paketi@gmail.com</a>
					</div>
					<div class="footer-contacts-address">
						<p class="footer-contacts-address-p"><img src="img/address-vector.png">г. Киев ул. Майдан<br> независимости, 15 А</p>
						<div class="footer-social">
							<a href="#"><img src="img/youtube.png"></a>
							<a href="#"><img src="img/facebook.png"></a>
							<a href="#"><img src="img/instagram.png"></a>
							<a href="#"><img src="img/viber.png"></a>
						</div>
					</div>
				</div>

				<div class="footer-form">
					<form method="POST" action="{{ route('messout.sendmessage', app()->getLocale()) }}">
						{{ csrf_field() }}
						<input type="hidden" name="message_theme" value="QUESTIONS">
						<div class="footer-form-input">
							<input type="text" name="name" value="" placeholder="Имя" class="footer-form-input-name" required>
							<input  type="tel" name="tel" value="" placeholder="+7 ( _ _ _ )  _ _ _   _ _ _ _" class="footer-form-input-phone phone" required>
							<button type="submit" class="footer-form-input-btn">Отправить &nbsp;</button>
						</div>
						<div class="footer-form-checkbox">
							<input type="checkbox" name ="checkbox" id="checkbox3" required>
							<label for="checkbox3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</label>
						</div>
					</form>
				</div>
			</div>
			<div class="footer-card">
				<img src="img/card.png">
			</div>
		</div>
	</div>
</section>

<section id="popup__basket">
	<div class="popup__basket-content">
		<a class="close" id="close">X</a>
		<p class="popup__basket-title">Корзина</p>
		<div class="basket">
			<div class="basket__title">
				<div class="basket__title-item name">Название</div>
				<div class="basket__title-item characteristics">Характеристики</div>
				<div class="basket__title-item price">Цена, грн за 1 шт.</div>
				<div class="basket__title-item number">Кол-во</div>
				<div class="basket__title-item units">Ед.</div>
				<div class="basket__title-item subtotal">Итого, грн</div>
			</div>
			<div class="basket__product" id="basket__product" basket-items>
				<div class="basket__product-container" id="basket__product-container" data-id="rowId" style="display:none;" cart-item-new>
					<div class="basket__product-desc name">
						<p class="basket__product-desc-title" cart-item-name></p>
						<div class="basket__img">
							<img src="img/78927403_pakety-dlya-shin_5.png" cart-item-image>
						</div>
							<p class="basket__product-desc-min" cart-item-min-order-qty>
								Минимальный заказ 200 шт
							</p>
					</div>
					<div class="basket__product-desc characteristics">
						<table>
							<tr>
								<td>Размер</td>
								<td class="basket__product-size" cart-item-size></td>
							</tr>
							<tr>
								<td>Радиус колеса</td>
								<td class="basket__product-wheel_radius" cart-item-wheel-radius></td>
							</tr>
							<tr>
								<td>Упаковка</td>
								<td class="basket__product-packaging" cart-item-packaging></td>
							</tr>
							<tr>
								<td>Цвет</td>
								<td class="basket__product-color" cart-item-color></td>
							</tr>
							<tr>
								<td>Материал</td>
								<td class="basket__product-material" cart-item-material></td>
							</tr>
						</table>
					</div>
					<div class="basket__product-desc price" cart-item-price></div>
					<div class="basket__product-desc number">
						<div class="quantity-block">
							<a class="quantity-arrow-minus minus" cart-item-minus cart-item-change-quantity><img src="img/minus.png"></a>
							<input class="quantity-num" type="number" value="" min="1" cart-item-quantity/>
							<a class="quantity-arrow-plus plus" cart-item-plus cart-item-change-quantity><img src="img/plus.png"></a>
						</div>
					</div>
					<div class="basket__product-desc units">шт.</div>
					<div class="basket__product-desc subtotal" cart-item-subtotal></div>
					<a class="delete-item" id="delete-item" cart-item-delete>X</a>
				</div>
				<div class="basket-finish-price">
					<p><span class="basket-finish-price-units" cart-items-count></span> товара(ов) на сумму <span class="basket-finish-price-total" cart-total-price></span><span class="basket-finish-price-total">грн</span></p>
				</div>
				<div class="basket-btn">
					<div>
						<form class="" action="{{ route('checkout.index', app()->getLocale()) }}" method="get">
							<button class="basket-btn-continue" id="basket-btn-continue">Оформить заказ</button>
						</form>
						<button class="basket-btn-return" id="basket-btn-return">Продолжить покупки</button>
					</div>
					<div>
						<button class="basket-btn-continue" id="basket-btn-continue" clear-cart>Очистить корзину</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="basket__order">
	<div class="basket__order-content">
		<a class="close" id="close-order">X</a>
		<p class="basket__order-title">Оформление заказа</p>
		<form action="{{ route('checkout.store', app()->getLocale()) }}" method="post">
			{{ csrf_field() }}
			<div class="basket__order-form">
				<div class="basket__order-data-recipient">
					<p class="basket__order-data-title">Данные получателя</p>
					<div>
						<input type="hidden" name="message_theme" value="ORDER_MAIN">
						<input type="text" name="name" value="" placeholder="Имя" class="basket__order-input-name" required>
						<input type="text" name="surname" value="" placeholder="Фамилия" class="basket__order-input-name" required>
						<input type="text" name="patronimic" value="" placeholder="Отчество" class="basket__order-input-name" required>
						<input type="tel" name="tel" value="" placeholder="+7 ( _ _ _ )  _ _ _   _ _ _ _" class="basket__order-input-phone phone" required>
						<label class="sales">Не пропустите выгодные предложения</label>
						<input type="email" name="email" value="" placeholder="E-mail" class="basket__order-input-email" required>
						<p class="news">Узнавайте первым про  акции, скидки и спецпредложения</p>
					</div>
				</div>
				<div class="basket__order-data-delivery">
					<p class="basket__order-data-delivery-title">Способ доставки</p>
					<div>
						<select id="delivery" name="delivery_method">
							<option value="null">Способ доставки</option>
							<option value="CAT">CAT</option>
							<option value="ukrPoshta">Укрпочта</option>
							<option value="Delivery">Delivery</option>
							<option value="Pickup">Самовывоз</option>
							<option value="NP">NP</option>
						</select>
						<select id="areaID" name="area_name" required>
							<option value="" disabled selected hidden>Выберите оласть</option>
						</select>
						<select id="cityID" name="delivery_city" required>
							<option value="" disabled selected hidden>Выберите город</option>
						</select>
						<select id="warehouseID" name="delivery_address" required>
							<option value="" disabled selected hidden>Выберите отделение</option>
						</select>
						<input type="hidden" name="delivery-method" value="" id="delivery__method">
						<textarea placeholder="Комментарий к заказу" name="comment"></textarea>
					</div>
				</div>
			</div>
			<div class="basket-order">
				<div class="basket__title">
					<div class="basket__title-item name">Название</div>
					<div class="basket__title-item characteristics">Характеристики</div>
					<div class="basket__title-item price">Цена, грн за 1 шт.</div>
					<div class="basket__title-item number">Кол-во</div>
					<div class="basket__title-item units">Ед.</div>
					<div class="basket__title-item total">Итого, грн</div>
				</div>
				<div class="basket__product" id="basket__product_checkout" basket-items>
					<div class="basket-finish-price">
						<p><span class="basket-finish-price-units" cart-items-count></span> товара(ов) на сумму <span class="basket-finish-price-total" cart-total-price></span> <span class="basket-finish-price-total">грн</span></p>
					</div>
					<div class="basket-btn-order">
						<button type="submit" class="basket-btn-accept">Оформить заказ</button>
						<p>Подтверждая заказ вы соглашаетесь с <a href="">политикой конфиденциальности</a></p>
					</div>
				</div>
			</div>
		</form>
	</div>
</section>
<section id="popup">
	<div class="popup__container">
		<div class="popup__content">
			<a class="close" id="close-popup">X</a>
			<p class="popup__title">Отправте заявку</p>
			<p class="popup__subtitle">и мы свяжемся с Вами в течении 30 минут</p>
			<form action="{{ route('messout.sendmessage', app()->getLocale()) }}" method="post">
				{{ csrf_field() }}
				<input type="hidden" name="message_theme" value="PRICE_QUESTION">
				<input type="text" name="name" value="" placeholder="Имя" class="basket__order-input-name" required>
				<input type="tel" name="tel" value="" placeholder="+7 ( _ _ _ )  _ _ _   _ _ _ _" class="basket__order-input-phone phone" required>
				<button type="submit">Свяжитесь с нами</button>
			</form>
		</div>
	</div>
</section>


<section id="popup-mistake">
	<div class="popup__container">
		<div class="popup__content">
			<a class="close" id="close-mistake">X</a>
			<p class="popup__title-mistake">Проверьте правильность заполнений данных о доставке</p>
		</div>
	</div>
</section>

<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<script src="{{ asset('slick/slick.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/delivery_script.js') }}"></script>
<script src="{{ asset('js/testCart.js') }}"></script>
@if(session('open_cart') == 'open_cart')
	<script type="text/javascript">
		(function(){
			document.querySelector("#basket__order").style.display = "block";
		})();
	</script>
@endif
@if(session('cart_error') == 'cart_error')
	<script type="text/javascript">
		(function(){
			document.querySelector("#popup-mistake").style.display = "block";
		})();
	</script>
@endif
</body>
</html>
