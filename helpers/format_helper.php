<?php

// Donar format a la data
function formatData($data)
{
  return date('d M Y, g:i a', strtotime($data));
}

// retallar text a fitxa article pagina d'inici
function textCurt($text)
{
  $text = $text . "";
  $text = substr($text, 0, 80);
  $text = substr($text, 0, strrpos($text, ' '));
  $text = $text . "...";
  return $text;
}
