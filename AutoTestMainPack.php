<?php
require_once 'AutoTestMain.php';


class AutoTestmainPack extends AutoTestMain
{
	public $urlMPageStand =  'http://admin:qwerty6@stand.santehnika-online.ru'; 
	public $urlMPagePublic = 'http://santehnika-online.ru';
	public $c = array();
	public $b = array();



    public function testMainMatch() 
    {	
	//	$this->findBrands();
		$this->category();
		$this->seo();
		$arrUrl = array(
					"/personal/cart/",
					"/brands/belbagno/flay/", 
					"/discount/ucenka/",
					"/bathroom_furniture/279/16958/",
					"/product/unitaz_kompakt_oskolskaya_keramika_superkompakt/",
					"/product/rakovina_santek_baykal_60_wh109652_poluvstraivaemaya/",
					"/product/moyka_kukhonnaya_franke_pamira_ron_610_38_stal/",
					"/mixers/173/17426/",
					"/shower_program/399/",
					"/bidet/289/19417/",
					"/urinals/466/15431/",
					"/product/gofra_alcaplast_a97/", 
					"/product/dushevoy_trap_alcaplast_apv3444/"
					);
	//	$arrUrl = array_merge($arrUrl,$this->brandsURL);
		$arrUrl = array_merge($arrUrl,$this->resultCat);
		$arrUrl = array_merge($arrUrl,$this->seoTag);
		foreach ($arrUrl as $arrUrlFE) {
			$this->urlMPageStand = $this->urlMPageStand.$arrUrlFE;
			$this->urlMPagePublic = $this->urlMPagePublic.$arrUrlFE;
		echo "\n Открываю страницу $this->urlMPageStand \n";
        	$this->mainMatch($this->urlMPageStand);
		$this->c = array_merge($this->c,$this->a);
		sleep(3);
		echo "\n Открываю страницу $this->urlMPagePublic |Эталон \n";
        	$this->mainMatch($this->urlMPagePublic);
		$this->b = array_merge($this->b,$this->a);
		$result = array_diff($this->c,$this->b); //2 параметр эталонный
		$resultOut = array_diff($this->b,$this->c);
		try{
			try {
				if (count($result)==0) {
					echo "\n Страница $this->urlMPageStand |Успешно \n";
				}
				else {
					echo "\n Ошибка на странице $this->urlMPageStand \n";
					foreach ($resultOut as $errKey => $err) {
						echo "\n На странице отличается: $errKey \n";
						
					}
					throw new PHPUnit_Framework_Exception;
				}
			}
			catch (PHPUnit_Framework_Exception $ex) {}
		}
		catch (Exception $ex) {}
		$this->urlMPageStand = 'http://admin:qwerty6@stand.santehnika-online.ru'; 
		$this->urlMPagePublic = 'http://santehnika-online.ru';
		} 
	}
}

?>
