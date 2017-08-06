<?php

namespace Api\Companies\Console;

use Api\Companies\Repositories\CompanyRepository;
use Illuminate\Console\Command;

class AddCompanyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'companies:add {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds a new company';

    /**
     * Company repository to persist company in database
     *
     * @var CompanyRepository
     */
    protected $companyRepository;

    /**
     * Create a new command instance.
     *
     * @param  CompanyRepository  $companyRepository
     * @return void
     */
    public function __construct(CompanyRepository $companyRepository)
    {
        parent::__construct();

        $this->companyRepository = $companyRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $company = $this->companyRepository->create([
            'company_name' => $this->argument('name'),
        ]);

        $this->info(sprintf('A company was created with ID %s', $company->id));
    }
}