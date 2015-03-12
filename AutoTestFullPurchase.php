<?php
class AutoTestFullPurchase extends PHPUnit_Framework_TestCase

/**
 * @expectedException Exception
 */
{
		protected $url = 'http://admin:qwerty6@stand.santehnika-online.ru/';
		protected $webDriver;


	public function setUp()
    {
        $capabilities = array(\WebDriverCapabilityType::BROWSER_NAME => 'firefox');
        $this->webDriver = RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);
    }
	public function tearDown()
    {
		$this->webDriver->close();
    }

	public function regFullPurch()
	{

		$FullPurch=$this->webDriver->get($this->url);
		$FullPurch=$this->webDriver->manage()->window()->maximize();
		echo "\n".'Заходим на сайт'."\n";
	try{
			echo "\n".'Нажимаем на кнопку "Личный кабинет"'."\n";
			$reg = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='user_top_menu']"));
			$reg=$this->webDriver->getMouse()->mouseMove($reg->getCoordinates());
			echo "\n".'Вводим номер телефона'."\n";
			$this->webDriver->manage()->timeouts()->implicitlyWait(20);
			$reg = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='login']/div/input[@class='code show_on_success']"));
			$reg->click()->sendKeys('977');
			$this->webDriver->manage()->timeouts()->implicitlyWait(20);
			$reg = $this->webDriver->findElement(WebDriverBy::xpath("//input[@name='tel']"));
			$reg->click()->sendKeys('7777770');
			$this->webDriver->manage()->timeouts()->implicitlyWait(20);
			echo "\n".'Нажимаем на кнопку "Войти" '."\n";
			$reg = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='auth_button']/input[@value='Войти']"));
			$reg->click();
			$this->webDriver->manage()->timeouts()->implicitlyWait(5);;
			$reg = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='input error-style']/input"));
			try{
			if ($reg->isDisplayed()){
				echo "\n Поле Пароль выделено красным цветом, авторизация не состоялась \n";
			}
			else {
				throw new PHPUnit_Framework_Exception("\n Ошибка.  \n");
            }
			}
			catch(Exception $ex) {
				"\n Ошибка. Поле Пароль не выделено красным цветом \n";
			}
			
			$reg = $this->webDriver->findElement(WebDriverBy::xpath("//input[@name='password']"));
			$reg->click()->sendKeys('aerfhtykjuil');
			echo "\n".'Нажимаем на кнопку "Войти" '."\n";
			$reg = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='auth_button']/input[@value='Войти']"));
			$reg->click();
			$this->webDriver->manage()->timeouts()->implicitlyWait(5);
			$reg = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='input error-style']/input"));
			try{
			if ($reg->isDisplayed()){
				echo "\n Поле Пароль выделено красным цветом, авторизация не состоялась \n";
			}
			else {
				throw new PHPUnit_Framework_Exception("\n Ошибка. Нет поля Имя \n");
            }
			}
			catch(Exception $ex) {
				"\n Ошибка. Поле Пароль не выделено красным цветом \n";
			}
			$reg = $this->webDriver->findElement(WebDriverBy::xpath("//input[@name='password']"))->clear();
			$reg = $this->webDriver->findElement(WebDriverBy::xpath("//input[@name='password']"));
			$reg->click()->sendKeys('qwerty6'); 
			$reg = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='auth_button']/input[@value='Войти']"));
			$reg->click();
			$this->webDriver->manage()->timeouts()->implicitlyWait(5);
			try {
			$reg = $this->webDriver->findElement(WebDriverBy::xpath("//a[@href='/personal/order/']"));
			if($reg->isDisplayed()){
				echo "\n Поле 'Список заказов' есть \n";
				}
			else {
 			     	throw new PHPUnit_Framework_Exception("\n Ошибка. Поле 'Список заказов' не отображается\n");
                             }
			}
		catch (PHPUnit_Framework_Exception $ex) {
		echo "\n  ''\n";
			}
	
	

	try {
			$reg = $this->webDriver->findElement(WebDriverBy::xpath("//a[@href='/personal/profile/']"));
			if($reg->isDisplayed()){
				echo "\n Поле 'Имя пользователя' есть \n";
				}
			else {
 			     	throw new PHPUnit_Framework_Exception("\n Ошибка. Поле 'Имя пользователя' не отображается\n");
                             }
			}
		catch (PHPUnit_Framework_Exception $ex) {
		echo "\n  ''\n";
			}

		try {
			$reg = $this->webDriver->findElement(WebDriverBy::xpath("//a[@href='/?logout=yes']"));
			if($reg->isDisplayed()){
				echo "\n Поле 'Выход' есть \n";
				$reg = $this->webDriver->findElement(WebDriverBy::xpath("//a[@href='/?logout=yes']"));
				$reg->click();
				}
			else {
 			     	throw new PHPUnit_Framework_Exception("\n Ошибка. Поле 'Выход' не отображается\n");
                             }
			}
		catch (PHPUnit_Framework_Exception $ex) {
		echo "\n  ''\n";
			} 
		}
	catch(Exception $ex) {}	
	}
	
	public function FullPurchase($a) {
		
		try{
		foreach ($a as $v) {
			$DiscSale = $this->webDriver->findElement(WebDriverBy::xpath($v));
        	$DiscSale->click();
			$DiscSaleP = $this->webDriver->findElement(WebDriverBy::xpath($v))->getText();
			echo "\n Открываем страницу $DiscSaleP \n";
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//div[contains(@class,'product list newsec')][1]"));
			$reg1->click();
			sleep(5);
		
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='header_cart_container']/div/ul/li/a"));
			if($reg1->isDisplayed()) {
				echo "\n Кнопка верхней корзины серая \n"; //Проверка верхней корзины
			}
			else {
				throw new PHPUnit_Framework_Exception("\n Ошибка. Кнопка не серая \n");
            }

			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='fixed_container']/div/a"));
			if($reg1->isDisplayed()) {
				echo "\n Кнопка нижней корзины серая \n"; //Проверка нижней корзины
			}
			else {
				throw new PHPUnit_Framework_Exception("\n Ошибка. Кнопка не серая  \n");
            }

			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//div[@id='price_order']/noindex/a[@class='order']"));
			$reg1->click();
			sleep(5);

			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='jumpbask']/a[@class='continue']"));
			$reg1->click();

			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//div[@id='price_order' and @class='greenb']"));
			if($reg1->isDisplayed()) {
				echo "\n Верхняя кнопка зеленная 'В КОРЗИНЕ' \n";
			}
			else {
				throw new PHPUnit_Framework_Exception("\n Ошибка. Кнопка не зеленная  \n");
            }
			sleep(3);
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//div[@id='price_order']/noindex/a[@class='order']"))->getText();
			$check1 = "В КОРЗИНЕ";
			echo 'Проверка названия \n';
			$this->assertTrue($reg1==$check1, "Тест провален");
			echo 'Проверка названия - пришла к успеху \n';
			sleep(5);
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//div[contains(@class,'newprice')]"))->getAttribute('data-price');
			$price = $reg1;
			echo $price;
			sleep(4);
			try{
			$check = $this->webDriver->findElement(WebDriverBy::xpath("//span[@class='f1s14 additionalCartTotalPrice']"));
			if($check->isDisplayed()) {
				$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//span[@class='f1s14 additionalCartTotalPrice']"))->getText();
			}
			}
			catch (Exception $ex ) {}
			
			$chPrice = preg_replace('/[^0-9,]/', '', $reg1);

			echo $price;
			try{
			$this->assertTrue($price==$chPrice, "Тест провален"); //проверка между кнопками "В корзине"
				echo "\n проверка между кнопками 'В корзине' \n";
			}
			catch (PHPUnit_Framework_AssertionFailedError $ex) {
				echo "Ошибка  проверка между кнопками 'В корзине'";
			}
			$this->assertNotNull($reg1, "Тест провален"); 

			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='header_cart_container']/div/ul/li/a/span[@class='summa']"))->getText();
			$reg2 = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='userbasket_bottom']/a/span[@class='summa']"))->getText();
			$chPrice1 = preg_replace('/[^0-9,]/', '', $reg1);
			$chPrice2 = preg_replace('/[^0-9,]/', '', $reg2);
			
			try{
			$this->assertTrue($chPrice1==$chPrice2, "Тест провален"); 
					 echo "\n Проверка  верхней корзины с нижней корзиной \n";
			}
			catch (PHPUnit_Framework_ExpectationFailedException $ex) {
                      echo "\n Не соответствует сумма верхней корзины с суммой нижней корзиной \n";
                }
			try {
			$this->assertTrue($chPrice==$chPrice2, "Тест провален");
					 echo $chPrice;
					 echo "\n Не соответствует сумма верхней корзины и цены товара \n";
			}
			catch(PHPUnit_Framework_ExpectationFailedException $ex) {
				 echo "\n Не соответствует сумма корзины и товара \n";
			}
			try{
			$this->assertTrue($chPrice==$chPrice1, "Тест провален");
			 echo "\n Проверка цены товара и нижней корзины  \n";	
			}
			catch(PHPUnit_Framework_ExpectationFailedException $ex) {
				echo "\n Не соответствует сумма нижней корзины и товара \n";
			}
			$this->webDriver->navigate()->refresh();
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//div[@id='price_order']"));
			if($reg1->isDisplayed()) {
				echo "\n Кнопка оранжевая \n";
			}
			else {
				throw new PHPUnit_Framework_Exception("\n Ошибка. Кнопка не оранжевая  \n");
            }
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//div[@id='price_order']"))->getText();
			$check1 = "В КОРЗИНУ";
			$this->assertTrue($reg1==$check1, "Тест провален"); 
			echo "\n Кликаем на нижнюю на странице кнопку 'В КОРЗИНУ' \n";
			sleep(5);
			try {
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//input[contains(@class,'yellownopic cartAdditionalsSubmit order_zone_kpk')]"));
			$reg1->click();
			}
			catch(ElementNotVisibleException $ex) {}
			
			$reg2 = $this->webDriver->findElement(WebDriverBy::xpath("//div[@id='price_order']/noindex/a[@class='order']"));
			$reg2->click();
			sleep(5);
			echo "\n В поля Быстрое оформление вводим номер телефона 977 777 7771 \n";
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='tovdob']/div/div[4]/form/input[2]"));
			sleep(3);
			$reg1->click()->sendKeys('977');
			$this->webDriver->manage()->timeouts()->implicitlyWait(20);
			$randTel = '77777'.rand(10,99);
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='tovdob']/div/div[4]/form/input[3]"));
			$reg1->click()->sendKeys('7777771');
			$this->webDriver->manage()->timeouts()->implicitlyWait(20);
			echo "\n нажамаем 'Оформить' \n";
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='tovdob']/div/div[4]/form/input[4]"));
			$reg1->click();
			sleep(4);
			$source = $this->webDriver->getPageSource();
			sleep(5);	
			try {
			$this->assertContains('Детали Заказа',$source,'Все не ок');
			$this->assertContains('К списку заказов',$source,'Все не ок');
			$CurrURL = $this->webDriver->getCurrentURL();
			$this->assertContains('/personal/order/',$CurrURL,'Все не ок');
			} 
			catch (PHPUnit_Framework_AssertionFailedError $ex) {
				throw new Exception ("Ошибка на странице $CurrURL");
			}
			echo "\n Нажимаем кнопку 'Отменить' \n";
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//a[@class='r close']"));
			$reg1->click();
			echo "\n В поле вводим текст 'тестовый' \n";
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//textarea"));
			$reg1->sendKeys('Тестовый');
			echo "\n Нажать кнопку 'Отменить заказ' \n";
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//input[@type='submit' and @value='Отменить заказ']"));
			$reg1->click();
			sleep(10);
			$tabFallen1 = $this->webDriver->findElement(WebDriverBy::xpath("//a[@title='Душевые кабины и углы']"));
			$tabFallen2 = $this->webDriver->findElement(WebDriverBy::xpath("//a[@title='Ванны']"));
			$tabFallen3 = $this->webDriver->findElement(WebDriverBy::xpath("//a[@title='Комплектующие']"));
			
			try {
				$DiscSale = $this->webDriver->findElement(WebDriverBy::xpath($v));
				if($DiscSale->isDisplayed()){
					$DiscSale->click();
				}
				else {
					  $tabFallen1->click();
				}
			
				
			
				$DiscSale = $this->webDriver->findElement(WebDriverBy::xpath($v));
				if($DiscSale->isDisplayed()){
					$DiscSale->click();
				}
				else  {
					  $tabFallen2->click();
				}
		
			
				$DiscSale = $this->webDriver->findElement(WebDriverBy::xpath($v));
				if($DiscSale->isDisplayed()){
					$DiscSale->click();
				}
				else {
					  $tabFallen3->click();
				}
			}
			catch (PHPUnit_Framework_Exception $exd ) {
					echo "Ошибка";
				}	
				
				
				
			$DiscSaleP = $this->webDriver->findElement(WebDriverBy::xpath($v))->getText();
			echo "\n Открываем страницу $DiscSaleP \n";
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//div[contains(@class,'product list newsec')][1]"));
			$reg1->click();
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//div[@id='price_order']/noindex/a[@class='order']"));
			$reg1->click();
			sleep(5);
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='jumpbask']/a[@class='jumpbask']"));
			$reg1->click();
			sleep(3);
			
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='ORDER_PROP_7']"));
			if($reg1->isDisplayed()) {
				echo "\n Есть поле ФИО \n";
			}
			else {
				throw new PHPUnit_Framework_Exception("\n Ошибка. поле ФИО отсутствует  \n");
            }
			
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='ORDER_PROP_29']"));
			if($reg1->isDisplayed()) {
				echo "\n Есть поле Варианты доставки*   \n";
			}
			else {
				throw new PHPUnit_Framework_Exception("\n Ошибка. поле Варианты доставки отсутствует  \n");
            }
			
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='PAY_SYSTEM_ID']"));
			if($reg1->isDisplayed()) {
				echo "\n Есть поле Способ оплаты  \n";
			}
			else {
				throw new PHPUnit_Framework_Exception("\n Ошибка. поле Способ оплаты отсутствует  \n");
            }
			
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//td[@class='align-baseline checks-mark' and contains(text(),'Добавить услугу установки')]"));
			if($reg1->isDisplayed()) {
				echo "\n Чекбокс 'Добавить услугу установки' есть \n";
			}
			else {
				throw new PHPUnit_Framework_Exception("\n Ошибка. Чекбокс 'Добавить услугу установки' отсутствует  \n");
            }
			
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//td[@class='align-baseline checks-mark' and contains(text(),'Добавить подъем на этаж')]"));
			if($reg1->isDisplayed()) {
				echo "\n Чекбокс 'Добавить подъем на этаж' есть \n";
			}
			else {
				throw new PHPUnit_Framework_Exception("\n Ошибка. Чекбокс 'Добавить подъем на этаж' отсутствует  \n");
            }
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='ORDER_PROP_26']"));
			if($reg1->isDisplayed()) {
				echo "\n поле 'Примечание' есть \n";
			}
			else {
				throw new PHPUnit_Framework_Exception("\n Ошибка. Чекбокс 'Добавить подъем на этаж' отсутствует  \n");
            }
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='wrap-agreem']"));
			if($reg1->isDisplayed()) {
				echo "\n Поле 'Соглашаюсь с условиями пользовательского соглашения' есть \n";
			}
			else {
				throw new PHPUnit_Framework_Exception("\n Ошибка. Поле 'Соглашаюсь с условиями пользовательского соглашения' отсутствует   \n");
            }
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='info-pay']"));
			$reg1->click();
			sleep(5);
			$source = $this->webDriver->getPageSource();
			 try{
                      $this->assertContains('Способы оплаты',$source,'Все не ок');

                   }
                catch (PHPUnit_Framework_ExpectationFailedException $ex) {
                      echo "\n нет текста Способы оплаты \n";
                   }
		// НАЧАЛО ПРОВЕРКА
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='fancy_close']"));
			$reg1->click();
			sleep(5);
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='info-delivery']"));
			$reg1->click();
			sleep(5);
			$source = $this->webDriver->getPageSource();
			 try{
                      $this->assertContains('Доставка по Москве и МО',$source,'Все не ок');

                   }
                catch (PHPUnit_Framework_ExpectationFailedException $ex) {
                      echo "\n Нет текста  'Доставка по Москве и МО' \n";
                   }
		// НАЧАЛО ПРОВЕРКА
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='fancy_close']"));
			$reg1->click();
			sleep(5);
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='info-warranty']"));
			$reg1->click();
			sleep(5);
			$source = $this->webDriver->getPageSource();
			 try{
                      $this->assertContains('Гарантия',$source,'Все не ок');

                   }
                catch (PHPUnit_Framework_ExpectationFailedException $ex) {
                      echo "\n Нет текста 'Гарантия' \n";
                   }
		// НАЧАЛО ПРОВЕРКА
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='fancy_close']"));
			$reg1->click();
			sleep(5);
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='info-install']"));
			$reg1->click();
			sleep(5);
			$source = $this->webDriver->getPageSource();
			 try{
                      $this->assertContains('Установка и подключение сантехники',$source,'Все не ок');

                   }
                catch (PHPUnit_Framework_ExpectationFailedException $ex) {
                      echo "\n Нет текста 'Установка и подключение сантехники'  \n";
                   }
		// НАЧАЛО ПРОВЕРКА
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='fancy_close']"));
			$reg1->click();
			sleep(5);
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='order_ajax_button' and @value='Закончить оформление']"));
			$reg1->click();
			sleep(3);
			
		// НАЧАЛО ПРОВЕРКА
			
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='order_ajax_button' and @value='Закончить оформление']"));
			$reg1->click();
			sleep(3);
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//p/font[@class='errortext' and contains(text(),'Варианты доставки')]"));
			
			if($reg1->isDisplayed()) {
				echo "\n появилось сообщение об ошибке 'Заполните поле 'Варианты доставки' ' \n";
			}
			else {
				throw new PHPUnit_Framework_Exception("\n Ошибка. Сообщения об ошибке нет  \n");
            }
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='terms-agree']"));
			$reg1->click();
			sleep(3);
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='order_ajax_button' and @class='gogo inactived']"));
			
			if($reg1->isDisplayed()) {
				echo "\n Кнопка Серая \n";
			}
			else {
				throw new PHPUnit_Framework_Exception("\n Ошибка. Кнопка  оранжевая  \n");
            }
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='ORDER_PROP_7']"));
			$reg1->sendKeys('Тестовый');
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='ORDER_PROP_29']"));
			$reg1->sendKeys('Самовывоз');
			sleep(5);
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='terms-agree']"));
			$reg1->click();
			sleep(3);
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='order_ajax_button' and @value='Закончить оформление']"));
			$reg1->click();
			sleep(3);
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='thank-you']/table/tbody/tr/td"))->getText();
			try{
                      $this->assertContains('Спасибо, Ваш заказ оформлен!
Наш представитель свяжется с Вами в течение 30 минут.
Обработка заказов происходит ежедневно с 08:00 до 01:00 по московскому времени.
Уточнения при необходимости по телефону (495) 665-70-75 с указанием номера заказа.',$reg1,'Все не ок');

                   }
                catch (PHPUnit_Framework_ExpectationFailedException $ex) {
                      echo "\n Нет текста  Спасибо, Ваш заказ оформлен! \n";
                   }
		// НАЧАЛО ПРОВЕРКА
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//a[@href='/personal/order/']"));
			$reg1->click();
			sleep(3);
			try{
			$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//span[@class='blockgreen' and contains(text(),'Новый')]"));
			echo "Страница содержит 'Новый заказ' ";
		}
		catch(NoSuchElementException $ex) {
			echo "\n Страница не содержит 'Новый заказ'  \n";
		}
		$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//a[@href='/?logout=yes']"));
		$reg1->click();
	}
	
	}
	catch(Exception $ex) {}
}
}
?>
