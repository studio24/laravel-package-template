<?php
declare(strict_types=1);

namespace VendorName\PackageTemplate\Commands;

use Illuminate\Console\Command;

class PackageTemplateCommand extends Command
{
    public $signature = 'package';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }

}
