namespace Alex\AuthPackage;

use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
/**
* Register services in the container.
*/
public function register()
{
// Register package bindings
}

/**
* Bootstrap services when the package is loaded.
*/
public function boot()
{
// Load routes, migrations, and other resources
if (file_exists(__DIR__.'/routes/auth.php')) {
$this->loadRoutesFrom(__DIR__.'/routes/auth.php');
}

$this->publishes([
__DIR__.'/config/authpackage.php' => config_path('authpackage.php'),
], 'config');
}
}