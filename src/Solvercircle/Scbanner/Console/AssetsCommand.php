<?php
namespace Solvercircle\Scbanner\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class AssetsCommand extends Command {
    protected $name = 'scbanner:assets';

    protected $description = 'Publishes assets for SCBanner.';

    public function fire()
    {
        $this->call('asset:publish', array('package' => 'solvercircle/scbanner'));
    }
}