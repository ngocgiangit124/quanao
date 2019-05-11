<?php namespace App\Libraries;


  class Ultils {
    //convert validateion error to string return api for app display
    public static function getValidation($validator){
      $message = $validator->messages();
      $data_valid = [];
      foreach ($message->messages() as $key => $value) {
          $data_valid[$key] = implode($value);
      }
      return $data_valid;
    }
  }
?>