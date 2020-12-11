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
	<style>
	.preloader {
	    background-color: #fff;
	    position: fixed;
	    top: 0;
	    right: 0;
	    bottom: 0;
	    left: 0;
	    z-index: 1000;
	}
	.preloader__loader {
	    position: absolute;
	    top: 50%;
	    left: 50%;
	    transform: translate(-50%, -50%)
	}
	</style>
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
					<a href="tel:"><img src="images/vector-phone.png">+38 066 666 6666</a>
					<a href="tel:">+38 066 666 6666</a>
				</div>
				<div class="header__contact-address">
					<p><img src="images/address-vector.png">{{__('г. Киев ул. Майдан независимости, 15А')}}</p>
				</div>
			</div>
			<div class="header__social">
				<a href="#"><img src="images/youtube.png"></a>
				<a href="#"><img src="images/facebook.png"></a>
				<a href="#"><img src="images/instagram.png"></a>
				<a href="#"><img src="images/viber.png"></a>
			</div>
			<div class="header__language" locale=@if (app()->getLocale() == 'ru') "ru" @else "ua" @endif>
				<p><a locale-ru>
						@if(app()->getLocale() == 'ru')
							<span>Рус</span>
						@else
							Рус
						@endif
					</a> | <a locale-ua>
						@if(app()->getLocale() == 'ua')
							<span>Укр</span>
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
					<img src="images/basket.png" alt="">
					<div class="basket-number" cart-items-count></div>
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
						<li><a href="#about" class="menu__item" menu-mobile>{{__('О нас')}}</a></li>
						<li><a href="#catalog"class="menu__item" menu-mobile>{{__('Продукция')}}</a></li>
						<li><a href="#print" class="menu__item" menu-mobile>{{__('Печать с логотипом')}}</a></li>
						<li><a href="#wholesale" class="menu__item" menu-mobile>{{__('Партнерам')}}</a></li>
						<li><a href="#review" class="menu__item" menu-mobile>{{__('Отзывы')}}</a></li>
						<li><a href="#footer" class="menu__item" menu-mobile>{{__('Контакты')}}</a></li>
					</ul>
				</div>
				<div class="header__mobile-logo">
					<p>LOGO</p>
				</div>
				<div class="header__basket">
					<a id="basket-mobile">
						<img src="images/basket.png" alt="">
						<div class="basket-number" cart-items-count></div>
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
				<p><span class="fz-99">{{__('Пакеты')}}<br></span><span class="fz-48">{{__('для хранения')}}</span><br><span class="fz-158">ШИН</span></p>
				<a class="order__title-btn" href="#catalog">{{__('Заказать сейчас')}}</a>
			</div>
			<div class="order__img">
				<img src="images/bg-1-road.png">
			</div>
		</div>
	</div>
</section>
<section id="about">
	<div class="about-bg">
		<div class="container">
			<div class="about">
				<p class="about-title"><span>{{__('О')}}</span> нас</p>
				<p class="about-subtitle">{{__('Мы производим пакеты для автомобильных колес. При производстве пакетов для шин мы используем только первинное сырье, что не дает возможность пакетам выделять неприятные запахи, при этом придавая пакету прочность.')}}
															<br>{{__('Актуальное предложение для шиномонтажей, автосервисов и автосалонов. Этот пакет защитит салон автомобиля от грязи, во время сменны шин, также колесо в пакете можно удобно и практично хранить в гараже. На нашем складе всегда есть в наличии готовая продукция.')}}
															<br>{{__('По вашему желанию можем изготовить пакеты для шин с печатью логотипа Вашей компании. Мы используем у тебя полноцветную печатную машину,с помощью которой есть возможность нанесение печати  – до 6 цветов.')}}
															<br>{{__('К примеру, пакет с логотипом станет отличным подарком владельцу машины от СТО, магазина автозапчастей, или автосалона. Это напомнит клиенту о качественном обслуживании, и он обязательно к вам вернется.')}}</p>
				<div class="about__items">
					<div class="about__item">
						<img src="images/about-shopping.png" alt="">
						<p>lorem ipsum</p>
					</div>
					<span></span>
					<div class="about__item">
						<img src="images/about-around.png" alt="">
						<p>lorem ipsum</p>
					</div>
					<span></span>
					<div class="about__item">
						<img src="images/about-award.png" alt="">
						<p>lorem ipsum</p>
					</div>
					<span></span>
					<div class="about__item">
						<img src="images/about-cash.png" alt="">
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
			<p class="catalog-title"><span>Каталог</span> {{__('товаров')}}</p>
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
						@if($product->price != '')
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
				<p class="print__title"><span>{{__('Печать')}}</span><br>{{__('С логотипом')}}</p>
				<div class="print__desc">
					<div class="print__desc-text">
						<p>{{__('Наносим печать')}}<br> {{__('на пакеты')}}</p>
						<span>Тираж {{__('от')}} <span class="bold">3 000 шт</span></span>
					</div>
					<div class="print__desc-img">
						<img src="images/print.png" alt="">
					</div>
				</div>
				<div class="print__portfolio">
					<p class="print__portfolio-title">{{__('Портфолио')}}</p>
					<div class="print__portfolio-slider">
						@foreach ($portfolios as $portfolio)
							<div class="print__portfolio-slider-slide-content"><img src="{{ asset('storage/'.$portfolio->image) }}"></div>
						@endforeach
						<div class="print__portfolio-slider-slide-content"><img src="images/slider-img.png"></div>
						<div class="print__portfolio-slider-slide-content"><img src="images/slider-img.png"></div>
						<div class="print__portfolio-slider-slide-content"><img src="images/slider-img.png"></div>
						<div class="print__portfolio-slider-slide-content"><img src="images/slider-img.png"></div>
						<div class="print__portfolio-slider-slide-content"><img src="images/slider-img.png"></div>
						<div class="print__portfolio-slider-slide-content"><img src="images/slider-img.png"></div>
						<div class="print__portfolio-slider-slide-content"><img src="images/slider-img.png"></div>
						<div class="print__portfolio-slider-slide-content"><img src="images/slider-img.png"></div>
						<div class="print__portfolio-slider-slide-content"><img src="images/slider-img.png"></div>
						<div class="print__portfolio-slider-slide-content"><img src="images/slider-img.png"></div>
						<div class="print__portfolio-slider-slide-content"><img src="images/slider-img.png"></div>
						<div class="print__portfolio-slider-slide-content"><img src="images/slider-img.png"></div>
					</div>
					<div class="print__portfolio-nav">
						<div class="print__portfolio-nav-inner"></div>
					</div>
				</div>
				<div class="print__order">
					<p class="print__order-title">{{__('Закажите печать на пакеты')}}</p>
					<p class="print__order-subtitle">{{__('Мы перезвоним Вам в течение 15 минут')}}</p>
					<form method="post" action="{{route("messout", app()->getLocale())}}">
						{{ csrf_field() }}
						<input type="hidden" name="message_theme" value="Замовлення прінта на пакети">
						<div class="print__order-form-input">
							<input type="text" placeholder="Имя" class="print__order-form-input-name" name="name" required>
							<input type="tel" name="phone" value="" placeholder="+38 (000) 00-00-000" class="print__order-form-input-phone phone" required>
							<button type="submit" class="print__order-form-input-btn">{{__('Заказать')}} &nbsp;</button>
						</div>
						<div class="print__order-form-checkbox">
							<input type="checkbox" id="checkbox1" name="checkbox" value="Перезвоните в течении 15 минут!">
							<label for="checkbox1">{{__('Перезвоните в течении 15 минут!')}}</label>
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
				<p class="wholesale__text-subtitle">{{__('У нас гибкая система скидок для диллеров и магазинов')}}</p>
			</div>
			<div class="wholesale__form">
				<form method="post" action="{{route("messout", app()->getLocale())}}">
					{{ csrf_field() }}
					<input type="hidden" name="message_theme" value="Можливий ОПТ партнер">
					<input type="text" name="name" value="" placeholder="Имя" class="wholesale__form-input-name" required>
					<input type="tel" name="phone" value="" placeholder="+38 (000) 00-00-000" class="wholesale__form-input-phone phone" required>
					<button type="submit" class="wholesale__form-input-btn">{{__('Стать партнером')}} &nbsp;</button>
					<div class="print__order-form-checkbox">
						<input type="checkbox" id="checkbox2" name="checkbox" value="Перезвоните в течении 15 минут!">
						<label for="checkbox2">{{__('Перезвоните в течении 15 минут!')}}</label>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<section id="benefits">
	<div class="container">
		<div class="benefits">
			<p class="benefits__title"><span>{{__('Преимущества')}}</span><br>пакета для шин</p>
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
				<img src="images/benefit.png">
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
			<p class="review__title">{{__('Отзывы')}}</p>
			<div class="review-slider">
				@foreach ($reviews as $review)
					<div class="review-slider-slide-content">
						<div class="review-slider-slide-content-top">
							<img src="{{ asset('storage/'.$review->photo) }}">
							<p class="review-slider-slide-content-name">{{$review->fio}}</p>
						</div>
						<div>
							<p class="review-slider-slide-content-review">{{$review->review}}</p>
						</div>
					</div>
				@endforeach
				<div class="review-slider-slide-content">
					<div class="review-slider-slide-content-top">
						<img src="images/avatar.png">
						<p class="review-slider-slide-content-name">lorem ipsum</p>
					</div>
					<div>
						<p class="review-slider-slide-content-review">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
					</div>
				</div>
				<div class="review-slider-slide-content">
					<div class="review-slider-slide-content-top">
						<img src="images/avatar.png">
						<p class="review-slider-slide-content-name">lorem ipsum</p>
					</div>
					<div>
						<p class="review-slider-slide-content-review">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
					</div>
				</div>
				<div class="review-slider-slide-content">
					<div class="review-slider-slide-content-top">
						<img src="images/avatar.png">
						<p class="review-slider-slide-content-name">lorem ipsum</p>
					</div>
					<div>
						<p class="review-slider-slide-content-review">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
					</div>
				</div>
				<div class="review-slider-slide-content">
					<div class="review-slider-slide-content-top">
						<img src="images/avatar.png">
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
			<p class="cooperation__title"><span>{{__('С нами')}} </span>{{__('работают')}}</p>
			<div class="cooperation-slider">
				@foreach ($partners as $partner)
					<div>
						<img src="{{ asset('storage/'.$partner->image) }}">
					</div>
				@endforeach
				<div>
					<img src="images/malte.png">
				</div>
				<div>
					<img src="images/malte.png">
				</div>
				<div>
					<img src="images/malte.png">
				</div>
				<div>
					<img src="images/malte.png">
				</div>
				<div>
					<img src="images/malte.png">
				</div>
				<div>
					<img src="images/malte.png">
				</div>
				<div>
					<img src="images/malte.png">
				</div>
				<div>
					<img src="images/malte.png">
				</div>
			</div>
		</div>
	</div>
</section>
<section id="footer">
	<div class="container">
		<p class="footer__title"><span>{{__('Остались')}}</span> {{__('вопросы')}}?</p>
		<div class="footer">
			<div class="footer-contact">
				<p class="footer-contact-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a</p>
				<div class="footer-contacts">
					<div class="footer-contacts-tell">
						<a href="tel:"><img src="images/vector-phone.png">+38 066 666 6666</a>
						<a href="tel:"><img src="images/vector-phone.png">+38 066 666 6666</a>
						<a href="mail:"><img src="images/email.png">paketi@gmail.com</a>
					</div>
					<div class="footer-contacts-address">
						<p class="footer-contacts-address-p"><img src="images/address-vector.png">{{__('г. Киев ул. Майдан')}}<br> {{__('независимости, 15А')}}</p>
						<div class="footer-social">
							<a href="#"><img src="images/youtube.png"></a>
							<a href="#"><img src="images/facebook.png"></a>
							<a href="#"><img src="images/instagram.png"></a>
							<a href="#"><img src="images/viber.png"></a>
						</div>
					</div>
				</div>

				<div class="footer-form">
					<form method="POST" action="{{route('messout', app()->getLocale())}}">
						{{ csrf_field() }}
						<input type="hidden" name="message_theme" value="ЗАЛИШИЛИСЬ ПИТАННЯ">
						<div class="footer-form-input">
							<input type="text" name="name" value="" placeholder="Имя" class="footer-form-input-name" required>
							<input  type="tel" name="phone" value="" placeholder="+38 ( _ _ _ )  _ _ _   _ _ _ _" class="footer-form-input-phone phone" required>
							<button type="submit" class="footer-form-input-btn">{{__('Задать вопрос')}} &nbsp;</button>
						</div>
						<div class="footer-form-checkbox">
							<input type="checkbox" name ="checkbox" id="checkbox3" value="Перезвоните в течении 15 минут!">
							<label for="checkbox3">{{__('Перезвоните в течении 15 минут!')}}</label>
						</div>
					</form>
				</div>
			</div>
			<div class="footer-card">
				<img src="images/card.png">
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
				<div class="delete"></div>
			</div>
			<div class="basket__product" id="basket__product" basket-items>
				<div class="basket-finish-price">
					<p><span class="basket-finish-price-units" cart-items-count></span> товара(ов) на сумму <span class="basket-finish-price-total" cart-total-price></span><span class="basket-finish-price-total"> грн</span></p>
				</div>
				<div class="basket-btn">
					<div>
						<button class="basket-btn-continue cart-prepare-order" id="basket-btn-continue" cart-prepare-order>Оформить заказ</button>
						<button class="basket-btn-return" id="basket-btn-return">Продолжить покупки</button>
					</div>
					<div>
						<button class="basket-btn-continue cart-clear" clear-cart>Очистить корзину</button>
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
		<form order-form>
			{{ csrf_field() }}
			<div class="basket__order-form">
				<div class="basket__order-data-recipient">
					<p class="basket__order-data-title">Данные получателя</p>
					<div>
						<input type="text" name="name" value="" placeholder="Имя" class="basket__order-input-name" required order-customer-name>
						<input type="text" name="surname" value="" placeholder="Фамилия" class="basket__order-input-name" required order-customer-surname>
						<input type="tel" name="tel" value="" placeholder="+ 38 ( _ _ _ )  _ _  _ _  _ _ _" class="basket__order-input-phone phone" required order-customer-phone>
						<label class="sales">Не пропустите выгодные предложения</label>
						<input type="email" name="email" value="" placeholder="E-mail" class="basket__order-input-email" order-customer-email>
						<p class="news">Узнавайте первым про  акции, скидки и спецпредложения</p>
					</div>
				</div>
				<div class="basket__order-data-delivery">
					<p class="basket__order-data-delivery-title">Способ доставки</p>
					<div>
						<select id="delivery" name="delivery_method" order-delivery-way>
							<option value="null">Способ доставки</option>
							<option value="tohome">Курьером</option>
							<option value="np">NP</option>
						</select>
						<select id="areaID" name="area_name" order-area>
							<option value="" disabled selected hidden>Выберите область</option>
						</select>
						<select id="cityID" name="delivery_city" order-city>
							<option value="" disabled selected hidden>Выберите город</option>
						</select>
						<select id="addressID" name="delivery_address" order-address>
							<option value="" disabled selected hidden>Выберите отделение</option>
						</select>
						<input type="text" placeholder="Область" class="basket__order-input-delivery" order-area>
						<input type="text" placeholder="Город" class="basket__order-input-delivery" order-city>
						<input type="text" placeholder="Адрес" class="basket__order-input-delivery" order-address>
						<textarea placeholder="Комментарий к заказу" name="comment" order-comment></textarea>
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
					<div class="delete">

					</div>
				</div>
				<div class="basket__product" id="basket__product_checkout" basket-items>
					<div class="basket-finish-price">
						<p><span class="basket-finish-price-units" cart-items-count></span> товара(ов) на сумму <span class="basket-finish-price-total" cart-total-price></span> <span class="basket-finish-price-total"> грн</span></p>
					</div>
					<div class="error-message-box">
						<p message-error></p>
					</div>
					<div class="basket-btn-order">
						<div>
							<button class="basket-btn-accept" cart-return-to-catalog>Выбрать товары</button>
						</div>
						<div>
							<button class="basket-btn-accept" cart-do-order>Оформить заказ</button>
							<p>Подтверждая заказ вы соглашаетесь с <a href="">политикой конфиденциальности</a></p>
						</div>
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
			<p class="popup__title">{{__('Отправте заявку')}}</p>
			<p class="popup__subtitle">{{__('и мы свяжемся с Вами в течении 15 минут')}}</p>
			<form method="post">
				{{ csrf_field() }}
				<input type="hidden" name="message_theme" value="PRICE_QUESTION">
				<input type="text" name="name" value="" placeholder="Имя" class="basket__order-input-name" required>
				<input type="tel" name="tel" value="" placeholder="+ 38 ( _ _ _ )  _ _  _ _  _ _ _" class="basket__order-input-phone phone" required>
				<button type="submit">{{__('Свяжитесь с мной')}}</button>
			</form>
		</div>
	</div>
</section>
<section id="popup-successful-order" popup-successful-order>
	<div class="popup__container">
		<div class="popup__content">
			<a class="close" close-successful-order-message>X</a>
			<p class="popup__title-mistake-blue">Ваша заявка принята!</p><br>
			<p class="popup__title-mistake">Ожидайте дзвонок для подтвержения!</p>
		</div>
	</div>
</section>
<div class="preloader">
    <div class="preloader__loader">
        <img src="images/loader.gif" alt="" />
    </div>
</div>
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<script src="{{ asset('slick/slick.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="{{ asset('js/slick.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/delivery.js') }}"></script>
<script src="{{ asset('js/cart.js') }}"></script>

<script type="text/javascript">
	if(getCookie('successful_order')){
		$('section[popup-successful-order]').css('display','flex');
		$('a[close-successful-order-message]').on("click", function () {
			$('section[popup-successful-order]').css('display','none');
		});
	}

	function getCookie(cname) {
		var name = cname + "=";
		var decodedCookie = decodeURIComponent(document.cookie);
		var ca = decodedCookie.split(';');
		for(var i = 0; i <ca.length; i++) {
		  var c = ca[i];
		  while (c.charAt(0) == ' ') {
		    c = c.substring(1);
		  }
		  if (c.indexOf(name) == 0) {
		    return c.substring(name.length, c.length);
		  }
		}
		return "";
	}
</script>

<script>
// Preloader page
jQuery(document).ready(function($) {
	$(window).on('load', function () {
		var $preloader = $('.preloader'),
		    $loader = $preloader.find('.preloader__loader');
		$loader.fadeOut();
		$preloader.delay(250).fadeOut(200);
	});
});
</script>

@if(session('order_open') == 'true')
	<script type="text/javascript">
		(function(){
			document.querySelector("#basket__order").style.display = "block";
		})();
	</script>
@endif
</body>
</html>
