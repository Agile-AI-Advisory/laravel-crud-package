<?php

namespace PurrDigital\LaravelCrudPackage\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class UpdateRepositoryProviderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:repository-provider {repository} {interface}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates the Repository Provider with the a new interface and repository.';

    /**
     * Filesystem instance
     * @var Filesystem
     */
    protected $files;

    /**
     * Create a new command instance.
     * @param Filesystem $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $interface = $this->argument('interface');
        $repository = $this->argument('repository');

        if ($this->files->exists($this->getProviderPath())) {
            $contents = $this->getSourceFile();

            // We get the first instance of already existing interfaces
            $alreadyExistingInterfaces = Str::beforeLast($contents, '$this->app->bind(');

            // We combine out new interface with the existing
            $combinedInterfaces = $alreadyExistingInterfaces . '$this->app->bind('."{$this->argument('interface')}::class, {$this->argument('repository')}::class);\n";

            // We fetch the string after the interface to join with our new one above
            $afterInterfaceString = Str::afterLast($contents, '$this->app->bind(');

            // We combine the full string together to create the provider file
            $allTogether = $combinedInterfaces.'        $this->app->bind('.$afterInterfaceString;

            // We fetch strings before the service provider use import
            $uses = Str::beforeLast($allTogether, 'use Illuminate\Support\ServiceProvider;');

            // We fetch after the service provider import
            $afterUses = Str::afterLast($allTogether, 'use Illuminate\Support\ServiceProvider;');

            // We add our new dynamic import files
            $updatedUses = $uses."use App\Repositories\\".$repository.";\nuse App\Interfaces\\".$interface.";\nuse Illuminate\Support\ServiceProvider;";

            // We combine the strings together to make our full class file
            $allTogether = $updatedUses . $afterUses;

            // add our content and update the file.
            file_put_contents($this->getProviderPath(), $allTogether);

            $this->info("Provider updated successfully");
        } else {
            $this->error("Repository Service Provider don't exist, please create this file and update manually!");
        }
    }

    /**
     * Get the stub path and the stub variables
     *
     * @return string
     *
     */
    public function getSourceFile(): string
    {
        return $this->getProviderContents($this->getProviderPath());
    }

    /**
     * Replace the stub variables(key) with the desire value
     *
     * @param $provider
     * @return string
     */
    public function getProviderContents($provider): string
    {
        return file_get_contents($provider);
    }

    /**
     * Return the stub file path
     * @return string
     *
     */
    public function getProviderPath(): string
    {
        return base_path('app/Providers') .'/RepositoryServiceProvider.php';
    }
}
