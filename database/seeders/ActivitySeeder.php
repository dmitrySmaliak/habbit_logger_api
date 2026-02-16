<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Activity::truncate();

        $activities = [
            ['category' => 'sport', 'slug' => 'pushups'],
            ['category' => 'sport', 'slug' => 'squats'],
            ['category' => 'sport', 'slug' => 'running'],
            ['category' => 'sport', 'slug' => 'plank'],
            ['category' => 'sport', 'slug' => 'yoga'],
            ['category' => 'sport', 'slug' => 'cycling'],
            ['category' => 'sport', 'slug' => 'swimming'],
            ['category' => 'sport', 'slug' => 'pullups'],
            ['category' => 'sport', 'slug' => 'stretching'],
            ['category' => 'sport', 'slug' => 'gym'],

            ['category' => 'bad_habits', 'slug' => 'smoking'],
            ['category' => 'bad_habits', 'slug' => 'alcohol'],
            ['category' => 'bad_habits', 'slug' => 'fastfood'],
            ['category' => 'bad_habits', 'slug' => 'sugar'],
            ['category' => 'bad_habits', 'slug' => 'energy_drink'],
            ['category' => 'bad_habits', 'slug' => 'gaming_excess'],
            ['category' => 'bad_habits', 'slug' => 'procrastination'],
            ['category' => 'bad_habits', 'slug' => 'late_sleep'],
            ['category' => 'bad_habits', 'slug' => 'doomscrolling'],
            ['category' => 'bad_habits', 'slug' => 'vaping'],

            ['category' => 'house', 'slug' => 'cleaning'],
            ['category' => 'house', 'slug' => 'dishes'],
            ['category' => 'house', 'slug' => 'laundry'],
            ['category' => 'house', 'slug' => 'cooking'],
            ['category' => 'house', 'slug' => 'plants_watering'],
            ['category' => 'house', 'slug' => 'trash_out'],
            ['category' => 'house', 'slug' => 'bed_making'],
            ['category' => 'house', 'slug' => 'organizing'],
            ['category' => 'house', 'slug' => 'grocery_shopping'],
            ['category' => 'house', 'slug' => 'vacuuming'],

            ['category' => 'self_dev', 'slug' => 'reading'],
            ['category' => 'self_dev', 'slug' => 'meditation'],
            ['category' => 'self_dev', 'slug' => 'coding'],
            ['category' => 'self_dev', 'slug' => 'languages'],
            ['category' => 'self_dev', 'slug' => 'journaling'],
            ['category' => 'self_dev', 'slug' => 'online_course'],
            ['category' => 'self_dev', 'slug' => 'drawing'],
            ['category' => 'self_dev', 'slug' => 'music_practice'],
            ['category' => 'self_dev', 'slug' => 'planning'],
            ['category' => 'self_dev', 'slug' => 'podcast'],

            ['category' => 'health', 'slug' => 'water_drinking'],
            ['category' => 'health', 'slug' => 'vitamins'],
            ['category' => 'health', 'slug' => 'skincare'],
            ['category' => 'health', 'slug' => 'fresh_air'],
            ['category' => 'health', 'slug' => 'breakfast'],
            ['category' => 'health', 'slug' => 'eye_gym'],
            ['category' => 'health', 'slug' => 'doctor_visit'],
            ['category' => 'health', 'slug' => 'no_sugar_day'],
            ['category' => 'health', 'slug' => 'med_check'],
            ['category' => 'health', 'slug' => 'healthy_snack'],
        ];

        Activity::insert($activities);
    }
}
