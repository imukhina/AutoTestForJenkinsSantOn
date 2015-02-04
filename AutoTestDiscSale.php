<?php
class AutoTestDiscSale extends PHPUnit_Framework_TestCase

/**
 * @expectedException Exception
 */
{
		protected $url = 'http://admin:qwerty6@stand.santehnika-online.ru/?ab=162'; 
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

	public function testDiscSale() 
	{

		$DiscSale=$this->webDriver->get($this->url);
		$DiscSale=$this->webDriver->manage()->window()->maximize();
		$b = array();
		$c = array();
		
		$a = array(
      /*     "//a[@title='Раковины']",
           "//a[@title='Мебель для ванной']",
           "//a[@title='Унитазы']",
		   "//a[@title='Писсуары']",
		   "//a[@title='Кухонные мойки']",
		   "//a[@title='Смесители']",
		   "//a[@title='Душевая программа']",
		   "//a[@title='Биде']",
		   "//a[@title='Инсталляции']",
		   "//a[@title='Сифоны']",
		   "//a[@title='Полотенцесушители']",
		   "//a[@title='Водонагреватели']",
		   "//a[@title='Радиаторы отопления']",
		   "//a[@title='Обогреватели']",
		   "//a[@title='Теплые полы']", */
		   "//a[@title='Трапы и душевые лотки']"
		   );
		
		foreach ($a as $v) { 
			$DiscSale = $this->webDriver->findElement(WebDriverBy::xpath($v));
        	$DiscSale->click(); 
			$DiscSaleP = $this->webDriver->findElement(WebDriverBy::xpath($v))->getText();
			echo "\n Открываем страницу $DiscSaleP \n";
	try{	
		try {
				$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//li/a[contains(@href,'sale')]"));
				if ($reg1->isDisplayed()) {
					$DiscSalePage = $this->webDriver->findElement(WebDriverBy::xpath("//div/h2/a"))->getText(); 
					array_push($b,$DiscSalePage);
					$reg = $this->webDriver->findElement(WebDriverBy::xpath("//li/a[contains(@href,'sale')]"));
					$reg->click();
					sleep(3);
					$regP = $this->webDriver->findElement(WebDriverBy::xpath("//div[1][@class='product list newsec withdisc']"))->getText();
					sleep(3);
					$reg = $this->webDriver->findElement(WebDriverBy::xpath("//div[1][@class='product list newsec withdisc']/span[@class='photo']/a"));
                	$reg->click(); 
                	sleep(2);
                	$reg = $this->webDriver->findElement(WebDriverBy::xpath("//p[@class='akciya']"));
                	sleep(2);
                	if ($reg->isDisplayed()) {
                		echo "Есть товар с Акцией на странице  $regP";
                	} else {
                		throw new PHPUnit_Framework_Exception ;
                		
                	}
                	$DiscSale = $this->webDriver->findElement(WebDriverBy::xpath($v));
                	$DiscSale->click();
				}

			
	  
				
				$reg2 = $this->webDriver->findElement(WebDriverBy::xpath("//li[@class='nopercent']/a[contains(@href,'ucenka')]"));
				if ($reg2->isDisplayed()) {
					$DiscSalePage = $this->webDriver->findElement(WebDriverBy::xpath("//div/h2/a"))->getText(); 
					array_push($c,$DiscSalePage);
					$reg = $this->webDriver->findElement(WebDriverBy::xpath("//li[@class='nopercent']/a[contains(@href,'ucenka')]"));
					$reg->click();
					$regP = $this->webDriver->findElement(WebDriverBy::xpath("//div[1][@class='product list newsec withdisc']"))->getText();
					
                	$reg = $this->webDriver->findElement(WebDriverBy::xpath("//div[1][@class='product list newsec withdisc']/span[@class='photo']/a"));
                	$reg->click();
                	$reg = $this->webDriver->findElement(WebDriverBy::xpath("//p[@class='akciya']"));
                	if ($reg->isDisplayed()) {
                		echo "Есть товар с Уценкой на странице $regP ";
                	} else {
                		throw new PHPUnit_Framework_Exception ;
                		
                	}				
				}		
			}
		catch(PHPUnit_Framework_Exception $ex) {
		
			}



	}
	catch(Exception $ex){}
	}
	/*
	$DiscSale = $this->webDriver->findElement(WebDriverBy::xpath("//a[@title='Душевые кабины и углы']"));
	$DiscSale->click();
	$sb = array(
	           "//a[@title='Душевые кабины']",
			   "//a[@title='Душевые боксы']",
			   "//a[@title='Уголки, ограждения, поддоны']"
	);
	
	foreach ($sb as $v) { 
		
		
	    $DiscSale = $this->webDriver->findElement(WebDriverBy::xpath($v));
        $DiscSale->click();
        sleep(2);
		$DiscSaleP = $this->webDriver->findElement(WebDriverBy::xpath($v))->getText();
		echo "\n Открываем страницу $DiscSaleP \n";
	try{	
		try {
				$shower = $this->webDriver->findElement(WebDriverBy::xpath("//li/a[contains(@href,'sale')]"));
				sleep(2);
				if ($shower ->isDisplayed()) {
					$DiscSalePage = $this->webDriver->findElement(WebDriverBy::xpath("//div/h2/a"))->getText(); 
					array_push($b,$DiscSalePage);
					sleep(2);
					$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//a[contains(@href,'sale')]"));
					$reg1->click();
					sleep(3);
					$regP = $this->webDriver->findElement(WebDriverBy::xpath("//div[1][@class='product list newsec withdisc']"))->getText();
					sleep(3);
					$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//div[1][@class='product list newsec withdisc']/span[@class='photo']/a"));
                	$reg1->click(); 
                	sleep(2);
                	$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//p[@class='akciya']"));
                	sleep(2);
                	if ($reg1->isDisplayed()) {
                		echo "Есть товар с Акцией на странице  $regP";
                	} else {
                		throw new PHPUnit_Framework_Exception ;
                		
                	}
                	
                	
				}
				$DiscSale = $this->webDriver->findElement(WebDriverBy::xpath($v));
                $DiscSale->click();
				
	  			sleep(2);
				
				$reg2 = $this->webDriver->findElement(WebDriverBy::xpath("//li[@class='nopercent']/a[contains(@href,'ucenka')]"));
				if ($reg2->isDisplayed()) {
					$DiscSalePage = $this->webDriver->findElement(WebDriverBy::xpath("//div/h2/a"))->getText(); 
					$reg2 = $this->webDriver->findElement(WebDriverBy::xpath("//li[@class='nopercent']/a[contains(@href,'ucenka')]"));
					$reg2->click();
					$regP = $this->webDriver->findElement(WebDriverBy::xpath("//div[1][@class='product list newsec withdisc']"))->getText();
					
                	$reg2 = $this->webDriver->findElement(WebDriverBy::xpath("//div[1][@class='product list newsec withdisc']/span[@class='photo']/a"));
                	$reg2->click();
                	$reg2 = $this->webDriver->findElement(WebDriverBy::xpath("//p[@class='akciya']"));
                	if ($reg2->isDisplayed()) {
                		echo "Есть товар с Уценкой на странице $regP ";
                	} else {
                		throw new PHPUnit_Framework_Exception ;
                		
                	}
                	array_push($c,$DiscSalePage);				
				}		
			}
		catch(PHPUnit_Framework_Exception $ex) {
		
			}



	}





	catch(Exception $ex){}
	} 
	
	 $DiscSale = $this->webDriver->findElement(WebDriverBy::xpath("//a[@title='Ванны']"));
	 $DiscSale->click();
	 sleep(2);
	 $bath = array(
	           "//a[@title='Акриловые ванны']",
			   "//a[@title='Чугунные ванны']",
			   "//a[@title='Стальные ванны']",
			   "//a[@title='Ванны из литьевого мрамора']"
	);

	foreach ($bath as $v) { 
		$DiscSale = $this->webDriver->findElement(WebDriverBy::xpath($v));
		sleep(2);
        $DiscSale->click(); 
        $DiscSaleP = $this->webDriver->findElement(WebDriverBy::xpath($v))->getText();
		echo "\n Открываем страницу $DiscSaleP \n";
	try{	
		try {
				$bath = $this->webDriver->findElement(WebDriverBy::xpath("//li/a[contains(@href,'sale')]"));
				sleep(2);
				if ($bath ->isDisplayed()) {
					$DiscSalePage = $this->webDriver->findElement(WebDriverBy::xpath("//div/h2/a"))->getText(); 
					array_push($b,$DiscSalePage);
					sleep(2);
					$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//a[contains(@href,'sale')]"));
					$reg1->click();
					sleep(3);
					$regP = $this->webDriver->findElement(WebDriverBy::xpath("//div[1][@class='product list newsec withdisc']"))->getText();
					sleep(3);
					$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//div[1][@class='product list newsec withdisc']/span[@class='photo']/a"));
                	$reg1->click(); 
                	sleep(2);
                	$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//p[@class='akciya']"));
                	sleep(2);
                	if ($reg1->isDisplayed()) {
                		echo "Есть товар с Акцией на странице  $regP \n";
                	} else {
                		throw new PHPUnit_Framework_Exception ;
                		
                	}
                	
                	
				}
				$DiscSale = $this->webDriver->findElement(WebDriverBy::xpath($v));
                $DiscSale->click();
				
	  			sleep(2);
				
				$reg2 = $this->webDriver->findElement(WebDriverBy::xpath("//li[@class='nopercent']/a[contains(@href,'ucenka')]"));  
				if ($reg2->isDisplayed()) {
					$DiscSalePage = $this->webDriver->findElement(WebDriverBy::xpath("//div/h2/a"))->getText(); 
					$reg2 = $this->webDriver->findElement(WebDriverBy::xpath("//li[@class='nopercent']/a[contains(@href,'ucenka')]"));
					$reg2->click();
					$regP = $this->webDriver->findElement(WebDriverBy::xpath("//div[1][@class='product list newsec withdisc']"))->getText();
					
                	$reg2 = $this->webDriver->findElement(WebDriverBy::xpath("//div[1][@class='product list newsec withdisc']/span[@class='photo']/a"));
                	$reg2->click();
                	$reg2 = $this->webDriver->findElement(WebDriverBy::xpath("//p[@class='akciya']"));
                	if ($reg2->isDisplayed()) {
                		echo "Есть товар с Уценкой на странице $regP \n";
                	} else {
                		throw new PHPUnit_Framework_Exception ;
                		
                	}
                	array_push($c,$DiscSalePage);				
				}		
			}
		catch(PHPUnit_Framework_Exception $ex) {
		
			}

	}
	catch(Exception $ex){}
	}
	
	sleep(2);
	$DiscSale = $this->webDriver->findElement(WebDriverBy::xpath("//a[@title='Комплектующие']"));
	$DiscSale->click();
	$equip = array(
	           "//a[@title='для мебели']",
			   "//a[@title='для душевых кабин']",
			   "//a[@title='для ванн']",
			   "//a[@title='для унитазов']",
			   "//a[@title='для раковин']",
			   "//a[@title='для кухонных моек']",
			   "//a[@title='для смесителей']",
			   "//a[@title='для биде']",
			   "//a[@title='для писсуаров']",
			   "//a[@title='для теплотехники']"
	);
foreach ($equip as $v) { 
		$DiscSale = $this->webDriver->findElement(WebDriverBy::xpath($v));
        $DiscSale->click(); 
        $DiscSaleP = $this->webDriver->findElement(WebDriverBy::xpath($v))->getText();
		echo "\n Открываем страницу $DiscSaleP \n";
	try{	
		try {
				$bath = $this->webDriver->findElement(WebDriverBy::xpath("//li/a[contains(@href,'sale')]"));
				sleep(2);
				if ($bath ->isDisplayed()) {
					$DiscSalePage = $this->webDriver->findElement(WebDriverBy::xpath("//div/h2/a"))->getText(); 
					array_push($b,$DiscSalePage);
					sleep(2);
					$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//a[contains(@href,'sale')]"));
					$reg1->click();
					sleep(3);
					$regP = $this->webDriver->findElement(WebDriverBy::xpath("//div[1][@class='product list newsec withdisc']"))->getText();
					sleep(3);
					$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//div[1][@class='product list newsec withdisc']/span[@class='photo']/a"));
                	$reg1->click(); 
                	sleep(2);
                	$reg1 = $this->webDriver->findElement(WebDriverBy::xpath("//p[@class='akciya']"));
                	sleep(2);
                	if ($reg1->isDisplayed()) {
                		echo "Есть товар с Акцией на странице  $regP \n";
                	} else {
                		throw new PHPUnit_Framework_Exception ;
                		
                	}
                	
                	
				}
				$DiscSale = $this->webDriver->findElement(WebDriverBy::xpath($v));
                $DiscSale->click();
				
	  			sleep(2);
				
				$reg2 = $this->webDriver->findElement(WebDriverBy::xpath("//li[@class='nopercent']/a[contains(@href,'ucenka')]"));
				if ($reg2->isDisplayed()) {
					$DiscSalePage = $this->webDriver->findElement(WebDriverBy::xpath("//div/h2/a"))->getText(); 
					$reg2 = $this->webDriver->findElement(WebDriverBy::xpath("//li[@class='nopercent']/a[contains(@href,'ucenka')]"));
					$reg2->click();
					$regP = $this->webDriver->findElement(WebDriverBy::xpath("//div[1][@class='product list newsec withdisc']"))->getText();
					
                	$reg2 = $this->webDriver->findElement(WebDriverBy::xpath("//div[1][@class='product list newsec withdisc']/span[@class='photo']/a"));
                	$reg2->click();
                	$reg2 = $this->webDriver->findElement(WebDriverBy::xpath("//p[@class='akciya']"));
                	if ($reg2->isDisplayed()) {
                		echo "Есть товар с Уценкой на странице $regP \n";
                	} else {
                		throw new PHPUnit_Framework_Exception ;
                		
                	}
                	array_push($c,$DiscSalePage);				
				}		
			}
		catch(PHPUnit_Framework_Exception $ex) {
		
			}


	}
	catch(Exception $ex){}
	}
	
	*/
	echo "\n  'Заходим в разделы  Акции и Уценка'\n";
	$d = array(); // Для названий товаров в акции

	$DiscSale = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='sidebar']/aside/div[3]/div/div/div/nav/ul/li[1]/a"));
    $DiscSale->click(); 
	$DiscSale = $this->webDriver->findElements(WebDriverBy::xpath("//*[@id='content']/div[@class='incat']/ul/li"));
	$countresult = count($DiscSale);
	

	for ($i=1;$i<=$countresult;$i++) {
			$DiscSale = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='content']/div[@class='incat']/ul/li[$i]"))->getText();
		array_push($d,$DiscSale);
		}

	$e = array();
	$DiscSale = $this->webDriver->findElement(WebDriverBy::xpath("//a[@href='/discount/ucenka/']"));
    $DiscSale->click(); 
	$DiscSale = $this->webDriver->findElements(WebDriverBy::xpath("//*[@id='content']/div[@class='incat']/ul/li"));
	$countresult2 = count($DiscSale);

	for ($x=1;$x<=$countresult2;$x++) {
			$DiscSale = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='content']/div[@class='incat']/ul/li[$x]"))->getText();
		array_push($e,$DiscSale);

		}	
	$t = 0;
	sort($d);
	sort($b);
	
	$dn= array();
	foreach ($d as $r) {
			$r = preg_replace ("/[0-9]/","",$r);
			$r = preg_replace ("/[()]/","",$r);
			$r = rtrim ($r);
			array_push($dn,$r);

	} 
	$result = array_diff($b, $dn);
	$result1 = array_diff($dn, $b);
	$rres1 = count($result1);
	echo "\n $rres1 каунт \n";


	sort($c);
	sort($e);

	$eu = array();
		foreach ($e as $s) {
			$s = preg_replace ("/[0-9]/","",$s);
			$s = preg_replace ("/[()]/","",$s);
			$s = rtrim ($s);
			array_push($eu,$s);
	}
	$result2 = array_diff($c, $eu);
	$result3 = array_diff($eu, $c);

	echo "\n  'Осуществляем проверку'\n";
	
	try{
		try{	
			$res2 = count($result2);
				if($res2==0) {
						echo "\n Все ок, соответствует Раздел 'Уценка' и ссылки в категориях  \n";
						    }
			else {
					foreach ($result2 as $v) {
					echo "\n Отсутствует ссылка $v на странице категории \n";
				 	}
					throw new PHPUnit_Framework_Exception("\n Ошибка\n");		
			
		  		}	
		    }
		catch(PHPUnit_Framework_Exception $ex) {
			throw new Exception("Error Processing Request");
			
		}

		try {
				$res3 = count($result3);
				if($res2==0) {
						echo "Все ок, соответствует ссылки в категориях и раздел  'Уценка' \n";
						    }
			else {
					foreach ($result3 as $v) {
					echo "\n Отсутствует $v на странице Уценки \n";
				 	}
					throw new PHPUnit_Framework_Exception("\n Ошибка\n");		
			
		  		}

			}
		catch (PHPUnit_Framework_Exception $ex)	{
			throw new Exception("Error Processing Request");
		}
			
		try {
				$res = count($result);
				echo $res;
				if($res==0) {
						echo "Все ок, соответствует ссылки в категориях и раздел  'Акции' \n"; 
						    }
			else {
					foreach ($result as $v) {
					echo "\n Отсутствует  $v на странице Акции \n";
				 	}
					throw new PHPUnit_Framework_Exception("\n Ошибка\n");		
		  		}
		}
		catch(PHPUnit_Framework_Exception $ex)	{
			throw new Exception("Error Processing Request");
			
		}
		
		try {
				echo "\n $rres1 каунт \n";
				//$rres1 = count($result1);
				var_dump($rres1==0);
				if($rres1==0) {
						  echo "Все ок, соответствует Раздел 'Акции' и ссылки в категориях  \n";
						    }
			else {	
					
					foreach ($result1 as $v) {
					 echo "\n Отсутствует ссылка $v на странице категории\n";
					 throw new PHPUnit_Framework_Error("\n Ошибка\n");
				 	}
		  		}
		}
		catch(PHPUnit_Framework_Error $ex)	{ 
			throw $ex;
			
		}
	}
	catch (Exception $ex) {} 
/*	print_r($d);
	print_r($b);
	print_r($dn);
	print_r($c);
	print_r($eu); */
	print_r($result);
	print_r($result1);
//print_r($result2);
//print_r($result3);
	}

 }	
?>