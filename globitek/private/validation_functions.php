<?php

  // is_blank('abcd')
  function is_blank($value='') {
    return !isset($value) || trim($value) == '';
  }

  // has_length('abcd', ['min' => 3, 'max' => 5])
  function has_length($value, $options=array()) {
    $length = strlen($value);
    if(isset($options['max']) && ($length > $options['max'])) {
      return false;
    } elseif(isset($options['min']) && ($length < $options['min'])) {
      return false;
    } elseif(isset($options['exact']) && ($length != $options['exact'])) {
      return false;
    } else {
      return true;
    }
  }

  // has_valid_email_format('test@test.com')
  function has_valid_email_format($value) {
    // Function can be improved later to check for
    // more than just '@'.
    return strpos($value, '@') !== false;
  }
  
  //valid_basic($state, $errors)
  function valid_basic($value=array(), $errors=array()){
      foreach ($value as $key => $val){
          if(is_blank($val)){
              $errors[] = "".$key." cannot be blank";
          }
         if(!has_length($val, array('max' => 255))){
              $errors[] = "".$key." cannot be longer than 255 characters";
          }
       }
      return $errors;
  }

?>
