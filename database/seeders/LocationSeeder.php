<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        $locations = [

            'Dhaka' => [

                'Dhaka' => [
                    'Dhamrai',
                    'Dohar',
                    'Keraniganj',
                    'Nawabganj',
                    'Savar',
                    'Tejgaon',
                    'Uttara',
                ],

                'Faridpur' => [
                    'Alfadanga',
                    'Bhanga',
                    'Boalmari',
                    'Char Bhadrasan',
                    'Faridpur Sadar',
                    'Madhukhali',
                    'Nagarkanda',
                    'Sadarpur',
                    'Saltha',
                ],

                'Gazipur' => [
                    'Gazipur Sadar',
                    'Kaliakair',
                    'Kaliganj',
                    'Kapasia',
                    'Sreepur',
                ],

                'Gopalganj' => [
                    'Gopalganj Sadar',
                    'Kashiani',
                    'Kotalipara',
                    'Muksudpur',
                    'Tungipara',
                ],

                'Kishoreganj' => [
                    'Austagram',
                    'Bajitpur',
                    'Bhairab',
                    'Hossainpur',
                    'Itna',
                    'Karimganj',
                    'Katiadi',
                    'Kishoreganj Sadar',
                    'Kuliarchar',
                    'Mithamoin',
                    'Nikli',
                    'Pakundia',
                    'Tarail',
                ],

                'Madaripur' => [
                    'Kalkini',
                    'Madaripur Sadar',
                    'Rajoir',
                    'Shibchar',
                ],

                'Manikganj' => [
                    'Daulatpur',
                    'Ghior',
                    'Harirampur',
                    'Manikganj Sadar',
                    'Saturia',
                    'Shibalaya',
                    'Singair',
                ],

                'Munshiganj' => [
                    'Gazaria',
                    'Lohajang',
                    'Munshiganj Sadar',
                    'Sirajdikhan',
                    'Sreenagar',
                    'Tongibari',
                ],

                'Narayanganj' => [
                    'Araihazar',
                    'Bandar',
                    'Narayanganj Sadar',
                    'Rupganj',
                    'Sonargaon',
                ],

                'Narsingdi' => [
                    'Belabo',
                    'Monohardi',
                    'Narsingdi Sadar',
                    'Palash',
                    'Raipura',
                    'Shibpur',
                ],

                'Rajbari' => [
                    'Baliakandi',
                    'Goalanda',
                    'Kalukhali',
                    'Pangsha',
                    'Rajbari Sadar',
                ],

                'Shariatpur' => [
                    'Bhedarganj',
                    'Damudya',
                    'Gosairhat',
                    'Naria',
                    'Shariatpur Sadar',
                    'Zajira',
                ],

                'Tangail' => [
                    'Basail',
                    'Bhuapur',
                    'Delduar',
                    'Dhanbari',
                    'Ghatail',
                    'Gopalpur',
                    'Kalihati',
                    'Madhupur',
                    'Mirzapur',
                    'Nagarpur',
                    'Sakhipur',
                    'Tangail Sadar',
                ],
            ],

            'Chattogram' => [

                'Bandarban' => [
                    'Ali Kadam',
                    'Bandarban Sadar',
                    'Lama',
                    'Naikhongchhari',
                    'Rowangchhari',
                    'Ruma',
                    'Thanchi',
                ],

                'Brahmanbaria' => [
                    'Akhaura',
                    'Ashuganj',
                    'Bancharampur',
                    'Bijoynagar',
                    'Brahmanbaria Sadar',
                    'Kasba',
                    'Nabinagar',
                    'Nasirnagar',
                    'Sarail',
                ],

                'Chandpur' => [
                    'Chandpur Sadar',
                    'Faridganj',
                    'Haimchar',
                    'Haziganj',
                    'Kachua',
                    'Matlab Dakshin',
                    'Matlab Uttar',
                    'Shahrasti',
                ],

                'Chattogram' => [
                    'Anwara',
                    'Banshkhali',
                    'Boalkhali',
                    'Chandanaish',
                    'Fatikchhari',
                    'Hathazari',
                    'Lohagara',
                    'Mirsharai',
                    'Patiya',
                    'Rangunia',
                    'Raozan',
                    'Sandwip',
                    'Satkania',
                    'Sitakunda',
                ],

                'Cox\'s Bazar' => [
                    'Chakaria',
                    'Cox\'s Bazar Sadar',
                    'Eidgaon',
                    'Kutubdia',
                    'Maheshkhali',
                    'Pekua',
                    'Ramu',
                    'Teknaf',
                    'Ukhia',
                ],

                'Cumilla' => [
                    'Barura',
                    'Brahmanpara',
                    'Burichang',
                    'Chandina',
                    'Chauddagram',
                    'Cumilla Adarsha Sadar',
                    'Cumilla Sadar Dakshin',
                    'Daudkandi',
                    'Debidwar',
                    'Homna',
                    'Laksam',
                    'Lalmai',
                    'Meghna',
                    'Monoharganj',
                    'Muradnagar',
                    'Nangalkot',
                    'Titas',
                ],

                'Feni' => [
                    'Chhagalnaiya',
                    'Daganbhuiyan',
                    'Feni Sadar',
                    'Fulgazi',
                    'Parshuram',
                    'Sonagazi',
                ],

                'Khagrachhari' => [
                    'Dighinala',
                    'Khagrachhari Sadar',
                    'Lakshmichhari',
                    'Mahalchhari',
                    'Manikchhari',
                    'Matiranga',
                    'Panchhari',
                    'Ramgarh',
                ],

                'Lakshmipur' => [
                    'Kamalnagar',
                    'Lakshmipur Sadar',
                    'Raipur',
                    'Ramganj',
                    'Ramgati',
                ],

                'Noakhali' => [
                    'Begumganj',
                    'Chatkhil',
                    'Companiganj',
                    'Hatiya',
                    'Kabirhat',
                    'Senbagh',
                    'Sonaimuri',
                    'Subarnachar',
                    'Noakhali Sadar',
                ],

                'Rangamati' => [
                    'Baghaichhari',
                    'Barkal',
                    'Belaichhari',
                    'Juraichhari',
                    'Kaptai',
                    'Kaukhali',
                    'Langadu',
                    'Naniarchar',
                    'Rajasthali',
                    'Rangamati Sadar',
                ],
            ],

            // অন্যান্য Division-গুলো একই structure-এ থাকবে
        ];

        foreach ($locations as $divisionName => $districts) {

            $division = Division::firstOrCreate([
                'name' => $divisionName,
            ]);

            foreach ($districts as $districtName => $upazilas) {

                $district = District::firstOrCreate([
                    'division_id' => $division->id,
                    'name' => $districtName,
                ]);

                foreach ($upazilas as $upazilaName) {

                    Upazila::firstOrCreate([
                        'district_id' => $district->id,
                        'name' => $upazilaName,
                    ]);
                }
            }
        }
    }
}
