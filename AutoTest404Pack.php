<?php
require_once 'AutoTest404.php';

class AutoTest404Pack extends AutoTest404
{
/**
 * @expectedException Exception
 */
    public function testSEOPack() 
    {	
        $this->Error404();
		
     
    }
}

?>
