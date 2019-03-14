<?php
//Ò»ÖÂÐÔhash
class Consistant {
	protected $_position = array();
	protected $_num = 64;
	
	public function _hash($str){
		return sprintf('%u',crc32($str));
	}
	
	public function lookup($key){
		$point = $this->_hash($key);
		echo $point;
		
		foreach($this->_position as $k => $v){
			if($point <= $k){
				$node = $v;
				break;
			}
		}
		return $node;
	}
	
	public function addNode($node){
		for($i=0;$i<$this->_num;$i++){
			$this->_position[$this->_hash($node.'_'.$i)] = $node;
		}
		$this->sortNode();
	}
	
	public function sortNode(){
		ksort($this->_position);
	}
	public function printNodes(){
		print_r($this->_position);
	}
	
}

$con = new Consistant();
$con->addNode('a');
$con->addNode('b');
$con->addNode('c');

$con->printNodes();
echo PHP_EOL;

$node = $con->lookup('test');
echo PHP_EOL;

echo $node;

