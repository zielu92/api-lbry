<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeAuthorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:author';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new author interactively';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask('What is the Author\'s name?');

        if ($name) {
            $author = \App\Models\Author::create(['name' => $name]);
            $this->info("Author {$author->name} created successfully!");
        } else {
            $this->error('Author name cannot be empty.');
        }
    }
}
