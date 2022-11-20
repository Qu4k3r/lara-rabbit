<?php

namespace App\Packages\DoctrineMigration\Command;
use Doctrine\Migrations\Tools\Console\Command\DiffCommand;

class MigrationsDiffCommand extends AbstractMigrationsBaseCommand
{
    protected $signature = 'doctrine:migrations:diff';

    protected function getDoctrineMigrationConsoleEquivalentCommand()
    {
        return DiffCommand::getDefaultName();
    }
}
