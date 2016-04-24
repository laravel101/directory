<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = json_decode(File::get(__DIR__."/cities.json"));
        $addedCity = 1;
        foreach($json as $city => $towns) {
            $citym = new App\City;
            $citym->name = $city;
            $citym->slug = str_slug($city);
            $citym->save();

            foreach($towns as $town) {
                $townm = new App\Town;
                $townm->name = $town;
                $townm->slug = App\Town::where("slug", str_slug($town))->count() > 0 ? str_slug($city."-".$town) : str_slug($town);
                $townm->city_id = $citym->id;
                $townm->save();
            }

            $this->command->info($addedCity." - ". $city);
            $addedCity++;
        }
    }
}
