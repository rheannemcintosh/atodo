<?php

namespace Database\Seeders;

use Database\Seeders\custom\CategorySeeder;
use Database\Seeders\custom\TaskDetailSeeder;
use Database\Seeders\custom\TaskSeeder;
use Database\Seeders\custom\ToDoListSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * @var string[]
     */
    private array $customSeeders = [
        'database/seeders/custom/CategorySeeder.php' => CategorySeeder::class,
        'database/seeders/custom/TaskDetailSeeder.php' => TaskDetailSeeder::class,
        'database/seeders/custom/TaskSeeder.php' => TaskSeeder::class,
        'database/seeders/custom/ToDoListSeeder.php' => ToDoListSeeder::class,
    ];

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
        ]);

        foreach ($this->customSeeders as $file => $seederClass) {
            if (file_exists(base_path($file))) {
                $this->call($seederClass);
            }
        }
    }
}
