<?php

class Sant_On_demo_zakaz extends PHPUnit_Framework_TestCase
{
		protected $url = 'http://admin:qwerty6@stand.santehnika-online.ru' ; 
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
    
	public function testSant_On_demo()
  {

	$this->webDriver->get($this->url);
	sleep (5);
//	$this->windowMaximize();
	echo "\n". "Выбираем каталог 'Биде' " ."\n";
	$search = $this->webDriver->takeScreenshot('/var/www/line_media/screen1.png');
    echo "\n".'http://localhost/screen1.png'."\n";
	//стартовая страница
    $search = $this->webDriver->findElement(WebDriverBy::xpath("//a[@title='Биде']"));  
    $search->click();
 	$search = $this->webDriver->takeScreenshot('/var/www/line_media/screen2.png');
    echo "\n".'http://localhost/screen2.png'."\n";
	//каталог биде
    echo "\n". "Выбираем товар  'Биде напольное Roca Victoria 357390000' " ."\n";
	$search = $this->webDriver->findElement(WebDriverBy::xpath("//*/img[@title='Биде напольное Roca Victoria 357390000']"));  
    $search->click();
	$search = $this->webDriver->takeScreenshot('/var/www/line_media/screen3.png');
    echo "\n".'http://localhost/screen3.png'."\n";
	//биде Roca Victoria
	echo "\n". "Нажимаем кнопку 'В корзину' " ."\n";
    $search = $this->webDriver->findElement(WebDriverBy::xpath("//noindex/a[@class='order']"));  
    $search->click();
	$search = $this->webDriver->takeScreenshot('/var/www/line_media/screen4.png');
    echo "\n".'http://localhost/screen4.png'."\n";
	//попап перейти в корзину
	echo "\n". "Нажимаем кнопку 'Перейти в корзину' " ."\n";
	$search = $this->webDriver->findElement(WebDriverBy::xpath("//a[@class='jumpbask']"));  
    $search->click();
	$search = $this->webDriver->takeScreenshot('/var/www/line_media/screen5.png');
    echo "\n".'http://localhost/screen5.png'."\n";
	//форма оформления заказа
	echo "\n". "Заполняем форму оформления заказа" ."\n";
	$search = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='NEW_LOGIN']"));  
    $search->click();
	sleep(5);
	$search = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='NEW_LOGIN']")); 
	$search->sendKeys("9777777771");
    sleep(5);
	$FIO="user".rand(1,10000);
	$search = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='NEW_FIO']"));  
    $search->click();
	sleep(5);
    $search = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='NEW_FIO']")); 
	$search->sendKeys($FIO);
	sleep(5);
	$mail= $FIO."@mail.ru";
	$search = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='NEW_EMAIL']")); 
	$search->sendKeys($mail);
    sleep(5);
	$search = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='ORDER_PROP_29']")); 
	$search->sendKeys("Самовывоз");
	sleep(5);
    $search = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='order_ajax_button']"));  
    $search->click();
	sleep(2);
	echo "\n". "Нажимаем кнопку 'Закончить оформление' " ."\n";
	$search = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='order_ajax_button']"));  
    $search->click();
	sleep(2);
	$search = $this->webDriver->takeScreenshot('/var/www/line_media/screen6.png'); 
	echo "\n".'http://localhost/screen6.png'."\n";
	//Спасибо, Ваш заказ оформлен!
	$check = $this->webDriver->findElement(WebDriverBy::xpath("//h3[text()='Спасибо, Ваш заказ оформлен!']"))->getText();
	$check1 = "Спасибо, Ваш заказ оформлен!";
	$this->assertTrue($check==$check1, "Тест провален");
	echo "\n". "'Спасибо, Ваш заказ оформлен'" ."\n";
	echo "\n". "Тест завершен успешно" ."\n"; 
	
	
	}

	public function testSant_On_demo_fail()
  {

	$this->webDriver->get($this->url);
	sleep (5);
//	$this->windowMaximize();
	
	echo "\n". "Выбираем каталог 'Биде' " ."\n";
	$search = $this->webDriver->takeScreenshot('/var/www/line_media/screen_f1.png');
    echo "\n".'http://localhost/screen_f1.png'."\n";
	//стартовая страница
    $search = $this->webDriver->findElement(WebDriverBy::xpath("//a[@title='Биде']"));  
    $search->click();
 	$search = $this->webDriver->takeScreenshot('/var/www/line_media/screen_f2.png'); 
	echo "\n".'http://localhost/screen_f2.png'."\n";
	//каталог биде
    echo "\n". "Выбираем товар  'Биде напольное Roca Victoria 357390000' " ."\n";
	$search = $this->webDriver->findElement(WebDriverBy::xpath("//*/img[@title='Биде напольное Roca Victoria 357390000']"));  
    $search->click();
	$search = $this->webDriver->takeScreenshot('/var/www/line_media/screen_f3.png');
    echo "\n".'http://localhost/screen_f3.png'."\n";
	//биде Roca Victoria
	echo "\n". "Нажимаем кнопку 'В корзину' " ."\n";
    $search = $this->webDriver->findElement(WebDriverBy::xpath("//noindex/a[@class='order']"));  
    $search->click();
	$search = $this->webDriver->takeScreenshot('/var/www/line_media/screen_f4.png'); //попап перейти в корзину
	echo "\n".'http://localhost/screen_f4.png'."\n";
	echo "\n". "Нажимаем кнопку 'Перейти в корзину' " ."\n";
	$search = $this->webDriver->findElement(WebDriverBy::xpath("//a[@class='jumpbask']"));  
    $search->click();
	$search = $this->webDriver->takeScreenshot('/var/www/line_media/screen_f5.png'); //форма оформления заказа
	echo "\n".'http://localhost/screen_f5.png'."\n";
	echo "\n". "Заполняем форму оформления заказа" ."\n";
	$search = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='NEW_LOGIN']"));  
    $search->click();
	sleep(5);
	$search = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='NEW_LOGIN']")); 
	$search->sendKeys("9777777771");
    sleep(5);
	$FIO="user".rand(1,10000);
	$search = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='NEW_FIO']"));  
    $search->click();
	sleep(5);
    $search = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='NEW_FIO']")); 
	$search->sendKeys($FIO);
	sleep(5);
	$mail= $FIO."@mail.ru";
	$search = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='NEW_EMAIL']")); 
	$search->sendKeys($mail);
    sleep(5);
	$search = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='ORDER_PROP_29']")); 
	$search->sendKeys("Самовывоз");
	sleep(5);
    $search = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='order_ajax_button']"));  
    $search->click();
	sleep(2);
	echo "\n". "Нажимаем кнопку 'Закончить оформление' " ."\n";
	$search = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='order_ajax_button']"));  
    $search->click();
	sleep(2);
	$search = $this->webDriver->takeScreenshot('/var/www/line_media/screen_f6.png');
	echo "\n".'http://localhost/screen_f6.png'."\n";
	$check = $this->webDriver->findElement(WebDriverBy::xpath("//h3[text()='Спасибо, Ваш заказ оформлен!']"))->getText();
	$check1 = "Спасибо, Ваш заказ не оформлен!";
	$this->assertTrue($check==$check1, "Тест провален");
	echo "\n". "Тест завершен успешно" ."\n"; 
	
	
	}
	

}

 
?>
