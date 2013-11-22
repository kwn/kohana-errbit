<?php defined('SYSPATH') OR die('No direct script access.');

use Errbit\Errbit;

$kohana      = new ReflectionClass('Kohana');
$constants   = array_flip($kohana->getConstants());
$environment = $constants[Kohana::$environment];

Errbit::instance()->configure(array(
    'api_key'          => Kohana::$config->load('errbit.api_key'),
    'port'             => Kohana::$config->load('errbit.port'),
    'host'             => Kohana::$config->load('errbit.host'),
    'secure'           => Kohana::$config->load('errbit.secure'),
    'environment_name' => $environment,
));

if (Kohana::$environment <= Kohana::$config->load('errbit.min_env'))
{
    Errbit::instance()->start();
}
