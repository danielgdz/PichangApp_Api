<?php

namespace Api\Areas\Console;

use Api\Areas\Repositories\AreaRepository;
use Illuminate\Console\Command;

class AddAreaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'areas:add {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds a new area';

    /**
     * Area repository to persist area in database
     *
     * @var AreaRepository
     */
    protected $areaRepository;

    /**
     * Create a new command instance.
     *
     * @param  AreaRepository  $areaRepository
     * @return void
     */
    public function __construct(AreaRepository $areaRepository)
    {
        parent::__construct();

        $this->areaRepository = $areaRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $area = $this->areaRepository->create([
            'title' => $this->argument('name'),
        ]);

        $this->info(sprintf('A area was created with ID %s', $area->id));
    }
}