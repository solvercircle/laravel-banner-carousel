<?php namespace Solvercircle\Scbanner;

use Illuminate\Support\ServiceProvider;

class ScbannerServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('solvercircle/scbanner','Scbanner');
		
		//require __DIR__.'/../../../vendor/autoload.php';
		
		include __DIR__.'/../../routes.php';
		
		//View::addNamespace('Scbanner', __DIR__.'/../../views');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
		$this->registerCommands();
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}
	
	
	//-------------------------------------Install Commands----------------------------------------------------------------------
	public function registerCommands()
	{
		$this->registerMigrateCommand();
		$this->registerConfigureCommand();
		$this->registerAssetsCommand();
		$this->registerInstallCommand();
	
		$this->commands(
			'scbanner::commands.migrate',
			'scbanner::commands.config',
			'scbanner::commands.assets',
			'scbanner::commands.install'
		);
	}
	
	public function registerMigrateCommand()
	{
		$this->app['scbanner::commands.migrate'] = $this->app->share(function($app)
		{
			return new Console\MigrateCommand;
		});
	}
	
	public function registerConfigureCommand()
	{
		$this->app['scbanner::commands.config'] = $this->app->share(function($app)
		{
			return new Console\ConfigureCommand;
		});
	}
	
	public function registerAssetsCommand()
	{
		$this->app['scbanner::commands.assets'] = $this->app->share(function($app)
		{
			return new Console\AssetsCommand;
		});
	}
	
	public function registerInstallCommand()
	{
		$this->app['scbanner::commands.install'] = $this->app->share(function($app)
		{
			return new Console\InstallCommand;
		});
	}

}