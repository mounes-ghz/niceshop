<?php

namespace NiceShop\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use NiceShop\Scaffold\Module\Generators\EntityGenerator;

class ScaffoldEntityCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'scaffold:entity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scaffold a new entity with all its resources.';

    /**
     * The instance of EntityGenerator.
     *
     * @var EntityGenerator
     */
    private EntityGenerator $entityGenerator;


    /**
     * Create a new command instance.
     *
     * @param EntityGenerator $entityGenerator
     */
    public function __construct(EntityGenerator $entityGenerator)
    {
        parent::__construct();

        $this->entityGenerator = $entityGenerator;
    }


    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $this->entityGenerator
            ->module($this->argument('module'))
            ->generate([$this->argument('entity')], false);

        $this->info('Entity generated.');
    }


    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments(): array
    {
        return [
            ['entity', InputArgument::REQUIRED, 'The name of the entity.'],
            ['module', InputArgument::REQUIRED, 'The name of module will be used.'],
        ];
    }
}
