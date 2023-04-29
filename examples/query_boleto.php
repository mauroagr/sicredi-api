<?php

use SicrediAPI\Domain\Beneficiary;
use SicrediAPI\Domain\Payee;
use SicrediAPI\Domain\DiscountConfiguration;
use SicrediAPI\Domain\InterestConfiguration;
use SicrediAPI\Domain\Messages;
use SicrediAPI\Domain\Information;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$client = new \SicrediAPI\Client(
    $_ENV['SICREDI_API_KEY'],
    $_ENV['SICREDI_COOPERATIVE'],
    $_ENV['SICREDI_POST'],
    $_ENV['SICREDI_BENEFICIARY'],
    new \GuzzleHttp\Client(),
    true
);

$client->authenticate($_ENV['SICREDI_USERNAME'], $_ENV['SICREDI_PASSWORD']);

$boletoClient = $client->boleto();

$boleto = $boletoClient->query('211001290');

var_dump($boleto);
