<?php
require_once 'AutoTestSEO.php';

class AutoTestSeoPack extends AutoTestSeo
{
/**
 * @expectedException Exception
 */
    public function testSEOPack() 
    {	
        $this->seoAloneProduct();
		sleep(3);
        $this->seoParentProductShower();
		sleep(3);
		$this->seoParentProductBath();
		sleep(3);
		$this->seoParentPriductHardware(); 
		sleep(3);
    }
}

?>
