<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schedule::truncate();

        $data = [
            ['date' => '2026-05-01', 'subuh' => '04:21', 'dzuhur' => '11:36', 'ashar' => '14:57', 'maghrib' => '17:31', 'isya' => '18:43', 'petugas_imam' => '-'],
            ['date' => '2026-05-02', 'subuh' => '04:21', 'dzuhur' => '11:36', 'ashar' => '14:57', 'maghrib' => '17:31', 'isya' => '18:43', 'petugas_imam' => '-'],
            ['date' => '2026-05-03', 'subuh' => '04:21', 'dzuhur' => '11:36', 'ashar' => '14:57', 'maghrib' => '17:31', 'isya' => '18:42', 'petugas_imam' => '-'],
            ['date' => '2026-05-04', 'subuh' => '04:21', 'dzuhur' => '11:36', 'ashar' => '14:57', 'maghrib' => '17:31', 'isya' => '18:42', 'petugas_imam' => '-'],
            ['date' => '2026-05-05', 'subuh' => '04:21', 'dzuhur' => '11:36', 'ashar' => '14:57', 'maghrib' => '17:30', 'isya' => '18:42', 'petugas_imam' => '-'],
            ['date' => '2026-05-06', 'subuh' => '04:21', 'dzuhur' => '11:35', 'ashar' => '14:57', 'maghrib' => '17:30', 'isya' => '18:42', 'petugas_imam' => '-'],
            ['date' => '2026-05-07', 'subuh' => '04:21', 'dzuhur' => '11:35', 'ashar' => '14:57', 'maghrib' => '17:30', 'isya' => '18:42', 'petugas_imam' => '-'],
            ['date' => '2026-05-08', 'subuh' => '04:21', 'dzuhur' => '11:35', 'ashar' => '14:57', 'maghrib' => '17:30', 'isya' => '18:42', 'petugas_imam' => '-'],
            ['date' => '2026-05-09', 'subuh' => '04:20', 'dzuhur' => '11:35', 'ashar' => '14:57', 'maghrib' => '17:29', 'isya' => '18:42', 'petugas_imam' => '-'],
            ['date' => '2026-05-10', 'subuh' => '04:20', 'dzuhur' => '11:35', 'ashar' => '14:57', 'maghrib' => '17:29', 'isya' => '18:41', 'petugas_imam' => '-'],
            ['date' => '2026-05-11', 'subuh' => '04:20', 'dzuhur' => '11:35', 'ashar' => '14:57', 'maghrib' => '17:29', 'isya' => '18:41', 'petugas_imam' => '-'],
            ['date' => '2026-05-12', 'subuh' => '04:20', 'dzuhur' => '11:35', 'ashar' => '14:57', 'maghrib' => '17:29', 'isya' => '18:41', 'petugas_imam' => '-'],
            ['date' => '2026-05-13', 'subuh' => '04:20', 'dzuhur' => '11:35', 'ashar' => '14:57', 'maghrib' => '17:29', 'isya' => '18:41', 'petugas_imam' => '-'],
            ['date' => '2026-05-14', 'subuh' => '04:20', 'dzuhur' => '11:35', 'ashar' => '14:57', 'maghrib' => '17:28', 'isya' => '18:41', 'petugas_imam' => '-'],
            ['date' => '2026-05-15', 'subuh' => '04:21', 'dzuhur' => '11:35', 'ashar' => '14:57', 'maghrib' => '17:28', 'isya' => '18:41', 'petugas_imam' => '-'],
            ['date' => '2026-05-16', 'subuh' => '04:21', 'dzuhur' => '11:35', 'ashar' => '14:57', 'maghrib' => '17:28', 'isya' => '18:41', 'petugas_imam' => '-'],
            ['date' => '2026-05-17', 'subuh' => '04:21', 'dzuhur' => '11:35', 'ashar' => '14:57', 'maghrib' => '17:28', 'isya' => '18:41', 'petugas_imam' => '-'],
            ['date' => '2026-05-18', 'subuh' => '04:21', 'dzuhur' => '11:35', 'ashar' => '14:57', 'maghrib' => '17:28', 'isya' => '18:41', 'petugas_imam' => '-'],
            ['date' => '2026-05-19', 'subuh' => '04:21', 'dzuhur' => '11:35', 'ashar' => '14:57', 'maghrib' => '17:28', 'isya' => '18:41', 'petugas_imam' => '-'],
            ['date' => '2026-05-20', 'subuh' => '04:21', 'dzuhur' => '11:35', 'ashar' => '14:57', 'maghrib' => '17:28', 'isya' => '18:41', 'petugas_imam' => '-'],
            ['date' => '2026-05-21', 'subuh' => '04:21', 'dzuhur' => '11:35', 'ashar' => '14:57', 'maghrib' => '17:28', 'isya' => '18:41', 'petugas_imam' => '-'],
            ['date' => '2026-05-22', 'subuh' => '04:21', 'dzuhur' => '11:35', 'ashar' => '14:57', 'maghrib' => '17:28', 'isya' => '18:41', 'petugas_imam' => '-'],
            ['date' => '2026-05-23', 'subuh' => '04:21', 'dzuhur' => '11:35', 'ashar' => '14:57', 'maghrib' => '17:28', 'isya' => '18:41', 'petugas_imam' => '-'],
            ['date' => '2026-05-24', 'subuh' => '04:21', 'dzuhur' => '11:35', 'ashar' => '14:57', 'maghrib' => '17:28', 'isya' => '18:41', 'petugas_imam' => '-'],
            ['date' => '2026-05-25', 'subuh' => '04:21', 'dzuhur' => '11:36', 'ashar' => '14:57', 'maghrib' => '17:28', 'isya' => '18:41', 'petugas_imam' => '-'],
            ['date' => '2026-05-26', 'subuh' => '04:21', 'dzuhur' => '11:36', 'ashar' => '14:57', 'maghrib' => '17:28', 'isya' => '18:41', 'petugas_imam' => '-'],
            ['date' => '2026-05-27', 'subuh' => '04:21', 'dzuhur' => '11:36', 'ashar' => '14:57', 'maghrib' => '17:28', 'isya' => '18:42', 'petugas_imam' => '-'],
            ['date' => '2026-05-28', 'subuh' => '04:21', 'dzuhur' => '11:36', 'ashar' => '14:57', 'maghrib' => '17:28', 'isya' => '18:42', 'petugas_imam' => '-'],
            ['date' => '2026-05-29', 'subuh' => '04:22', 'dzuhur' => '11:36', 'ashar' => '14:57', 'maghrib' => '17:28', 'isya' => '18:42', 'petugas_imam' => '-'],
            ['date' => '2026-05-30', 'subuh' => '04:22', 'dzuhur' => '11:36', 'ashar' => '14:57', 'maghrib' => '17:28', 'isya' => '18:42', 'petugas_imam' => '-'],
            ['date' => '2026-05-31', 'subuh' => '04:22', 'dzuhur' => '11:36', 'ashar' => '14:57', 'maghrib' => '17:28', 'isya' => '18:42', 'petugas_imam' => '-'],
        ];

        foreach ($data as $row) {
            Schedule::create($row);
        }
    }
}
