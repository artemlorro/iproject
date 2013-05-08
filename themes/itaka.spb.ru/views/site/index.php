<?php /* @var $this Controller */ $view = $this->view; ?>
<div id="main">
	<div class="index_gallery">
		<a class="backward"></a>
		<div class="images">
			<? foreach($view->glo->getMainSliderImages() as $i): ?>
				<div><img src="<?=$i['url']?>" alt="" width="640" height="319"></div>
			<? endforeach; ?>
		</div>
		<a class="forward"></a>
		<div class="slidetabs">
			<a href="#"></a>
			<a href="#"></a>
			<a href="#"></a>
		</div>
	</div>
	<div class="ceo_letter">
		<?=$view->glo->getMainCeoText()?>
	</div>
	<div class="ceo_profile">
		<div class="ceo_photo"><img src="<?=$view->glo->getMainCeoImg();?>" alt="<?=$view->glo->getMainCeoFio();?>"></div>
		<div class="ceo_info"><p><?=$view->glo->getMainCeoSub();?></p><p class="marked_bold"><?=$view->glo->getMainCeoFio();?></p></div>
		<div class="letter"><a id="letter_link" href="#letter_to_ceo">Письмо генеральному</a></div>
		<div style="display:none">
			<div id="letter_to_ceo" class="mod">
				<form id="letter_top" action="">
					<div class="letter_top">Письмо генеральному директору</div>
					<div id="letter1" class="letter_block">
						<div class="inp_label">Как вас зовут?</div>
						<div class="inp_style"><input type="text" id="letter_name"></div>
					</div>
					<div id="letter2" class="letter_block">
						<div class="inp_label">Ваша почта</div>
						<div class="inp_style"><input type="text" id="letter_email"></div>
					</div>
					<div id="letter3" class="letter_block">
						<div class="inp_label">Ваш телефон</div>
						<div class="inp_style"><input type="text" id="letter_email"></div>
					</div>
					<div id="letter4">
						<div class="inp_label">По какому вы вопросу?</div>
						<select class="dropdown">
							<option>Жалоба</option>
							<option>Благодарность</option>
							<option>Предложение</option>
						</select>
					</div>
					<div id="letter5" class="letter_text_block">
						<div class="inp_label">Ваше сообщение:</div>
						<div class="textarea_style"><textarea></textarea></div>
					</div>
					<div id="letter_but" class="button_style">
						<input id="letter_button" type="submit" value="Отправить">
						<a id="letter_sent_link" href="#letter_sent"></a>
					</div>
				</form>
			</div>
			<div style="display:none">
				<div id="letter_sent" class="mod">
					<form id="letter_success">
						<div class="letter_img"></div>
						<div class="letter_text_sent">Спасибо, ваша заявка принята</div>
						<div id="letter_sent_but" class="button_style">
							<input id="letter_sent_button" type="submit" value="Вернуться">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div id="ind_object_block">
		<div id="specobjects">
			<div class="specobj">
				<div class="specobj_photo">
					<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/objects/specobj1.png" alt="">
					<a href="#"></a>
					<img class="specobj_type" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/kn_specobj.png" alt="">
				</div>
				<div class="specobj_info">
					<a class="object_name" href="#">Коттедж в коттеджном поселке "Грибово"</a>
					<a class="object_info" href="#">пр. Руставелли, ж.132-143</a>
				</div>
			</div>
			<div class="specobj">
				<div class="specobj_photo">
					<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/objects/specobj1.png" alt="">
					<a href="#"></a>
					<img class="specobj_type" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ns_specobj.png" alt="">
				</div>
				<div class="specobj_info">
					<a class="object_name" href="#">Жилой комплекс "Поэма на трех озерах"</a>
					<a class="object_info" href="#">пр. Руставелли, ж.132-143</a>
				</div>
			</div>
			<div class="specobj">
				<div class="specobj_photo">
					<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/objects/specobj1.png" alt="">
					<a href="#"></a>
					<img class="specobj_type" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ar_specobj.png" alt="">
				</div>
				<div class="specobj_info">
					<a class="object_name" href="#">Коттедж в коттеджном поселке "Грибово"</a>
					<a class="object_info" href="#">Лен. область, ул. Революции, д.342</a>
				</div>
			</div>
			<div class="specobj">
				<div class="specobj_photo">
					<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/objects/specobj1.png" alt="">
					<a href="#"></a>
					<img class="specobj_type" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/zhil_specobj.png" alt="">
				</div>
				<div class="specobj_info">
					<a class="object_name" href="#">Коттедж в коттеджном поселке "Грибово"</a>
					<a class="object_info" href="#">Лен. область, ул. Революции, д.342</a>
				</div>
			</div>
			<div class="specobj">
				<div class="specobj_photo">
					<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/objects/specobj1.png" alt="">
					<a href="#"></a>
					<img class="specobj_type" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ip_specobj.png" alt="">
				</div>
				<div class="specobj_info">
					<a class="object_name" href="#">Коттедж в коттеджном поселке "Грибово"</a>
					<a class="object_info" href="#">Лен. область, ул. Революции, д.342</a>
				</div>
			</div>
			<div class="specobj">
				<div class="specobj_photo">
					<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/objects/specobj1.png" alt="">
					<a href="#"></a>
					<img class="specobj_type" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/el_specobj.png" alt="">
				</div>
				<div class="specobj_info">
					<a class="object_name" href="#">Коттедж в коттеджном поселке "Грибово"</a>
					<a class="object_info" href="#">Лен. область, ул. Революции, д.342</a>
				</div>
			</div>
			<div class="specobj">
				<div class="specobj_photo">
					<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/objects/specobj1.png" alt="">
					<a href="#"></a>
					<img class="specobj_type" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/cot_specobj.png" alt="">
				</div>
				<div class="specobj_info">
					<a class="object_name" href="#">Коттедж в коттеджном поселке "Грибово"</a>
					<a class="object_info" href="#">Лен. область, ул. Революции, д.342</a>
				</div>
			</div>
			<div class="specobj">
				<div class="specobj_photo">
					<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/objects/specobj1.png" alt="">
					<a href="#"></a>
					<img class="specobj_type" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/zag_specobj.png" alt="">
				</div>
				<div class="specobj_info">
					<a class="object_name" href="#">Коттедж в коттеджном поселке "Грибово"</a>
					<a class="object_info" href="#">Лен. область, ул. Революции, д.342</a>
				</div>
			</div>
			<div class="specobj">
				<div class="specobj_photo">
					<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/objects/specobj1.png" alt="">
					<a href="#"></a>
					<img class="specobj_type" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/zar_specobj.png" alt="">
				</div>
				<div class="specobj_info">
					<a class="object_name" href="#">Коттедж в коттеджном поселке "Грибово"</a>
					<a class="object_info" href="#">Лен. область, ул. Революции, д.342</a>
				</div>
			</div>
		</div>
		<div class="black_search_wrap">
			<div class="black_search_form">
				<form action="">
					<div class="title_bl_form">Я готов потратить</div>
					<div class="black_input"><input type="text" value=""></div>
					<div class="cur_bl_form">руб.</div>
					<div class="but_bl_form"><input type="submit" value="Показать варианты"></div>
				</form>
			</div>
		</div>
	</div>
	<div id="inform_block">
		<div class="news_index">
			<ul class="tabs" style="cursor:pointer;">
				<li class="active">Новости компании</li>
				<li>Новости рынка</li>
			</ul>
			<div class="panel">
				<div class="news_panel">
					<? foreach($view->last_bnews as $i): ?>
						<div>
							<span class="date"><?=date('d.m.Y', strtotime($i->getDt()))?></span>
							<a href="<?=$i->url() ?>"><?=$i->getName() ?></a>
						</div>
					<? endforeach; ?>
				</div>
				<div class="news_panel">
					<? foreach($view->last_news as $i): ?>
						<div>
							<span class="date"><?=date('d.m.Y', strtotime($i->getDt()))?></span>
							<a href="<?=$i->url() ?>"><?=$i->getName() ?></a>
						</div>
					<? endforeach; ?>
				</div>
			</div>
		</div>
		<div id="subscribe">
			<form id="subscribe_form" action="">
				<div class="subscribe_text">Подпишитесь на наши:</div>
				<div class="subscribe_option">
					<select name="dropdown" class="dropdown">
						<option>Спецпредложения</option>
						<option>Новости</option>
						<option>Статьи</option>
					</select>
				</div>
				<div class="subscribe_mail">
					<input type="text" value="Введите ваш е-мэйл">
				</div>
				<div class="but_subscribe"><input type="submit" value="Подписаться"></div>
			</form>
		</div>
	</div>
	<div class="ind_articles">
		<div  id="article_left" class="ind_article">
			<div class="title_article">Агентство недвижимости «Итака»: покупка,продажа и аренда недвижимости. </div>
			<div class="img_article">
				<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/article/article1.png" alt="">
				<a href="#">Читать далее</a>
			</div>
			<div class="text_article">
				<p>Петербургское риэлторское агентство «Итака» основано в ноябре 1993 года и на сегодняшний день является одним из крупнейших агентств недвижимости региона. Специализация агентства - аренда и продажа недвижимости в </p>
				<p>Санкт-Петербурге и в Концертном зале «Карнавал» Аничкова дворца состоялось праздничное</p>
			</div>
		</div>
		<div id="article_right" class="ind_article">
			<div class="title_article">Агентство недвижимости «Итака»: покупка,продажа и аренда недвижимости. </div>
			<div class="img_article">
				<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/article/article2.png" alt="">
				<a href="#">Читать далее</a>
			</div>
			<div class="text_article">
				<p>Петербургское риэлторское агентство «Итака» основано в ноябре 1993 года и на сегодняшний день является одним из крупнейших агентств недвижимости региона. Специализация агентства - аренда и продажа недвижимости в </p>
				<p>Санкт-Петербурге и в Концертном зале «Карнавал» Аничкова дворца состоялось праздничное</p>
			</div>
		</div>
		<div class="link_all_articles"><a class="all_articles">Все статьи</a></div>
	</div>
	<div class="right_ind_info_block">
		<div id="bl_ind_left" class="small_ind_block">
			<div class="title">Лучший сотрудник</div>
			<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/user/best1.png" alt="">
			<div class="name">Петрова Анна Ивановна</div>
		</div>
		<div id="bl_ind_right" class="small_ind_block">
			<div class="title">Опрос</div>
			<form>
				<p>Кто должен стать тренером сборной России после Евро-2012?</p>
				<div class="quiz_ind">
					<input class="quiz_points" type="radio" name="answer" value="a1" checked><label>иностранный специалист</label><br />
					<input class="quiz_points" type="radio" name="answer" value="a2">российский тренер <br />
					<input class="quiz_points" type="radio" name="answer" value="a3">Сергей Фурсенко<br />
					<input class="quiz_points" type="radio" name="answer" value="a3">оставьте Адвоката!
					<input class="submit" type="submit" value="Голосовать">
				</div>
			</form>
		</div>
	</div>
</div>