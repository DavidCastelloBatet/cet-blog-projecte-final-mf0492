<?php

// Donar format a la data
function formatData($data)
{
  return date('d M Y, g:i a', strtotime($data));
}

// retallar text a fitxa article pagina d'inici
function textCurt($text, $caracters)
{
  $text = $text . "";
  $text = substr($text, 0, $caracters);
  $text = substr($text, 0, strrpos($text, ' '));
  $text = $text . "......";
  return $text;
}
