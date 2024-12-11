<?php
namespace Database\Seeders;

use App\Models\ClassRoom;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class ClassRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClassRoom::factory()
            ->count(10)
            ->sequence(fn($sequence) => ['name' => 'Class ' . ($sequence->index + 1)]) // Ensure this is correct
            ->has(
                Section::factory()
                    ->count(2)
                    ->state(
                        new Sequence(
                            ['name' => 'Section A'],
                            ['name' => 'Section B'],
                        )
                    )
                    ->has(
                        Student::factory()
                            ->count(5)
                            ->state(
                                function (array $attributes, Section $section) {
                                    return ['class_room_id' => $section->class_room_id];
                                }
                            )
                    )
            )
            ->create();
    }
}
