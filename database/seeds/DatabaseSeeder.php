<?php

use Illuminate\Database\Seeder;
use App\Models\Theme;
use App\User;
use App\Models\SelectTheme;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('themes')->truncate();
        DB::table('select_themes')->truncate();
        DB::table('users')->truncate();
        SelectTheme::create(
            array(
                'select_theme_name' => 'Blue Air'
            )
        );

        Theme::create(
            array(
                'name' => 'Blue Air'
            )
        );

        Theme::create(
            array(
                'name' => 'Blue Sky'
            )
        );
        Theme::create(
            array(
                'name' => 'Light Air'
            )
        );
        Theme::create(
            array(
                'name' => 'Paradise Beach'
            )
        );
        Theme::create(
            array(
                'name' => 'Sea Breeze'
            )
        );
        Theme::create(
            array(
                'name' => 'Sunset'
            )
        );
        User::create(
            array(
                'name' => 'agent',
                'email' => 'agent@mail.ru',
                'password' => bcrypt('12345')
            )
        );
    }
}
