<?php

use Illuminate\Database\Seeder;
use App\Location;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\Location::class, 20)->create();

        DB::table('locations')->delete();
        $locations = array('New York City, NY', 'Boston, MA', 'San Diego, CA', 'San Francisco, CA', 'Baltimore, MD', 'Houston, TX', 'Austin, TX', 'Denver, CO', 'Las Vegas, NV', 'New Orleans, LA', 'Richmond, VA', 'Charlotte, NC', 'Seattle, Washington', 'Ann Arbor, MI', 'Chicago, IL', 'London, England', 'Dublin, Ireland', 'Tokyo, Japan', 'Shanghai, China', 'Hong Kong, China', 'Bangalore, India', 'Paris, France', 'Frankfurt, Germany', 'Berlin, Germany', 'Sydney, Australia');
        foreach ($locations as $locationName){
            $location = ['name' => $locationName];
            Location::create($location);
        }
    }
}
