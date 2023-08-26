#!/usr/bin/env php
<?php
// Some command, need a proper documentation, b'cause it's a shit: application.php
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

require __DIR__.'/vendor/autoload.php';

use App\Commands\FirstCommand;
use App\Commands\SecondCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

$application = new Application();
/*
$application->register('generate-admin')
    ->addArgument('username', InputArgument::REQUIRED)
    ->setCode(function (InputInterface $input, OutputInterface $output): int {
        $output->writeln($input->getArgument('username'));
        return Command::SUCCESS;
    }); */

$application->add(new FirstCommand());
$application->add(new SecondCommand());
       
$application->run();
