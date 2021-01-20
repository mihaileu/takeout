<?php

namespace App\Commands;

use LaravelZero\Framework\Commands\Command;

class HelpCommand extends Command
{
    protected $signature = 'help';
    protected $description = 'Display a help menu.';
    protected $indent = 22;
    protected $commands = [
        'enable' => 'Enable a service from a list of options',
        'enable {service}' => 'Enable the provided service (optionally pass --default flag)',
        'disable' => 'Disable a service from a list of options (optionally pass --all flag)',
        'disable {service}' => 'Disable the provided service',
        'start' => 'Start a stopped container from a list of options (optionally pass --all flag)',
        'start {container}' => 'Start the provided stopped containers (by ID)',
        'stop' => 'Stop a running container from a list of options (optionally pass --all flag)',
        'stop {container}' => 'Stop the provided running containers (by ID)',
        'list' => 'List all enabled services (optionally pass --json flag)',
        'logs {container}' => 'Display container logs (by ID)',
        'disk-usage' => 'Show disk-usage (optionally pass --json flag)',
    ];

    public function handle(): void
    {
        $this->line("\n  <fg=white;options=bold>Takeout</>  <fg=green;options=bold>" . config('app.version') . '</>');
        $this->line("\n  <comment>Usage:</comment>");
        $this->line("    takeout <command> [arguments]\n");
        $this->line('  <comment>Commands:</comment>');

        foreach ($this->commands as $command => $description) {
            $spaces = $this->makeSpaces(strlen($command));
            $this->line("    <info>{$command}</info>{$spaces}{$description}");
        }
    }

    public function makeSpaces($count)
    {
        return str_repeat(' ', $this->indent - $count);
    }
}
