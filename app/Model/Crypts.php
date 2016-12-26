<?php
App::uses('AppModel', 'Model');

class Crypts extends AppModel
{
    public function createHash($str, $algo = 'sha512')
	{
		$this->_hash = null;
		if (!empty($str)) {
			$p = $this->_topSalt.$str.$this->_endSalt;
			$this->_hash = hash($algo, $p);
		}
		return $this;
	}

    public function getHash()
	{
		return $this->_hash;
	}
    
}
?>