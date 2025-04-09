<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Log;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::factory()
            ->count(2)
            // ->state(
            //     new Sequence(
            //         [
            //             'category_name' => 'Poli A',
            //             'category_colour' => '#0ad800'
            //         ],
            //         [
            //             'category_name' => 'Poli B',
            //             'category_colour' => '#ff4f4f'
            //         ]
            //     )
            // )
            ->sequence(
                fn ($sequence) =>
                [
                    'category_name' => 'Poli ' . $sequence->index + 1,
                    'category_colour' => '#0ad80' . $sequence->index + 1
                ],
            )
            ->has(
                Jadwal::factory()
                    ->count(10)
                    ->state(
                        function (array $attributes, Kategori $kategori) {
                            Log::info($kategori->category_id);
                            return [
                                // 'event_id' => $sequence->index + 1,
                                'event_status' => 'P',
                                'event_begin' => '06/09/24',
                                'event_end' => '06/09/24',
                                'event_title' => 'dr. Ganis Panji Yahya, Sp.A',
                                'event_desc' => 'Poliklinik Spesialis Anak',
                                // 'event_location' => '',
                                'event_link_location' => 'F',
                                'event_all_day' => 'F',
                                'event_time' => '13:30:00',
                                'event_end_time' => '15:00:00',
                                'event_recur' => 'D',
                                'event_recur_multiplier' => 7,
                                'event_repeats' => 12,
                                'event_hide_events' => 'F',
                                'event_show_title' => 'F',
                                'event_author' => 3,
                                'event_category' => $kategori->id,
                                // 'event_link' => '',
                                'event_image' => 0,
                            ];
                        }, 'kategori'
                        // ->sequence(fn ($sequence) => [
                    )
            )
            ->create();
    }
}
