<?php

namespace Api\Subsidiaries\Console;

use Api\Subsidiaries\Repositories\SubsidiaryRepository;
use Illuminate\Console\Command;

class AddSubsidiaryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subsidiaries:add {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds a new subsidiary';

    /**
     * Subsidiary repository to persist subsidiary in database
     *
     * @var SubsidiaryRepository
     */
    protected $subsidiaryRepository;

    /**
     * Create a new command instance.
     *
     * @param  SubsidiaryRepository  $subsidiaryRepository
     * @return void
     */
    public function __construct(SubsidiaryRepository $subsidiaryRepository)
    {
        parent::__construct();

        $this->subsidiaryRepository = $subsidiaryRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $subsidiary = $this->subsidiaryRepository->create([
            'subsidiary_name' => $this->argument('name'),
        ]);

        $this->info(sprintf('A subsidiary was created with ID %s', $subsidiary->id));
    }
}