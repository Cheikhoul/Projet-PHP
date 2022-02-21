<?php

function createUrl()
{
  if (is_null($_SERVER["SERVER_NAME"])) throw new Exception("Error with request", 400);

  return $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . "/Projet-PHP/pages/redirect.php?id=" . bin2hex(random_bytes(4));
};

function saveUrl($query, $idUser)
{
  $saveOriginalURL = $query->prepare("INSERT INTO tp_mathias_khadim_gaspard.url_origine (url_origine, id_utilisateur) 
  VALUES ('$_POST[url]', $idUser)");

  $saveShortenURL = $query->prepare("INSERT INTO tp_mathias_khadim_gaspard.url_raccourcie (id_url_origine, url_raccourcie) VALUES (LAST_INSERT_ID(), '" . createUrl() .  "')");

  $saveOriginalURL->execute();
  $saveShortenURL->execute();
};
