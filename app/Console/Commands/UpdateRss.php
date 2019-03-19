<?php

namespace App\Console\Commands;

use App\Flux;
use Illuminate\Console\Command;

class UpdateRss extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rss:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update database with RSS Flux.';

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
        $flux = Flux::all()->first();
        $rss = \Feed::loadRss($flux->getUrl());
        dd($rss);
    }
}
