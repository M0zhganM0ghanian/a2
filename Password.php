<?php

/**
 *
 */
class Password{
  private $str;
  private $symboles;
  private $num;
  private $similarChar;
  private $ambiguousChar;
  private $password;
  private $symbolPortion;
  private $numPortion;
  private $letterPorsion;

  function __construct()
  {
    $this->str = 'abcdefghjkmnpqrstuvwxyzABCDEFGHIJKMNPQRSTUVWXYZ';
    $this->symboles = '!@#%^&*$_-+=';
    $this->num = '0123456789';
    $this->similarChar = 'ilLoO';
    $this->ambiguousChar = '{}[]()/\"~,;:.<>';
    $this->password = '';
    $this->symbolPortion = 0;
    $this->numPortion = 0;
    $this->letterPorsion = 0;
  }

  /**
	* Getter for password property
	*/
    public function getPassword() {
        return $this->password;
    }

  /**
	* Add Number to the password string.
	*/
    public function includeNumber() {

      for ($i=0; $i <$this->numPortion ; $i++) {
        $this->password = $this->password.substr($this->num, rand(0, strlen($this->num) - 1), 1);
      }
    }

  /**
	* Add Symboles to the password string.
	*/
    public function includeSymboles() {

      for ($i=0; $i <$this->symbolPortion ; $i++) {
        $this->password = $this->password.substr($this->symboles, rand(0, strlen($this->symboles) - 1), 1);
      }
    }

  /**
	* Add Abiguous Characters to the string of characters.
	*/
    public function includeAbiguousChar() {

      $this->str = $this->str.$this->ambiguousChar;
    }

  /**
	* Add similar Characters to the string of characters.
	*/
    public function includeSimilarChar() {

      $this->str = $this->str.$this->similarChar;
    }

  /**
	* Add letters to the password string.
	*/
    public function addLetters() {

      for ($i=0; $i <$this->letterPorsion ; $i++) {
        $this->password = $this->password.substr($this->str, rand(0, strlen($this->str) - 1), 1);
      }
    }

  /**
  * change the type of character based on the selection.
  */
    public function letterCase($letterCase) {

      if ($letterCase == 'Upper') {
        $this->password = strtoupper($this->password);
      }elseif ($letterCase == 'Lower') {
        $this->password = strtolower($this->password);
      }else {
        $this->password = $this->password;
      }
    }


  /**
	* Calculate the number of character for letters, numbers, symboles based on the selection.
	*/
    public function protionCalculator($IncludeNum, $IncludeSymbole, $length) {

      if($IncludeNum && $IncludeSymbole){
        $this->numPortion = intdiv($length, 3) ;
        $this->symbolPortion = intdiv($length, 3) ;
        $this->letterPorsion = $length - ($this->numPortion + $this->symbolPortion);
      }elseif ($IncludeNum) {
        $this->numPortion = intdiv($length, 2) ;
        $this->symbolPortion = 0;
        $this->letterPorsion = $length - $this->numPortion;
      }elseif ($IncludeSymbole) {
        $this->symbolPortion = intdiv($length, 2) ;
        $this->numPortion = 0;
        $this->letterPorsion = $length - $this->symbolPortion;
      }else {
        $this->symbolPortion = 0;
        $this->numPortion = 0;
        $this->letterPorsion = $length;
      }
    }

  /**
  * Create password based on the selection
  */
    public function createPassword($includeNum,  $includeSymbole, $length, $excludeAmbiguousChar, $excludeSimilarChar, $letterCase) {
      if (!$excludeAmbiguousChar && $includeSymbole) {
        $this->includeAbiguousChar();
      }
      if (!$excludeSimilarChar) {
        $this->includeSimilarChar();
      }
      $this->protionCalculator($includeNum, $includeSymbole, $length);
      $this->addLetters();
      $this->includeNumber();
      $this->includeSymboles();
      $this->letterCase($letterCase);
      $arr = str_split($this->password);
      shuffle($arr);
      $res = implode("",$arr);
      return $res;
    }
}# end of class
