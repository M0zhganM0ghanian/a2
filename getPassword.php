<?php
require('Password.php');
require('Form.php');
require('Tools.php');

# Instantiate the objects we'll need
$password = new Password();
$form = new DWA\Form($_GET);

$errors = [];

if($form->isSubmitted()) {


    $length = $form->get('numOfWords', $default = 1); # double
    $includeNum = $form->get('includeNumer', $default = false); # Boolean
    $includeSymbole = $form->get('includeSymbols', $default = false); # Boolean
    $excludeSimilarChar = $form->get('excludeSimilar', $default = false); # Boolean
    $excludeAmbiguousChar = $form->get('excludeAmbiguous', $default = false); # Boolean
    $letterCase = $form->get('case', $default = 'Mixed'); # String
    $quantity = $form->get('quantity', $default = 1); # double

    $errors = $form->validate(
      [
          'numOfWords' => 'required|positiveInt:0|numeric|min:2|max:24'
      ]

    );

    if($errors){
      $createdPassword= "";
    }
    else{
        $createdPassword = $password->createPassword($includeNum, $includeSymbole,
        $length, $excludeAmbiguousChar, $excludeSimilarChar, $letterCase);
    }
}
