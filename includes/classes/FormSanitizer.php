<?php


  class FormSanitizer
  {
    /**
     * @param string $inputText
     * @return string
     */
    public static function sanitizeFormString($inputText) {
      $inputText = strip_tags($inputText);
      $inputText = str_replace(" ", "", $inputText);
      $inputText = trim($inputText);
      $inputText = strtolower($inputText);
      $inputText = ucfirst($inputText);
      return $inputText;
    }

    /**
     * @param string $inputText
     * @return string
     */
    public static function sanitizeFormUsername($inputText) {
      $inputText = strip_tags($inputText);
      $inputText = str_replace(" ", "", $inputText);
      return $inputText;
    }

    /**
     * @param string $inputText
     * @return string
     */
    public static function sanitizeFormPassword($inputText) {
      $inputText = strip_tags($inputText);
      return $inputText;
    }

    /**
     * @param string $inputText
     * @return string
     */
    public static function sanitizeFormEmail($inputText) {
      $inputText = strip_tags($inputText);
      $inputText = str_replace(" ", "", $inputText);
      return $inputText;
    }
  }