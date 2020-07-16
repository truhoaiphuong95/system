<?php

use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services[] = array(
            'sku' => 'win7',
            'name' => 'Cài đặt Windows 7',
            'price' => '75000'
        );
        $services[] = array(
            'sku' => 'win8',
            'name' => 'Cài đặt Windows 8',
            'price' => '75000'
        );
        $services[] = array(
            'sku' => 'win10',
            'name' => 'Cài đặt Windows 10',
            'price' => '75000'
        );
        $services[] = array(
            'sku' => 'office3',
            'name' => 'Cài đặt Office 2003',
            'price' => '0'
        );
        $services[] = array(
            'sku' => 'office7',
            'name' => 'Cài đặt Office 2007',
            'price' => '0'
        );
        $services[] = array(
            'sku' => 'office10',
            'name' => 'Cài đặt Office 2010',
            'price' => '0'
        );
        $services[] = array(
            'sku' => 'office13',
            'name' => 'Cài đặt Office 2013',
            'price' => '0'
        );
        $services[] = array(
            'sku' => 'office16',
            'name' => 'Cài đặt Office 2016',
            'price' => '0'
        );
        $services[] = array(
            'sku' => 'office19',
            'name' => 'Cài đặt Office 2019',
            'price' => '0'
        );
        $services[] = array(
            'sku' => 'vsm',
            'name' => 'Vệ sinh máy',
            'price' => '150000'
        );
        foreach ($services as $service) {
            DB::table('services')->insert($service);
        }
    }
}
