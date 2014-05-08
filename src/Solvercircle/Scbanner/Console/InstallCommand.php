<?php
namespace Solvercircle\Scbanner\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class InstallCommand extends Command {
    protected $name = 'scbanner:install';

    protected $description = 'Installing SCBanner Package';

    public function fire()
    {        
        if ($this->confirm('Have you configured your database yet?')) {
			$this->call('scbanner:config');
	        $this->call('scbanner:assets');
            $this->call('scbanner:migrate');
        } else {
            $this->comment('Your database has not been migrated. Please configure your database before running this command.');
        }
    }
}