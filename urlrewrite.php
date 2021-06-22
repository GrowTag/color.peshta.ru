<?php
$arUrlRewrite=array (
  5 => 
  array (
    'CONDITION' => '#^/blog/([^\\/]+)/([^\\/]+)/($|\\?.*)#',
    'RULE' => 'ELEMENT_CODE=$2',
    'ID' => '',
    'PATH' => '/blog/detail.php',
    'SORT' => 100,
  ),
  9 => 
  array (
    'CONDITION' => '#^/packaging/([^\\/]+)/($|\\?.*)#',
    'RULE' => 'ID=$1',
    'ID' => '',
    'PATH' => '/packaging/detail.php',
    'SORT' => 100,
  ),
  2 => 
  array (
    'CONDITION' => '#^/catalog/([^\\/]+)/($|\\?.*)#',
    'RULE' => 'ID=$1',
    'ID' => '',
    'PATH' => '/catalog/detail.php',
    'SORT' => 100,
  ),
  8 => 
  array (
    'CONDITION' => '#^/support/([^\\/]+)/($|\\?.*)#',
    'RULE' => 'ID=$1',
    'ID' => '',
    'PATH' => '/support/detail.php',
    'SORT' => 100,
  ),
  4 => 
  array (
    'CONDITION' => '#^/bitrix/services/ymarket/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/bitrix/services/ymarket/index.php',
    'SORT' => 100,
  ),
  7 => 
  array (
    'CONDITION' => '#^/cases/([^\\/]+)/($|\\?.*)#',
    'RULE' => 'ID=$1',
    'ID' => '',
    'PATH' => '/cases/detail.php',
    'SORT' => 100,
  ),
  6 => 
  array (
    'CONDITION' => '#^/blog/([^\\/]+)/($|\\?.*)#',
    'RULE' => 'ID=$1',
    'ID' => '',
    'PATH' => '/blog/section.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/biz/([^\\/]+)/($|\\?.*)#',
    'RULE' => 'ID=$1',
    'ID' => '',
    'PATH' => '/biz/detail.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/content/faq/#',
    'RULE' => '',
    'ID' => 'bitrix:support.faq',
    'PATH' => '/content/faq/index.php',
    'SORT' => 100,
  ),
  0 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
);
