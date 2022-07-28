<?php

namespace PurrDigital\LaravelCrudPackage\Commands;

use Illuminate\Console\Command;

class GenerateCrudCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:crud {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Full Crud files.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('make:model', [
            'name' => $this->argument('name'),
            '--migration' => true,
            '--factory' => true,
            '--seed' => true,
            '--policy' => true,
        ]);

        $this->call('make:crud-controller', [
            'name' => $this->argument('name').'Controller',
            'model' => $this->argument('name'),
        ]);

        $this->call('make:request', [
            'name' => $this->argument('name').'Request',
        ]);

        $this->call('make:resource', [
            'name' => $this->argument('name').'Resource',
        ]);

        $this->call('make:interface', [
            'name' => $this->argument('name').'Interface',
        ]);

        $this->call('make:repository', [
            'name' => $this->argument('name').'Repository',
            'model' => $this->argument('name'),
        ]);

        $this->call('update:repository-provider', [
            'repository' => $this->argument('name').'Repository',
            'interface' => $this->argument('name').'Interface',
        ]);

        return 0;
    }
}
