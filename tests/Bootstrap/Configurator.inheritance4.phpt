<?php

/**
 * Test: Nette\Configurator and services inheritance and overwriting.
 */

use Nette\Configurator;
use Tester\Assert;


require __DIR__ . '/../bootstrap.php';


$configurator = new Configurator;
$configurator->setDebugMode(false);
$configurator->setTempDirectory(TEMP_DIR);
$configurator->addConfig(Tester\FileMock::create('
services:
	application:
', 'neon'));
$container = $configurator->createContainer();


Assert::type(Nette\Application\Application::class, $container->getService('application'));
