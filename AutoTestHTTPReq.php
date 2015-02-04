<?php
class AutoTestHTTPReq extends PHPUnit_Framework_TestCase {

public function test1() {

$xmlf = '/var/www/line_media/vendor/sitemap_1.xml';

$xmlr = simplexml_load_file($xmlf);


foreach ( $xmlr->children() as $children) {
$xmlr->children()->loc;
// echo $children->loc;
 $d = $children->loc;
echo $d;
$r = get_headers($d);
// $r = get_headers($d);

// echo $r; 
try {	
try {
$this->assertContains('200',$r[0]);
$this->assertNotContains('404',$r[0]);
$this->assertNotContains('503',$r[0]);
	}
catch (PHPUnit_Framework_Exception $ex) {
	echo $children->loc;
			}
	}
catch(Exception $ex) {} 	 
		}
	}
}
?>
