<?php
class AutoTestMain extends PHPUnit_Framework_TestCase

/**
 * @expectedException Exception
 */
{
		public $url = 'http://santehnika-online.ru';
		protected $webDriver;
		public $a;
		public $brandsURL;
		public $CategoryURL;
		public $resultCat;
		public $seoTag;
	public function setUp()
    {
        $capabilities = array(\WebDriverCapabilityType::BROWSER_NAME => 'firefox');
        $this->webDriver = RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);
    }
	public function tearDown()
    {
		$this->webDriver->close();
    }

	public function findBrands()
	{	
		$tmain=$this->webDriver->get($this->url.'/brands');
		$tmain=$this->webDriver->manage()->window()->maximize();
		$this->brandsURL = array();
		$tmainBrands = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='paginator']/a[contains(@href,'/brands/') and not(contains(@class,'arrow last1'))][last()]"))->getText();
		$tmainBrandscount = intval($tmainBrands); //цикл страниц
		try {
			for ($k=1;$k<=$tmainBrandscount;$k++) { 
				$tmainBrands = $this->webDriver->findElements(WebDriverBy::xpath("//div[contains(@class,'brand-item')]"));
				$countresult = count($tmainBrands); //цикл брендов
				for ($i=1;$i<=$countresult;$i++) {
					$tmainBrands = $this->webDriver->findElement(WebDriverBy::xpath("//div[contains(@class,'brand-item')][$i]/div[@class='col-2']/h6/a"))->getAttribute('href');
					$tmainBrandsSeria=$this->webDriver->get($tmainBrands); // цикл серий
					$tmainBrandsSeria = $this->webDriver->findElements(WebDriverBy::xpath("//a[@class='coll-tag']"));
					$countresultSeria = count($tmainBrandsSeria);
					for($t=1;$t<=$countresultSeria;$t++){
						$tmainBrandsSeria = $this->webDriver->findElement(WebDriverBy::xpath("//a[@class='coll-tag'][$t]"))->getAttribute('href');
						$tmainBrandsSeria = preg_replace("[$this->url]","",$tmainBrandsSeria);
						array_push($this->brandsURL,$tmainBrandsSeria);
					}
					$this->webDriver->navigate()->back();
					$tmainBrands = preg_replace("[$this->url]","",$tmainBrands);
					array_push($this->brandsURL,$tmainBrands);
					if($i==$countresult) {
						$tmainBrands = $this->webDriver->findElement(WebDriverBy::xpath("//a[@class='arrow last1']"));
						$tmainBrands->click();
						$i=1;
						break;
					}
				}   
			}
		}
		catch (NoSuchElementException $ex) {
			$tmainBrands = $this->webDriver->findElement(WebDriverBy::xpath("//div[contains(@class,'brand-item')][$i]/div[@class='col-2']/h6/a"))->getAttribute('href');
			$tmainBrands = preg_replace("[$this->url]","",$tmainBrands);
			array_push($this->brandsURL,$tmainBrands);
		}
	}	
	
	public function mainMatch($Link)
	{	
	//	require_once 'AutoTestMainLink.php';
		$tmain=$this->webDriver->get($Link);
		$tmain=$this->webDriver->manage()->window()->maximize();
		$this->a = array();
		try{
			$tmainTitle = $this->webDriver->getTitle();
			$k1 = 'Title';
			array_push($this->a,$tmainTitle);
		}
		catch(NoSuchElementException $ex) {}
		try{
			$tmainKeywords = $this->webDriver->findElement(WebDriverBy::xpath("//meta[@name='keywords']"))->getAttribute('content');
			array_push($this->a,$tmainKeywords);
		}
		catch(NoSuchElementException $ex) {}
		try{
			$tmainDescription = $this->webDriver->findElement(WebDriverBy::xpath("//meta[@name='description']"))->getAttribute('content');
			array_push($this->a,$tmainDescription);
		}
		catch(NoSuchElementException $ex) {}
		try{
			$tmainCanonical = $this->webDriver->findElement(WebDriverBy::xpath("//link[@rel='canonical']"))->getAttribute('href');
			array_push($this->a,$tmainCanonical);
		}
		catch(NoSuchElementException $ex) {}
		try{
			$tmainH1 = $this->webDriver->findElement(WebDriverBy::xpath("//h1"))->getText();
			array_push($this->a,$tmainH1);
		}
		catch(NoSuchElementException $ex) {}
		try{	
			$tmainH2 = $this->webDriver->findElement(WebDriverBy::xpath("//h2"))->getText();
			array_push($this->a,$tmainH2);
		}
		catch(NoSuchElementException $ex) {}
		try{
			$tmainH3 = $this->webDriver->findElement(WebDriverBy::xpath("//h3"))->getText();
			array_push($this->a,$tmainH3);
		}
		catch(NoSuchElementException $ex) {}
		try{
			$tmainH4 = $this->webDriver->findElement(WebDriverBy::xpath("//h4"))->getText();
			array_push($this->a,$tmainH4);
		}
		catch(NoSuchElementException $ex) {}
		try{
			$tmainH5 = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='marked']/div/h5"))->getText();
			array_push($this->a,$tmainH5);
		}
		catch(NoSuchElementException $ex) {}
		try{
			$tmainBack = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='logo']/a"));
			$tmainBack->click();
		}
		catch(NoSuchElementException $ex) {}	
	}
	
	public function category() {
		$tmain=$this->webDriver->get($this->url);
		$tmain=$this->webDriver->manage()->window()->maximize();
		$this->resultCat = array();
		$this->CategoryURL = array();
			$tmainCategory = $this->webDriver->findElements(WebDriverBy::xpath("//div[@class='type-menu']/*//a[contains(@class, 'root')]|//ul[contains(@id, 'ul-left-menu-childs')]/*//a[@rel='nofollow']"));
			foreach ($tmainCategory as $tC) {
				$r=$tC->getAttribute('href');
				$r = preg_replace("[$this->url]","",$r);
				array_push($this->CategoryURL,$r);
			}  
			sleep(2);
			$tmainPCategory = $this->webDriver->findElement(WebDriverBy::xpath("//*/a[contains(@class,'root') and @href='javascript:void(0);']"));
			$tmainPCategory->click();
			$clckPCat = $this->webDriver->findElement(WebDriverBy::xpath("//*[@id='ul-left-menu-childs-1']/li/a"));
			$clck = $clckPCat->click();
			$tmainPCategory = $this->webDriver->findElements(WebDriverBy::xpath("//ul[contains(@id, 'ul-left-menu-childs')]/*//a[@rel='nofollow']"));
			foreach ($tmainPCategory as $tPC) {
				$p=$tPC->getAttribute('href');
				$p = preg_replace("[$this->url]","",$p);
				array_push($this->CategoryURL,$p);
			}
			$jsc = array('javascript:void(0);');
			$this->resultCat = array_diff($this->CategoryURL,$jsc);
	}
	public function seo() {
		$this->seoTag = array();
		$this->category();
		foreach ($this->resultCat as $rC) {
			$currURL = $this->url.$rC;
			$tmainseo=$this->webDriver->get($currURL);
			try{
				for($st1=1;$st1<=5;$st1++) {
					$tmainseo = $this->webDriver->findElement(WebDriverBy::xpath("//div[contains(@class,'categories')]/ul/li[$st1]/a"))->getAttribute('href');
					$tmainseo = preg_replace("[$this->url]","",$tmainseo);
					array_push($this->seoTag,$tmainseo);
				}
			}
			catch (NoSuchElementException $ex) {}
			try{
				for($st2=1;$st2<=5;$st2++) {
					$tmainseo = $this->webDriver->findElement(WebDriverBy::xpath("//div[@id='footer-seo-links']/a[$st2]"))->getAttribute('href');
					$tmainseo = preg_replace("[$this->url]","",$tmainseo);
					array_push($this->seoTag,$tmainseo);
				}
			}
			catch (NoSuchElementException $ex) {}
			try {
				for ($st3=1;$st3<=5;$st3++) {
					$tmainseo = $this->webDriver->findElement(WebDriverBy::xpath("//div[@class='product-category'][$st3]/span"))->getAttribute('data-href');
					$tmainseo = preg_replace("[$this->url]","",$tmainseo);
					array_push($this->seoTag,$tmainseo);
				}			
			}
			catch (NoSuchElementException $ex) {}
		}
	}
}
?>
