<?php
require_once 'AutoTestFullPurchase.php';

class AutoTestFullPurchasePack extends AutoTestFullPurchase
{
/**
 * @expectedException Exception
 */
	
    public function testFullPurchasePack() 
    {	
		$this->regFullPurch();
		$ftm = array(
		/* "//a[@title='Мебель для ванной']"
		   "//a[@title='Раковины']",
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
        $this->FullPurch($ftm);
		sleep(5);
		$DiscSale = $this->webDriver->findElement(WebDriverBy::xpath("//a[@title='Душевые кабины и углы']"));
		$DiscSale->click();
		sleep(5);
		$sb = array(
	        /*   "//a[@title='Душевые кабины']",
			   "//a[@title='Душевые боксы']", */
			   "//a[@title='Уголки, ограждения, поддоны']"
		);
		 $this->FullPurch($sb);
		sleep(5);
	/*	$DiscSale = $this->webDriver->findElement(WebDriverBy::xpath("//a[@title='Ванны']"));
		$DiscSale->click();
		sleep(5);
		$bath = array(
	           "//a[@title='Акриловые ванны']",
			   "//a[@title='Чугунные ванны']",
			   "//a[@title='Стальные ванны']", 
			   "//a[@title='Ванны из литьевого мрамора']"
		);
		$this->FullPurch($bath);
		sleep(3);
		$DiscSale = $this->webDriver->findElement(WebDriverBy::xpath("//a[@title='Комплектующие']"));
		$DiscSale->click();
		$equip = array(
	        /*   "//a[@title='для мебели']",
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
		$this->FullPurch($equip);
		sleep(3); */
    }
	
}

?>