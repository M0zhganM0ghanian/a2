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
    $includeNum = $form->get('includeNumer', $default = true); # Boolean
    $includeSymbole = $form->get('includeSymbols', $default = true); # Boolean
    $excludeSimilarChar = $form->get('excludeSimilar', $default = true); # Boolean
    $excludeAmbiguousChar = $form->get('excludeAmbiguous', $default = true); # Boolean
    $letterCase = $form->get('case', $default = 'Mixed'); # String
    $quantity = $form->get('quantity', $default = 1); # double

    $errors = $form->validate(
        [
            'numOfWords' => 'min:0',
        ]
    );

    if($errors)
        $createdPasswords = [];
    else{
      for ($i=0; $i <$quantity ; $i++) {
        $createdPassword = $password->createPassword($includeNum,  $includeSymbole,
        $length, $excludeAmbiguousChar, $excludeSimilarChar, $letterCase);

        array_push($createdPasswords, $createdPassword);
      }
    }
    $haveResults = (strlen($createdPasswords) == 0) ? false : true;
}
