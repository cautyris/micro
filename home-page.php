<?php
/*
Template Name: Главная страница
*/
get_header(); ?>

    <div class="sp-page" id="page">
      <section class="sp-slide slide slide-1" id="slide-1">
        <div class="slide-1__back">
          <div class="slide-1__img" style="background-image: url(<?bloginfo('template_url');?>/img/img1-min.png)">
            <div class="slide-1__wrap">
              <h1>Снимите напряжение с глаз</h1>
              <h2>С новыми микроскопами "Carl ZEISS"</h2>
                <p>Лучшая цена на рынке</p>
                <p>от 10,900</p>
                <div class="slide-1__see-more">
                  <p>Увидеть 10 раз больше</p>
                </div>
                <div class="slide-1__next" id="js__slide-1-button">
                  <button type="button" name="button"> <img src="<?bloginfo('template_url');?>/img/three_line-min.png" alt="" /></button>
                </div>
            </div>
          </div>
        </div>
      </section>
      <section class="sp-slide slide wrap" id="slide-2">
        <div class="slide__wrap">
          <div class="col-half col-center">
            <div class="slide__base-img">
              <img class="animated fadeInLeft" src="<?bloginfo('template_url');?>/img/img2-min.png" alt="" />
            </div>
          </div>
          <div class="col-half">
            
            <h2 class="slide__title animated fadeInUp">Позабодьтесь<br> о своем здоровье</h2>
            <div class="slide__info animated fadeInUp delay-1">
              <p>
                К 40 годам большинство стоматологов имеют проблемы со зрением<br>Наличие микроскопа резко снижает нагрузку на глаза врача при работе
              </p>
            </div>
          </div>
        </div>
        
      </section>
      <section class="sp-slide slide wrap" id="slide-3">
        <div class="slide__wrap">
          <div class="col-half col-center">
            <div class="slide__base-img">
              <img class="animated fadeInLeft" src="<?bloginfo('template_url');?>/img/img3-min.png" alt="" />
            </div>
          </div>
          <div class="col-half">
            
            <h2 class="slide__title animated fadeInUp">Доверие пациентов</h2>
            <div class="slide__info animated fadeInUp delay-1">
              <p>
                Наличие профессионального дорогостоящего оборудования положител
              </p>
            </div>
          </div>
        </div>
        
      </section>
      <section class="sp-slide slide wrap" id="slide-4">
        <div class="slide__wrap">
          <div class="col-half col-center">
            <div class="slide__base-img">
              <img class="animated fadeInLeft" src="<?bloginfo('template_url');?>/img/img4-min.png" alt="" />
            </div>
          </div>
          <div class="col-half">
            
            <h2 class="slide__title animated fadeInUp">Высокая компетентность</h2>
            <div class="slide__info animated fadeInUp delay-1">
              <p>
                Чем лучше вы видите проблему - тем успешнее ее решаете Увеличен
              </p>
            </div>
          </div>
        </div>
        
      </section>
      <section class="sp-slide slide wrap" id="slide-5">
      <?echo do_shortcode('[Wow-Modal-Windows id=1]');?>
        <div class="slide__wrap">
          <div class="col-half col-center">
            <div class="slide__base-img">
              <img class="animated fadeInLeft" src="<?bloginfo('template_url');?>/img/img5-min.png" alt="" />
            </div>
          </div>
          <div class="col-half">
            <h2 class="slide__title animated fadeInUp"><?the_field('title_shares');?></h2>
            <div class="slide__info animated fadeInUp">
              <p><?the_field('content_shares');?></p>
            </div>
            <?echo do_shortcode('[contact-form-7 id="41"]');?>
          </div>
        </div>
      </section>
      <section class="sp-slide slide wrap" id="slide-6">
        <div class="slide__wrap">
          <div class="catalog__title">
            <h2>Каталог микроскопов</h2>
          </div>
          <div class="catalog contain">
          <!-- Flex -->

          <?if( get_field('catalog') ): $i=0; while ( has_sub_field('catalog') ) : $i++;?>
            <div class="col-2-5 catalog__item animated fadeInUp">
              <div class="catalog__item_title">
                <div class="catalog__item_img">
                <?if( get_row_layout() == 'product_catalog' ):?>
                  <img src="<?the_sub_field('product_thumbnail');?>" alt="">
                <?endif;?>
                </div>
                <div class="catalog__item_name">
                <?if( get_row_layout() == 'product_catalog' ):?>
                  <h3><?the_sub_field('title');?></h3>
                 <?endif;?>
                </div>
              </div>
              <!-- <div class="catalog__item_descr"> -->
              <?//if( get_row_layout() == 'product_catalog' ):?>
                <!-- <p><?//the_sub_field('description');?></p> -->
                <?//endif;?>
              <!-- </div> -->
              <div>
              <?//if( get_row_layout() == 'product_catalog' ):?>
                <!-- <a href="<?//the_sub_field('id_modal_window');?>"><button type="button" class="button" name="button">Запросить цену<i class="fa fa-arrow-right" aria-hidden="true"></i></button></a> -->
                <button type="button" class="button button-link" name="button" data-toggle="modal" data-target="#catalogModal-<?php echo $i; ?>">Подробнее<i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                <?//endif;?>
              </div>
            </div>
                        <div class="modal fade" id="catalogModal-<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal__block">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            <img src="<?bloginfo('template_url')?>/img/cross.svg" alt="">
            </button>
                <div class="modal__img">
                  <img src="<?the_sub_field('product_thumbnail');?>" alt="">
                </div>
                <div class="modal__content">
                  <div class="modal__text">
                    <h3><?the_sub_field('title');?></h3>
                    <p><?the_sub_field('description');?></p>
                  </div>
                </div>
              </div>
            </div>
          <? endwhile; else : endif;?>
          <!-- End -->        
          </div>
        </div>
      </section>
      <section class="sp-slide slide wrap" id="slide-7">
        <div class="slide__wrap">
          <div class="col-half col-center">
            <div class="slide__base-img">
              <img class="animated fadeInLeft" src="<?bloginfo('template_url');?>/img/img7-min.png" alt="" />
            </div>
          </div>
          <div class="col-half">
            
            <h2 class="slide__title animated fadeInUp">Возможность подключения<br> фото и видео камеры</h2>
            <div class="slide__info animated fadeInUp">
              <p>
                Чем лучше вы видите проблему - тем успешнее ее решаете Увеличен
              </p>
            </div>
          </div>
        </div>
      </section>
      <section class="sp-slide slide wrap" id="slide-8">
        <div class="slide__wrap">
          <div class="col-half col-center">
            <div class="slide__base-img">
              <img class="animated fadeInLeft" src="<?bloginfo('template_url');?>/img/img8_2-min.png" alt="" />
            </div>
          </div>
          <div class="col-half">
          <h2 class="slide__title animated fadeInUp">Заявка на подбор<br>микроскопа</h2>
            <div class="slide__info animated fadeInUp">
              <p>
                Чем лучше вы видите проблему - тем успешнее ее решаете Увеличен
              </p>
            </div>
          <?echo do_shortcode('[contact-form-7 id="41" title="Контактная форма 1_copy"]');?>
          </div>
        </div>
      </section>
      <section class="sp-slide slide wrap" id="slide-9">
        <div class="slide__wrap">
          <div class="slide__center-title">
            <h2>Наши ключевые выгоды</h2>
          </div>
          <div class="benefit contain">
            <div class="col-6">
              <div class="benefit__item animated fadeInUp">
                <a class="benefit__item_number-1" href="">
                  <div class="benefit__icon">
                    <img src="<?bloginfo('template_url');?>/img/img9_1-min.png" alt="" />
                  </div>
                  <div class="benefit__descr">
                    <span>Описание преимущества.</span>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-6">
              <div class="benefit__item animated fadeInUp delay-1">
                <a class="benefit__item_number-2" href="">
                  <div class="benefit__icon">
                    <img src="<?bloginfo('template_url');?>/img/img9_2-min.png" alt="" />
                  </div>
                  <div class="benefit__descr">
                    <span>Описание преимущества.</span>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-6">
              <div class="benefit__item animated fadeInUp delay-2">
                <a class="benefit__item_number-3" href="">
                  <div class="benefit__icon">
                    <img src="<?bloginfo('template_url');?>/img/img9_3-min.png" alt="" />
                  </div>
                  <div class="benefit__descr">
                    <span>Описание преимущества.</span>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-6">
              <div class="benefit__item animated fadeInUp delay-3">
                <a class="benefit__item_number-4" href="">
                  <div class="benefit__icon">
                    <img src="<?bloginfo('template_url');?>/img/img9_4-min.png" alt="" />
                  </div>
                  <div class="benefit__descr">
                    <span>Описание преимущества.</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="sp-slide slide wrap" id="benefits">
        <div class="slide__wrap">
          <div class="col-half col-center">
            <div class="slide__base-img">
              <img class="animated fadeInLeft" src="<?bloginfo('template_url');?>/img/img10-min.png" alt="" />
            </div>
          </div>
          <div class="col-half">
            
            <h2 class="slide__title animated fadeInUp">В 1,5 раз больше пациентов</h2>
            <div class="slide__info animated fadeInUp delay-1">
              <p>
                Чем лучше вы видите проблему - тем успешнее ее решаете Увеличен
              </p>
            </div>
          </div>
        </div>
      </section>
      <section class="sp-slide slide wrap" id="calculator">
        <div class="slide__wrap">
          <div class="col-half col-center">
            <div class="slide__base-img">
              <ul id="scene" class="scene">
                <li class="layer" data-depth="0.00"><img src="<?bloginfo('template_url');?>/img/money/micro.png"></li>
                <li class="layer" data-depth="0.50"><img src="<?bloginfo('template_url');?>/img/money/money_8.png"></li>
                <li class="layer" data-depth="0.50"><img src="<?bloginfo('template_url');?>/img/money/money_1.png"></li>
                <li class="layer" data-depth="0.40"><img src="<?bloginfo('template_url');?>/img/money/money_2.png"></li>
                <li class="layer" data-depth="0.40"><img src="<?bloginfo('template_url');?>/img/money/money_3.png"></li>
                <li class="layer" data-depth="0.30"><img src="<?bloginfo('template_url');?>/img/money/money_4.png"></li>
                <li class="layer" data-depth="0.30"><img src="<?bloginfo('template_url');?>/img/money/money_5.png"></li>
                <li class="layer" data-depth="0.20"><img src="<?bloginfo('template_url');?>/img/money/money_6.png"></li>
                <li class="layer" data-depth="0.20"><img src="<?bloginfo('template_url');?>/img/money/money_7.png"></li>
              </ul>
            </div>
          </div>
          <div class="col-half calculator">
            <form id="js__calculator">
              <h2 class="slide__title animated fadeInUp">Калькулятор окупаемости<br>микроскопа</h2>
              <div class="slide__info animated fadeInUp">
                <p>
                  Чем лучше вы видите проблему - тем успешнее ее решаете Увеличен
                </p>
              </div>
              <div class="slide__row contain animated fadeInUp delay-1">
                <div class="col-6">
                  <ul class="list">
                    <li class="list__title">
                      <p>Выберите тип микроскопа:</p>
                    </li>
                    <?if( get_field('catalog') ): $i=0; while ( has_sub_field('catalog') ) : $i++;?>
                    <?if( get_row_layout() == 'product_catalog' ):?>
                    <li class="list__item">
                      <input class="radio" type="radio" name="microscop" value="<?the_sub_field('price');?>" id="radio-<?php echo $i; ?>">
                      <label class="radio__label" for="radio-<?php echo $i; ?>"><?the_sub_field('title');?></label>
                    </li>
                    <?endif;?>
<!--                     <li class="list__item">
                      <input class="radio" type="radio" name="microscop" value="2000000" id="radio-2">
                      <label class="radio__label" for="radio-2">Микроскоп 2</label>
                    </li> -->
                    <? endwhile; else : endif;?>
                  </ul>
                </div>
                <div class="col-6">
                  <ul class="list">
                    <li class="list__title">
                      <p>Среднее количество пациентов в день:</p>
                    </li>
                    <li class="list__item">
                      <input class="radio" type="radio" name="people-count" value="1.5" id="radio-2-1" checked="true">
                      <label class="radio__label" for="radio-2-1"><b>1-2 человека</b></label>
                    </li>
                    <li class="list__item">
                      <input class="radio" type="radio" name="people-count" value="3.5" id="radio-2-2">
                      <label class="radio__label" for="radio-2-2"><b>3-4 человека</b></label>
                    </li>
                    <li class="list__item">
                      <input class="radio" type="radio" name="people-count" value="4.5" id="radio-2-3">
                      <label class="radio__label" for="radio-2-3"><b>4-5 человек</b></label>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="slide__row calculator__slider-row animated fadeInUp delay-2">
                <div class="calculator__slider-descr">
                  Ваш средний чек (рублей):
                </div>
                <div class="calculator__slider">
                  <div class="slider__min">0</div>
                  <div class="slider__max">100,000</div>
                  <div id="slider"></div>
                  <input type="hidden" name="price" value="0">
                </div>
              </div>
              <div class="slide__row contain animated fadeInUp delay-2">
                <div class="col-6 calculator__payback">
                  <input id="js__payback-input" type="hidden" name="payback" value="0">
                  <p>Периуд окупаемости: <b><span id="js__payback">0</span> месяцев</b></p>
                </div>
                <div class="col-6 calculator__profit">
                <input id="js__profit-input" type="hidden" name="profit" value="0">
                  <p>Потом прибыль: <b><span id="js__profit">0</span> руб/мес</b></p>
                </div>
              </div>
              <div class="slide__row contain animated fadeInUp delay-2">
                <input class="input input-three" type="text" name="name" value="" placeholder="Ваше имя">
                <input class="input input-three tel" type="text" name="phone" value="" placeholder="Ваш телефон">
                <input class="input input-three" type="email" name="email" value="" placeholder="Ваш электронный адрес">
              </div>
              <div class="slide__row animated fadeInUp delay-2">
                <button class="button button-full" type="submit"><span>Запросить коммерческое предложение с точными ценами</span><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
              </div>
            </div>
          </form>
        </div>
      </section>

      <section class="sp-slide slide wrap" id="slide-12">
        <div class="slide__wrap">
          <div class="col-half col-center">
            <div class="slide__base-img">
              <img class="animated fadeInLeft" src="<?bloginfo('template_url');?>/img/img12-min.png" alt="" />
            </div>
          </div>
          <div class="col-half">
            <h2 class="slide__title animated fadeInUp">Скачайте презентацию<br>микроскопа</h2>
            <div class="slide__info animated fadeInUp">
              <p>
                Чем лучше вы видите проблему - тем успешнее ее решаете Увеличен
              </p>
            </div>
            <?echo do_shortcode('[contact-form-7 id="41" title="Контактная форма 1_copy"]');?>
          </div>
        </div>
      </section>
      <section class="sp-slide slide wrap" id="slide-13">
        <div class="slide__wrap">
          <div class="slide__center-title">
            <h2>Структура микроскопа</h2>
          </div>
          <div class="parts contain">
            <div class="col-half col-center">
              <ul class="parts__list">
                <li class="parts__radio">
                  <input type="radio" checked="true" name="part" id="part-1" data-target="#liyer-1">
                  <label for="part-1">01 | Ручки эргономичной формы с функциональными кнопками</label>
                </li>
                <li class="parts__radio">
                  <input type="radio" name="part" id="part-2" data-target="#liyer-2">
                  <label for="part-2">02 | Окуляры с широким полем обзора ( 12,5х или 10х)</label>
                </li>
                <li class="parts__radio">
                  <input type="radio" name="part" id="part-3" data-target="#liyer-3">
                  <label for="part-3">03 | Объектив с моторизованным вариоскопом</label>
                </li>
                <li class="parts__radio">
                  <input type="radio" name="part" id="part-4" data-target="#liyer-4">
                  <label for="part-4">04 | Шкала изменения меж зрачкового расстояния</label>
                </li>
                <li class="parts__radio">
                  <input type="radio" name="part" id="part-5" data-target="#liyer-5">
                  <label for="part-5">05 | Встроенный источник света и модуль резервной подсветки</label>
                </li>
                <li class="parts__radio">
                  <input type="radio" name="part" id="part-6" data-target="#liyer-6">
                  <label for="part-6">06 | Встроенная интерактивная панель управления</label>
                </li>
              </ul>
            </div>
            <div class="col-half col-center">
              <div class="slide__base-img parts__container animated fadeInRight">
                <div class="parts__liyer" id="liyer-1">
                  <img class="" src="<?bloginfo('template_url');?>/img/slide_13_1.png" alt="" />
                </div>
                <div class="parts__liyer" id="liyer-2">
                  <img class="" src="<?bloginfo('template_url');?>/img/slide_13_2.png" alt="" />
                </div>
                <div class="parts__liyer" id="liyer-3">
                  <img class="" src="<?bloginfo('template_url');?>/img/slide_13_3.png" alt="" />
                </div>
                <div class="parts__liyer" id="liyer-4">
                  <img class="" src="<?bloginfo('template_url');?>/img/slide_13_4.png" alt="" />
                </div>
                <div class="parts__liyer" id="liyer-5">
                  <img class="" src="<?bloginfo('template_url');?>/img/slide_13_5.png" alt="" />
                </div>
                <div class="parts__liyer" id="liyer-6">
                  <img class="" src="<?bloginfo('template_url');?>/img/slide_13_6.png" alt="" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="sp-slide slide wrap" id="slide-14">
        <div class="slide__wrap">
          <div class="col-half col-center">
            <div class="slide__base-img">
              <img class="animated fadeInLeft" src="<?bloginfo('template_url');?>/img/img14-min.png" alt="" />
            </div>
          </div>
          <div class="col-half">
            <div class="slide__text animated fadeInUp"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Proin eget tortor risus. Proin eget tortor risus. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada. Nulla quis lorem ut libero malesuada feugiat.</p></div>
            <div class="slide__author animated fadeInUp"><p>Константин Гребенщиков</p></div>
            <div class="slide__author-post animated fadeInUp delay-1">
              <p>
                Руководитель компании
              </p>
            </div>
          </div>
        </div>
      </section>
      <section class="sp-slide slide wrap" id="slide-15">
        <div class="slide__wrap">
          <div class="slide__center-title">
            <h2>Что входит в комплект</h2>
          </div>
          <div class="complect contain">
          <?if( get_field('set') ): $i=0; while ( has_sub_field('set') ) : $i++;?>
            <?if( get_row_layout() == 'content' ):?>
            <div class="col-4 complect__item animated fadeInUp"  id="awesomeId">
              <div class="complect__img"><img src="<?the_sub_field('img');?>" alt=""></div>
              <div class="complect__name tooltiper" data-toggle="tooltip" data-placement="left" data-html-text='<?the_sub_field('description');?>' title='<?the_sub_field('description');?>'>
                <p><?the_sub_field('title');?></p>
              </div>
            </div>
          <?endif;?>
          <? endwhile; else : endif;?>
          </div>
        </div>
      </section>
      <section class="sp-slide slide wrap" id="contacts">
        <div class="slide__wrap">
          <div class="col-half col-center">
            <div class="slide__base-img">
              <div id="map"></div>
            </div>
          </div>
          <div class="col-half">
            <h2 class="slide__title">
              Как связаться с нами
            </h2>
            <div class="slide__row animated fadeInUp">Телефон: <a href="" class="link"><b><?echo get_field('phone');?></b></a></div>
            <div class="slide__row animated fadeInUp">Электронная почта: <a href="" class="link"><b><?echo get_field('email');?></b></a></div>
            <div class="slide__row animated fadeInUp">
              <a href="viber://add?number=<?echo get_field('viber');?>" class="link"><b>Viber</b></a>
              <a href="whatsapp://<?echo get_field('whatsapp');?>" class="link"><b>Whatsapp</b></a>
              <a href="tg://resolve?domain=<?echo get_field('telegram');?>" class="link"><b>Telegram</b></a></div>
            <div class="slide__info animated fadeInUp delay-1">
              <p>
                Компания не реализует свои собственные товары
              </p>
            </div>
          </div>
        </div>
      </section>


      <div class="header">
        <div class="header__left">
          <p>Официальный представитель стоматологических микроскопов «Zeiss»</p>
        </div>
        <div class="header__center">
          <div class="header__logo">
            <a href="">
              <img src="<?bloginfo('template_url');?>/img/logo-min.png" alt="">
            </a>
          </div>
        </div>
        <div class="header__right">
          <a href="" class="link header__phone">8 (800) 800-80-80</a>
          <p>Бесплатная горячая линия с экспертом в области микроскопии</p>
        </div>
      </div>

      <div class="footer">
        <div class="footer__left">
          <ul class="socials">
            <li class="socials__item"><a href="whatsapp://<?echo get_field('whatsapp');?>" class="link">Whatsapp</a></li>
            <li class="socials__item"><a href="tg://resolve?domain=<?echo get_field('telegram');?>" class="link">Telegram</a></li>
            <li class="socials__item"><a href="viber://add?number=<?echo get_field('viber');?>" class="link">Viber</a></li>
          </ul>
        </div>
        <div class="footer__right">
          <a href="#contacts" class="link" id="contacts-link">Контакты</a>
        </div>
      </div>
      <ul class="sp-actions arrows" id="actions">
        <button class="arrows__item" id="prev"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
        <hr class="arrows__dev">
        <button class="arrows__item" id="next"><i class="fa fa-arrow-down" aria-hidden="true"></i></button>
      </ul>
    </div>

<?get_footer();?>