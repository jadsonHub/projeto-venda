<?php


function verificarSession($nome)
{
   if (isset($_SESSION[$nome])) {
      return true;
   }
   return false;
}

function excluirSession($nome)
{
   if (is_array($nome)) {
      foreach ($nome as $indice => $values) {
         excluirSession($values);
      }
   } else {
      if (verificarSession($nome)) {
         unset($_SESSION[$nome]);
      }
   }
}

function dadosOnjSession($nome)
{
   $obj = (object) $_SESSION[$nome];
   return $obj;
}
