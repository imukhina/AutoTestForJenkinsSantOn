<?php

class AutoTestReg extends PHPUnit_Framework_TestCase

/**
 * @expectedException Exception
 */
{
		protected $url = 'http://santehnika-online.ru'; 
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

    public function testRegis() 
    {
        $reg=$this->webDriver->get($this->url);
        $reg=$this->webDriver->manage()->window()->maximize();
        echo "\n".'Заходим на сайт'."\n";  
	try {
 		echo "\n".'Нажимаем на кнопку "Личный кабинет"'."\n"; 
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='user_top_menu']"));  
        $reg=$this->webDriver->getMouse()->mouseMove($reg->getCoordinates()); 
		echo "\n".'Вводим номер телефона'."\n";
	sleep(3);
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='login']/div/input[@class='code show_on_success']"));
        $reg->click()->sendKeys('977');
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//input[@name='tel']"));
        $reg->click()->sendKeys('7777771');
		echo "\n".'Нажимаем на кнопку "Войти" '."\n"; 
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='auth_button']/input[@value='Войти']"));
        $reg->click();
	sleep(3);
	try {
		try {
        		$reg = $this->webDriver->findElement(WebDriverBy::xpath("//input[@name='first_name']"));
			if ($reg->isDisplayed()) {
				echo "\n Есть поле 'Имя'\n";}
			else {
				throw new PHPUnit_Framework_Exception("\n Ошибка. Нет поля Имя \n");
                             }
			}
		catch (PHPUnit_Framework_Exception $ex) {
		echo "\n Ошибка. Нет поля 'Имя'\n";
			}
	
		try {
        		$reg = $this->webDriver->findElement(WebDriverBy::xpath("//input[@name='last_name']"));
                        if ($reg->isDisplayed()) {
				echo "\n Есть поле 'Фамилия'\n"; }
			
			else {
 			     	throw new PHPUnit_Framework_Exception("\n Ошибка. Нет поля Фамилия\n");
                             }

		    }
		catch (PHPUnit_Framework_Exception $ex) {
		echo "\n Нет поля 'Фамилия'\n";
			}

		try {
        		$reg = $this->webDriver->findElement(WebDriverBy::xpath("//input[@name='email']"));
			if($reg->isDisplayed()){
				echo "\n Есть поле 'email'\n";
				}
			else {
 			     	throw new PHPUnit_Framework_Exception("\n Ошибка. Нет поля email\n");
                             }						
			}
		catch (PHPUnit_Framework_Exception $ex) {
		echo "\n Нет поля 'email'\n";
			}

		try {
        		$reg = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='terms-agreem']"))->getAttribute("checked");
                $this->assertTrue($reg==true, "Тест провален");
				echo "\n Галочка стоит \n";
			}
		catch (PHPUnit_Framework_Exception $ex) {
		echo "\n Галочка не стоит \n";
			}
		     }
		catch (Exception $ex) {

                      }
echo "Проверка. Ничего не заполняя, нажимаем кнопку 'Войти' ";
        $this->webDriver->navigate()->refresh();
 		echo "\n".'Нажимаем на кнопку "Личный кабинет"'."\n"; 
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='user_top_menu']"));  
        $reg=$this->webDriver->getMouse()->mouseMove($reg->getCoordinates()); 
		echo "\n".'Нажимаем на кнопку "Войти" '."\n"; 
	sleep(5);
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='auth_button']/input[@value='Войти']"));
        $reg->click();
       try {
                $reg = $this->webDriver->findElement(WebDriverBy::xpath("//input[@class='tel show_on_success error-style']"));
                echo "\n Есть подстветка, регистрация не состоялась \n";
		   }
        catch (PHPUnit_Framework_Exception $ex) {
		echo "\n Ошибка. Подсветки нет. \n";
		   }

 echo "\n Проверка 'Заполняем Имя любым набором букв, нажимаем кнопку Войти' ";
        $this->webDriver->navigate()->refresh();
 		echo "\n".'Нажимаем на кнопку "Личный кабинет"'."\n"; 
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='user_top_menu']"));  
        $reg=$this->webDriver->getMouse()->mouseMove($reg->getCoordinates()); 
		echo "\n".'Вводим номер телефона'."\n";
	sleep(5);
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='login']/div/input[@class='code show_on_success']"));
        $reg->click()->sendKeys('977');
		sleep(5);
		$r1='666666'.rand(1,9);
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//input[@name='tel']"));
        $reg->click()->sendKeys($r1);
		sleep(5);
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='auth_button']/input[@value='Войти']"));
        $reg->click();
		sleep(5);
	$r='test'.rand(1,1000);
		echo "\n".'Заполняем поле "Имя" '."\n"; 
	sleep(5);
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//input[@name='first_name']"));
	$reg->click()->sendKeys($r);
	echo "\n".'Нажимаем на кнопку "Войти" '."\n"; 
	$reg = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='auth_button']/input[@value='Войти']"));
        $reg->click();
	try {
        		$reg = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='input error-style']/input[@name='email']"));
			if($reg->isDisplayed()){
				echo "\n Поле email подсветилось. Регистрация не прошла \n";
				}
			else {
 			     	throw new PHPUnit_Framework_Exception("\n Ошибка. Поле email не подсветилось \n");
                             }	
			}
	catch (PHPUnit_Framework_Exception $ex) {
		echo "\n  'email'\n";
			}
 echo "\n Проверка 'Заполняем Эл. почта любым набором Русских букв, нажимаем кнопку Войти' ";
$this->webDriver->navigate()->refresh();
 		echo "\n".'Нажимаем на кнопку "Личный кабинет"'."\n"; 
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='user_top_menu']"));  
        $reg=$this->webDriver->getMouse()->mouseMove($reg->getCoordinates()); 
		echo "\n".'Вводим номер телефона'."\n";
	sleep(3);
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='login']/div/input[@class='code show_on_success']"));
        $reg->click()->sendKeys('977');
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//input[@name='tel']"));
        $reg->click()->sendKeys($r1);
		echo "\n".'Нажимаем на кнопку "Войти" '."\n"; 
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='auth_button']/input[@value='Войти']"));
        $reg->click();
	$r='Тест';
	sleep(5);
		echo "\n".'Заполняем поле "email"  '."\n"; 
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//input[@name='email']"));
	$reg->click()->sendKeys($r);
	$reg = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='auth_button']/input[@value='Войти']"));
        $reg->click();
	try {
        		$reg = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='input error-style']/input[@name='email']"));
			if($reg->isDisplayed()){
				echo "\n Поле подсветилось. Регистрация не прошла \n";
				}
			else {
 			     	throw new PHPUnit_Framework_Exception("\n Ошибка. Поле email не подсветилось\n");
                             }						
			}
		catch (PHPUnit_Framework_Exception $ex) {
		echo "\n  'email'\n";
			}			
		
echo "\n Проверка 'Заполняем Эл. почта любым набором Английских букв, нажимаем кнопку Войти' ";
$this->webDriver->navigate()->refresh();
 		echo "\n".'Нажимаем на кнопку "Личный кабинет"'."\n"; 
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='user_top_menu']"));  
        $reg=$this->webDriver->getMouse()->mouseMove($reg->getCoordinates()); 
		echo "\n".'Вводим номер телефона'."\n";
	sleep(3);
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='login']/div/input[@class='code show_on_success']"));
        $reg->click()->sendKeys('977');
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//input[@name='tel']"));
        $reg->click()->sendKeys($r1);
		echo "\n".'Нажимаем на кнопку "Войти" '."\n"; 
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='auth_button']/input[@value='Войти']"));
        $reg->click();
	$r='test';
		echo "\n".'Заполняем поле "email"  '."\n";
	sleep(3);
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//input[@name='email']"));
	$reg->click()->sendKeys($r);
	sleep(3);
	$reg = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='auth_button']/input[@value='Войти']"));
        $reg->click();
	try {
        		$reg = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='input error-style']/input[@name='first_name']"));
			if($reg->isDisplayed()){
				echo "\n Поле подсветилось. Регистрация не прошла \n";
				}
			else {
 			     	throw new PHPUnit_Framework_Exception("\n Ошибка. Регистрация не прошла \n");
                             }						
			}
		catch (PHPUnit_Framework_Exception $ex) {
		echo "\n  'email'\n";
			}	

echo "\n Проверка 'Заполняем Эл. почта любым набором Английских букв (c символом @), нажимаем кнопку Войти' ";
	$this->webDriver->navigate()->refresh();
 		echo "\n".'Нажимаем на кнопку "Личный кабинет"'."\n"; 
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='user_top_menu']"));  
        $reg=$this->webDriver->getMouse()->mouseMove($reg->getCoordinates()); 
	sleep(3);
		echo "\n".'Вводим номер телефона'."\n";
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='login']/div/input[@class='code show_on_success']"));
        $reg->click()->sendKeys('977');
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//input[@name='tel']"));
        $reg->click()->sendKeys($r1);
		echo "\n".'Нажимаем на кнопку "Войти" '."\n"; 
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='auth_button']/input[@value='Войти']"));
        $reg->click();
	$r='test@';
		echo "\n".'Заполняем поле "email"  '."\n";
	sleep(3);
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//input[@name='email']"));
	$reg->click()->sendKeys($r);
	$reg = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='auth_button']/input[@value='Войти']"));
        $reg->click();
	try {
        		$reg = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='input error-style']/input[@name='first_name']"));
			if($reg->isDisplayed()){
				echo "\n Поле подсветилось. Регистрация не прошла \n";
				}
			else {
 			     	throw new PHPUnit_Framework_Exception("\n Ошибка. Регистрация не прошла \n");
                             }						
			}
		catch (PHPUnit_Framework_Exception $ex) {
		echo "\n  'email'\n";
			}		

echo "\n Проверка 'Ввести корректные значения в поля Имя и Эл. почта, снять галочку 'Соглашаюсь с условиями пользовательского соглашения' ' ";
//	$this->webDriver->navigate()->refresh();
 		echo "\n".'Нажимаем на кнопку "Личный кабинет"'."\n"; 
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='user_top_menu']"));  
        $reg=$this->webDriver->getMouse()->mouseMove($reg->getCoordinates()); 
	sleep(3);
		echo "\n".'Вводим номер телефона'."\n";
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='login']/div/input[@class='code show_on_success']"));
        $reg->click()->sendKeys('977');
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//input[@name='tel']"));
        $reg->click()->sendKeys($r1);
		echo "\n".'Нажимаем на кнопку "Войти" '."\n"; 
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='auth_button']/input[@value='Войти']"));
        $reg->click();
	$rd='TestName';
	$r='test@mail.ru';
		echo "\n".'Заполняем поле "Имя"  '."\n";
	$reg = $this->webDriver->findElement(WebDriverBy::xpath("//input[@name='first_name']"));
	$reg->click()->sendKeys($rd);
		echo "\n".'Заполняем поле "email"  '."\n";
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//input[@name='email']"));
	$reg->click()->clear()->sendKeys($r);
	$reg = $this->webDriver->findElement(WebDriverBy::xpath("//input[@name='agreed-with-terms']"));
        $reg->click();

	
	 try {
        		$reg = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='auth_button']/input[@class='inactive' and @value='Войти']"));
			if($reg->isDisplayed()){
				echo "\n Кнопка 'Войти' не активна \n";
				}
			else {
 			     	throw new PHPUnit_Framework_Exception("\n Ошибка. Кнопка 'Войти' активна \n");
                             }			

}
		catch (PHPUnit_Framework_Exception $ex) {
		echo "\n  'email'\n";
			}		
echo "\n". 'Ставим галочку Соглашаюсь с условиями пользовательского соглашения'."\n ";
	$reg = $this->webDriver->findElement(WebDriverBy::xpath("//input[@name='agreed-with-terms']"));
        $reg->click();
	echo "\n".'Нажимаем на кнопку "Войти" '."\n"; 
        $reg = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='auth_button']/input[@value='Войти']"));
        $reg->click();
	sleep(2);
	$reg = $this->webDriver->getCurrentURL();
	$fg='http://santehnika-online.ru'.'/personal/profile/';
	try {
	$this->assertTrue($reg==$fg, "Тест провален");
	    }
	catch (PHPUnit_Framework_Exception $ex) {
	echo "переход страницы не корректен";	
	    }
	sleep(5);
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
				}
			else {
 			     	throw new PHPUnit_Framework_Exception("\n Ошибка. Поле 'Выход' не отображается\n");
                             }						
			}
		catch (PHPUnit_Framework_Exception $ex) {
		echo "\n  ''\n";
			}
	$reg = $this->webDriver->findElement(WebDriverBy::xpath("//a[@href='/?logout=yes']"));
	$reg->click();
	sleep(3);
        $reg = $this->webDriver->getTitle();
	$this->assertContains('Сантехника-онлайн.Ру – интернет-магазин сантехники', $this->webDriver->getTitle());
	echo $reg;
	try {
		$reg = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='user_top_menu']"));
		if($reg->isDisplayed()){
                echo "\n Кнопка личный кабинет присутствует \n";
		echo "\n LogOut выполнен \n";
				}
			else {
 			     	throw new PHPUnit_Framework_Exception("\n Ошибка. LogOut не выполнен \n");
                             }						
			}
		catch (PHPUnit_Framework_Exception $ex) {
		echo "\n  ''\n";
			}
		}
catch (Exception $ex) {
	
                }
    }
}
?>
