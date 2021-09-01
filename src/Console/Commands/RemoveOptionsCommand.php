<?php

namespace LaravelEG\LaravelOptions\Console\Commands;

use Illuminate\Console\Command;
use LaravelEG\LaravelOptions\Models\LaravelEGLaravelOption;

class RemoveOptionsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laraveleg:options:remove-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove all options on eloquent mode';

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
        $sure = true;

        if (\Illuminate\Support\Facades\App::environment('production')) {
            $sure = $this->confirm('You are in production mode are you sure to delete all options?', false);
        }

        if (!$sure) {
            $this->info('Command Canceled!');
        }

        if ($sure) {
            $items = LaravelEGLaravelOption::get();

            if (!$count = $items->count()) {
                $this->error('You do not have any options!');
                exit;
            }

            $this->output->progressStart($count);
    
            foreach ($items as $item) {
                $item->delete();
                $this->output->progressAdvance();
            }
            
            $this->output->progressFinish();
    
            $this->info('All options removed in eloquent mode!');
        }
    }
}
