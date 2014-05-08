<?php
namespace Solvercircle\Scbanner\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ConfigureCommand extends Command {
    protected $name = 'scbanner:config';

    protected $description = 'Publishes configuration for SCBanner.';

    public function fire()
    {
        $this->call('config:publish', array('package' => 'solvercircle/scbanner'));
    }
}