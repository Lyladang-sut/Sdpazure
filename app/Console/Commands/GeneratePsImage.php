<?php

namespace App\Console\Commands;

use App\Traits\GenerateImageTrait;
use Illuminate\Console\Command;

class GeneratePsImage extends Command
{
    use GenerateImageTrait;
    private $upload_path = 'storage/';
    private $prefix_name = '_ps_image';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'psimage:convert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        $this->generate('\App\IndustryImage', $this->upload_path, $this->prefix_name);
    }
}
