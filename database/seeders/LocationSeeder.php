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

            /*
            |--------------------------------------------------------------------------
            | DHAKA DIVISION
            |--------------------------------------------------------------------------
            */

            'Dhaka' => [

                'Dhaka' => [
                    'Dhamrai',
                    'Dohar',
                    'Keraniganj',
                    'Nawabganj',
                    'Savar',
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
                    'Dasar',
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

            /*
            |--------------------------------------------------------------------------
            | CHATTOGRAM DIVISION
            |--------------------------------------------------------------------------
            */

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
                    'Karnaphuli',
                ],

                "Cox's Bazar" => [
                    'Chakaria',
                    "Cox's Bazar Sadar",
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

            /*
            |--------------------------------------------------------------------------
            | KHULNA DIVISION
            |--------------------------------------------------------------------------
            */

            'Khulna' => [

                'Bagerhat' => [
                    'Bagerhat Sadar',
                    'Chitalmari',
                    'Fakirhat',
                    'Kachua',
                    'Mollahat',
                    'Mongla',
                    'Morrelganj',
                    'Rampal',
                    'Sarankhola',
                ],

                'Chuadanga' => [
                    'Alamdanga',
                    'Chuadanga Sadar',
                    'Damurhuda',
                    'Jibannagar',
                ],

                'Jashore' => [
                    'Abhaynagar',
                    'Bagherpara',
                    'Chaugachha',
                    'Jhikargachha',
                    'Keshabpur',
                    'Jashore Sadar',
                    'Manirampur',
                    'Sharsha',
                ],

                'Jhenaidah' => [
                    'Harinakunda',
                    'Jhenaidah Sadar',
                    'Kaliganj',
                    'Kotchandpur',
                    'Maheshpur',
                    'Shailkupa',
                ],

                'Khulna' => [
                    'Batiaghata',
                    'Dacope',
                    'Dumuria',
                    'Dighalia',
                    'Koyra',
                    'Paikgachha',
                    'Phultala',
                    'Rupsa',
                    'Terokhada',
                ],

                'Kushtia' => [
                    'Bheramara',
                    'Daulatpur',
                    'Khoksa',
                    'Kumarkhali',
                    'Kushtia Sadar',
                    'Mirpur',
                ],

                'Magura' => [
                    'Magura Sadar',
                    'Mohammadpur',
                    'Shalikha',
                    'Sreepur',
                ],

                'Meherpur' => [
                    'Gangni',
                    'Meherpur Sadar',
                    'Mujibnagar',
                ],

                'Narail' => [
                    'Kalia',
                    'Lohagara',
                    'Narail Sadar',
                ],

                'Satkhira' => [
                    'Assasuni',
                    'Debhata',
                    'Kalaroa',
                    'Kaliganj',
                    'Satkhira Sadar',
                    'Shyamnagar',
                    'Tala',
                ],
            ],

            /*
            |--------------------------------------------------------------------------
            | RAJSHAHI DIVISION
            |--------------------------------------------------------------------------
            */

            'Rajshahi' => [

                'Bogura' => [
                    'Adamdighi',
                    'Bogura Sadar',
                    'Dhunat',
                    'Dhupchanchia',
                    'Gabtali',
                    'Kahaloo',
                    'Nandigram',
                    'Sariakandi',
                    'Shajahanpur',
                    'Sherpur',
                    'Shibganj',
                    'Sonatala',
                ],

                'Joypurhat' => [
                    'Akkelpur',
                    'Joypurhat Sadar',
                    'Kalai',
                    'Khetlal',
                    'Panchbibi',
                ],

                'Naogaon' => [
                    'Atrai',
                    'Badalgachhi',
                    'Dhamoirhat',
                    'Manda',
                    'Mohadevpur',
                    'Naogaon Sadar',
                    'Niamatpur',
                    'Patnitala',
                    'Porsha',
                    'Raninagar',
                    'Sapahar',
                ],

                'Natore' => [
                    'Bagatipara',
                    'Baraigram',
                    'Gurudaspur',
                    'Lalpur',
                    'Natore Sadar',
                    'Naldanga',
                    'Singra',
                ],

                'Chapainawabganj' => [
                    'Bholahat',
                    'Gomastapur',
                    'Nachole',
                    'Chapainawabganj Sadar',
                    'Shibganj',
                ],

                'Pabna' => [
                    'Atgharia',
                    'Bera',
                    'Bhangura',
                    'Chatmohar',
                    'Faridpur',
                    'Ishwardi',
                    'Pabna Sadar',
                    'Santhia',
                    'Sujanagar',
                ],

                'Rajshahi' => [
                    'Bagha',
                    'Bagmara',
                    'Charghat',
                    'Durgapur',
                    'Godagari',
                    'Mohanpur',
                    'Paba',
                    'Putia',
                    'Tanore',
                ],

                'Sirajganj' => [
                    'Belkuchi',
                    'Chauhali',
                    'Kamarkhanda',
                    'Kazipur',
                    'Raiganj',
                    'Shahjadpur',
                    'Sirajganj Sadar',
                    'Tarash',
                    'Ullapara',
                ],
            ],

            /*
            |--------------------------------------------------------------------------
            | SYLHET DIVISION
            |--------------------------------------------------------------------------
            */

            'Sylhet' => [

                'Habiganj' => [
                    'Ajmiriganj',
                    'Bahubal',
                    'Baniachong',
                    'Chunarughat',
                    'Habiganj Sadar',
                    'Lakhai',
                    'Madhabpur',
                    'Nabiganj',
                    'Shayestaganj',
                ],

                'Moulvibazar' => [
                    'Barlekha',
                    'Juri',
                    'Kamalganj',
                    'Kulaura',
                    'Moulvibazar Sadar',
                    'Rajnagar',
                    'Sreemangal',
                ],

                'Sunamganj' => [
                    'Bishwambharpur',
                    'Chhatak',
                    'Derai',
                    'Dharampasha',
                    'Dowarabazar',
                    'Jagannathpur',
                    'Jamalganj',
                    'Shantiganj',
                    'Shalla',
                    'Sunamganj Sadar',
                    'Tahirpur',
                    'Madhyanagar',
                ],

                'Sylhet' => [
                    'Balaganj',
                    'Beanibazar',
                    'Bishwanath',
                    'Companiganj',
                    'Dakshin Surma',
                    'Fenchuganj',
                    'Golapganj',
                    'Gowainghat',
                    'Jaintiapur',
                    'Kanaighat',
                    'Osmani Nagar',
                    'Sylhet Sadar',
                    'Zakiganj',
                ],
            ],

            /*
            |--------------------------------------------------------------------------
            | RANGPUR DIVISION
            |--------------------------------------------------------------------------
            */

            'Rangpur' => [

                'Dinajpur' => [
                    'Birampur',
                    'Birganj',
                    'Birampur',
                    'Bochaganj',
                    'Chirirbandar',
                    'Dinajpur Sadar',
                    'Fulbari',
                    'Ghoraghat',
                    'Hakimpur',
                    'Kaharole',
                    'Khansama',
                    'Nawabganj',
                    'Parbatipur',
                ],

                'Gaibandha' => [
                    'Phulchhari',
                    'Gaibandha Sadar',
                    'Gobindaganj',
                    'Palashbari',
                    'Sadullapur',
                    'Saghata',
                    'Sundarganj',
                ],

                'Kurigram' => [
                    'Bhurungamari',
                    'Char Rajibpur',
                    'Chilmari',
                    'Kurigram Sadar',
                    'Nageshwari',
                    'Phulbari',
                    'Rajarhat',
                    'Raomari',
                    'Ulipur',
                ],

                'Lalmonirhat' => [
                    'Aditmari',
                    'Hatibandha',
                    'Kaliganj',
                    'Lalmonirhat Sadar',
                    'Patgram',
                ],

                'Nilphamari' => [
                    'Dimla',
                    'Domar',
                    'Jaldhaka',
                    'Kishoreganj',
                    'Nilphamari Sadar',
                    'Saidpur',
                ],

                'Panchagarh' => [
                    'Atwari',
                    'Boda',
                    'Debiganj',
                    'Panchagarh Sadar',
                    'Tetulia',
                ],

                'Rangpur' => [
                    'Badarganj',
                    'Gangachara',
                    'Kaunia',
                    'Mithapukur',
                    'Pirgachha',
                    'Pirganj',
                    'Rangpur Sadar',
                    'Taraganj',
                ],

                'Thakurgaon' => [
                    'Baliadangi',
                    'Haripur',
                    'Pirganj',
                    'Ranisankail',
                    'Thakurgaon Sadar',
                    'Ruhia',
                    'Bholahat',
                ],
            ],

            /*
            |--------------------------------------------------------------------------
            | MYMENSINGH DIVISION
            |--------------------------------------------------------------------------
            */

            'Mymensingh' => [

                'Jamalpur' => [
                    'Baksiganj',
                    'Dewanganj',
                    'Islampur',
                    'Jamalpur Sadar',
                    'Madarganj',
                    'Melandaha',
                    'Sarishabari',
                ],

                'Mymensingh' => [
                    'Bhaluka',
                    'Dhobaura',
                    'Fulbaria',
                    'Gaffargaon',
                    'Gauripur',
                    'Haluaghat',
                    'Ishwarganj',
                    'Muktagachha',
                    'Mymensingh Sadar',
                    'Nandail',
                    'Phulpur',
                    'Tarakanda',
                    'Trishal',
                ],

                'Netrokona' => [
                    'Atpara',
                    'Barhatta',
                    'Durgapur',
                    'Khaliajuri',
                    'Kalmakanda',
                    'Kendua',
                    'Madan',
                    'Mohanganj',
                    'Netrokona Sadar',
                    'Purbadhala',
                ],

                'Sherpur' => [
                    'Jhenaigati',
                    'Nakla',
                    'Nalitabari',
                    'Sherpur Sadar',
                    'Sreebardi',
                ],
            ],

            /*
            |--------------------------------------------------------------------------
            | BARISHAL DIVISION
            |--------------------------------------------------------------------------
            */

            'Barishal' => [

                'Barguna' => [
                    'Amtali',
                    'Bamna',
                    'Barguna Sadar',
                    'Betagi',
                    'Patharghata',
                    'Taltali',
                ],

                'Barishal' => [
                    'Agailjhara',
                    'Babuganj',
                    'Bakerganj',
                    'Banaripara',
                    'Barishal Sadar',
                    'Gaurnadi',
                    'Hizla',
                    'Mehendiganj',
                    'Muladi',
                    'Wazirpur',
                ],

                'Bhola' => [
                    'Bhola Sadar',
                    'Burhanuddin',
                    'Char Fasson',
                    'Daulatkhan',
                    'Lalmohan',
                    'Manpura',
                    'Tazumuddin',
                ],

                'Jhalokathi' => [
                    'Jhalokathi Sadar',
                    'Kathalia',
                    'Nalchity',
                    'Rajapur',
                ],

                'Patuakhali' => [
                    'Bauphal',
                    'Dashmina',
                    'Dumki',
                    'Galachipa',
                    'Kalapara',
                    'Mirzaganj',
                    'Patuakhali Sadar',
                    'Rangabali',
                ],

                'Pirojpur' => [
                    'Bhandaria',
                    'Kawkhali',
                    'Mathbaria',
                    'Nazirpur',
                    'Pirojpur Sadar',
                    'Nesarabad',
                    'Indurkani',
                ],
            ],
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
