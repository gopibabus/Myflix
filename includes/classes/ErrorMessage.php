<?php

class ErrorMessage
{
    public static function show($text) {
      exit(<<<EXIT
            <span class='errorBanner'>
                $text
            </span>
EXIT
      );
    }
}