<?php
namespace Solvercircle\Scbanner\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class MigrateCommand extends Command {
    protected $name = 'scbanner:migrate';

    protected $description = 'Migrates the database for SCBanner.';

    public function fire()
    {
        $this->call('migrate', array('--package' => 'solvercircle/scbanner'));
    }
}