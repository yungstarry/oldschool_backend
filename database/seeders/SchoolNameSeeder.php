<?php

namespace Database\Seeders;

use App\Models\SchoolName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schoolNames = [
            "Abubakar Tafawa Balewa University, Bauchi",
            "Ahmadu Bello University, Zaria",
            "Bayero University, Kano",
            "Federal University Gashua, Yobe",
            "Federal University of Petroleum Resources, Effurun",
            "Federal University of Technology, Akure",
            "Federal University of Technology, Minna",
            "Federal University of Technology, Owerri",
            "Federal University, Dutse, Jigawa State",
            "Federal University, Dutsin-Ma, Katsina",
            "Federal University, Kashere, Gombe State",
            "Federal University, Lafia, Nasarawa State",
            "Federal University, Lokoja, Kogi State",
            "Alex Ekwueme University, Ndufu-Alike, Ebonyi State",
            "Federal University, Otuoke, Bayelsa",
            "Federal University, Oye-Ekiti, Ekiti State",
            "Federal University, Wukari, Taraba State",
            "Federal University, Birnin Kebbi",
            "Federal University, Gusau Zamfara",
            "Michael Okpara University of Agricultural Umudike",
            "Modibbo Adama University of Technology, Yola",
            "National Open University of Nigeria, Abuja",
            "Nigeria Police Academy Wudil",
            "Nigerian Defence Academy Kaduna",
            "Nnamdi Azikiwe University, Awka",
            "Obafemi Awolowo University,Ile-Ife",
            "University of Abuja, Gwagwalada",
            "Federal University of Agriculture, Abeokuta",
            "Joseph Sarwuan Tarka University, Makurdi",
            "University of Benin",
            "University of Calabar",
            "University of Ibadan",
            "University of Ilorin",
            "University of Jos",
            "University of Lagos",
            "University of Maiduguri",
            "University of Nigeria, Nsukka",
            "University of Port-Harcourt",
            "University of Uyo",
            "Usumanu Danfodiyo University",
            "Nigerian Maritime University Okerenkoko, Delta State",
            "Air Force Institute of Technology, Kaduna",
            "Nigerian Army University Biu",
            "Federal University of Health Sciences, Otukpo, Benue State",
            "Federal University of Agriculture, Zuru, Kebbi State",
            "Federal University of Technology, Babura, Jigawa State",
            "Federal University of Technology, Ikot Abasi, Akwa Ibom State",
            "Federal University of Health Sciences, Azare, Bauchi State",
            "Federal University of Health Sciences, Ila Orangun, Osun State",
            "David Nweze Umahi Federal University of Medical Sciences, Uburu",
            "Admiralty University Ibusa, Delta State",
            "Federal University of Transportation Daura, Katsina",
            "African Aviation and Aerospace University",
            "National University of Science and Technology, Abuja",
            "Federal University of Agriculture Bassam-Biri, Bayelsa",
            "Federal University of Health Sciences Kwale, Delta State",
            "Federal University of Health Sciences, Katsina",
            "Federal University of Agriculture, Mubi",
            "Federal University of Education, Zaria, Kaduna State",
            "Alvan Ikoku Federal University of Education, Owerri, Imo State",
            "Federal University of Education, Kano",
            "Adeyemi Federal University of Education, Ondo",
            "Abia State University, Uturu",
            "Adamawa State University Mubi",
            "Adekunle Ajasin University, Akungba",
            "Akwa Ibom State University, Ikot Akpaden",
            "Ambrose Alli University, Ekpoma",
            "Chukwuemeka Odumegwu Ojukwu University, Uli",
            "Bauchi State University, Gadau",
            "Benue State University, Makurdi",
            "Yobe State University, Damaturu",
            "Cross River State University of Technology, Calabar",
            "Delta State University Abraka",
            "Ebonyi State University, Abakaliki",
            "Ekiti State University",
            "Enugu State University of Science and Technology, Enugu",
            "Gombe State Univeristy, Gombe",
            "Ibrahim Badamasi Babangida University, Lapai",
            "Ignatius Ajuru University of Education,Rumuolumeni",
            "Imo State University, Owerri",
            "Sule Lamido University, Kafin Hausa, Jigawa",
            "Kaduna State University, Kaduna",
            "Kano University of Science & Technology, Wudil",
            "Kebbi State University of Science and Technology, Aliero",
            "Prince Abubakar Audu University Anyigba",
            "Kwara State University, Ilorin",
            "Ladoke Akintola University of Technology, Ogbomoso",
            "Ondo State University of Science and Technology Okitipupa",
            "Rivers State University",
            "Olabisi Onabanjo University, Ago Iwoye",
            "Lagos State University, Ojo",
            "Niger Delta University Yenagoa",
            "Nasarawa State University Keffi",
            "Plateau State University Bokkos",
            "Tai Solarin University of Education Ijebu Ode",
            "Umar Musa Yar' Adua University Katsina",
            "Osun State University Osogbo",
            "Taraba State University, Jalingo",
            "Sokoto State University",
            "Yusuf Maitama Sule University Kano",
            "First Technical University Ibadan",
            "Ondo State University of Medical Sciences",
            "Edo State University Uzairue",
            "Kingsley Ozumba Mbadiwe University Ogboko, Imo State",
            "University of Africa Toru Orua, Bayelsa State",
            "Bornu State University, Maiduguri",
            "Moshood Abiola University of Science and Technology Abeokuta",
            "Gombe State University of Science and Technology",
            "Zamfara State University",
            "Bayelsa Medical University",
            "University of Agriculture and Environmental Sciences Umuagwo, Imo State",
            "Confluence University of Science and Technology Osara, Kogi",
            "University of Delta, Agbor",
            "Delta University of Science and Technology, Ozoro",
            "Dennis Osadebe University, Asaba",
            "Bamidele Olumilua University of Science and Technology Ikere, Ekiti State",
            "Lagos State University of Education, Ijanikin",
            "Lagos State University of Science and Technology Ikorodu",
            "Shehu Shagari University of Education, Sokoto",
            "State University of Medical and Applied Sciences, Igbo-Eno, Enugu",
            "University of Ilesa, Osun State",
            "Emanuel Alayande University of Education Oyo",
            "Sa’adatu Rimi University of Education",
            "Kogi State University, Kabba",
            "AbdulKadir Kure University, Minna Niger State",
            "Achievers University, Owo",
            "Adeleke University, Ede",
            "Afe Babalola University, Ado-Ekiti - Ekiti State",
            "Ajayi Crowther University, Ibadan",
            "Al-Hikmah University, Ilorin",
            "Al-Qalam University, Katsina",
            "American University of Nigeria, Yola",
            "Augustine University",
            "Babcock University,Ilishan-Remo",
            "Baze University",
            "Bells University of Technology, Otta",
            "Benson Idahosa University, Benin City",
            "Bingham University, New Karu",
            "Bowen University, Iwo",
            "Caleb University, Lagos",
            "Caritas University, Enugu",
            "Chrisland University",
            "Covenant University Ota",
            "Crawford University Igbesa",
            "Crescent University",
            "Edwin Clark University, Kaigbodo",
            "Elizade University, Ilara-Mokin",
            "Evangel University, Akaeze",
            "Fountain Unveristy, Oshogbo",
            "Gregory University, Uturu",
            "Hallmark University, Ijebi Itele, Ogun",
            "Hezekiah University, Umudi",
            "Godfrey Okoye University, Ugwuomu-Nike - Enugu State",
            "African University of Science and Technology, Abuja",
            "Igbinedion University Okada",
            "Joseph Ayo Babalola University, Ikeji-Arakeji",
            "Kings University, Ode Omu",
            "Kwararafa University, Wukari",
            "Landmark University, Omu-Aran.",
            "Lead City University, Ibadan",
            "Madonna University, Okija",
            "Mcpherson University, Seriki Sotayo, Ajebo",
            "Micheal & Cecilia Ibru University",
            "Mountain Top University",
            "Nile University of Nigeria, Abuja",
            "Novena University, Ogume",
            "Obong University, Obong Ntak",
            "Oduduwa University, Ipetumodu - Osun State",
            "Pan-Atlantic University, Lagos",
            "Paul University, Awka - Anambra State",
            "Redeemer's University, Ede",
            "Renaissance University, Enugu",
            "Rhema University, Obeama-Asa - Rivers State",
            "Ritman University, Ikot Ekpene, Akwa Ibom",
            "Salem University, Lokoja",
            "Glorious Vision University, Ogwa, Edo State.",
            "Southwestern University, Oku Owa",
            "Summit University, Offa",
            "Tansian University, Umunya",
            "University of Mkar, Mkar",
            "Veritas University, Abuja",
            "Wellspring University, Evbuobanosa - Edo State",
            "Wesley University Ondo",
            "Western Delta University, Oghara Delta State",
            "Christopher University Mowe",
            "Kola Daisi University Ibadan, Oyo State",
            "Anchor University Ayobo Lagos State",
            "Dominican University Ibadan Oyo State",
            "Legacy University, Okija Anambra State",
            "Arthur Javis University Akpoyubo Cross river State",
            "Ojaja University Eiyenkorin, Kwara State",
            "Coal City University Enugu State",
            "Clifford University Owerrinta Abia State",
            "Spiritan University, Nneochi Abia State",
            "Precious Cornerstone University, Oyo",
            "PAMO University of Medical Sciences, Portharcourt",
            "Atiba University Oyo",
            "Eko University of Medical and Health Sciences Ijanikin, Lagos",
            "Skyline University, Kano",
            "Greenfield University, Kaduna",
            "Dominion University Ibadan, Oyo State",
            "Trinity University Ogun State",
            "Westland University Iwo, Osun State",
            "Topfaith University, Mkpatak, Akwa Ibom State",
            "Thomas Adewumi University, Oko-Irese, Kwara State",
            "Maranatha University, Lagos",
            "Ave Maria University, Piyanko, Nasarawa State",
            "Al-Istiqama University, Sumaila, Kano State",
            "Mudiame University, Irrua, Edo State",
            "Havilla University, Nde-Ikom, Cross River State",
            "Claretian University of Nigeria, Nekede, Imo State",
            "NOK University, Kachia, Kaduna State",
            "Karl-Kumm University, Vom, Plateau State",
            "James Hope University, Lagos, Lagos State",
            "Maryam Abacha American University of Nigeria, Kano State",
            "Capital City University, Kano State",
            "Ahman Pategi University, Kwara State",
            "University of Offa, Kwara State",
            "Mewar International University, Masaka, Nasarawa State",
            "Edusoko University, Bida, Niger State",
            "Philomath University, Kuje, Abuja",
            "Khadija University, Majia, Jigawa State",
            "Anan University, Kwall, Plateau State",
            "North Eastern University, Gombe",
            "Al-Ansar University, Maiduguri, Borno",
            "Margaret Lawrence University, Umunede, Delta State",
            "Khalifa Isiyaku Rabiu University, Kano",
            "Sports University, Idumuje, Ugboko, Delta State",
            "Baba Ahmed University, Kano State",
            "Saisa University of Medical Sciences and Technology, Sokoto State",
            "Nigerian British University, Asa, Abia State",
            "Peter University, Achina-Onneh Anambra State",
            "Newgate University, MInna, Niger State.",
            "European University of Nigeria, Duboyi, FCT",
            "NorthWest University Sokoto State",
            "Rayhaan University, Kebbi",
            "Muhammad Kamalud University Kwara",
            "Sam Maris University, Ondo",
            "Aletheia University, Ago-Iwoye Ogun State",
            "Lux Mundi University Umuahia, Abia State",
            "Maduka University, Ekwegbe, Enugu State",
            "PeaceLand University, Enugu State",
            "Amadeus University, Amizi, Abia State",
            "Vision University, Ikogbo, Ogun State",
            "Azman University, Kano State",
            "Huda University, Gusau, Zamafara State",
            "Franco British International University, Kaduna State",
            "Canadian University of Nigeria, Abuja",
            "Gerar University of Medical Science Imope Ijebu, Ogun State.",
            "British Canadian University, Obufu Cross River State",
            "Hensard University, Toru-Orua, Sagbama, Bayelsa State",
            "Amaj University, Kwali, Abuja",
            "Phoenix University, Agwada, Nasarawa State",
            "Wigwe University, Isiokpo Rivers State",
            "Hillside University of Science and Technology, Okemisi, Ekiti State",
            "University on the Niger, Umunya, Anambra state",
            "Elrazi Medical University Yargaya University, Kano State",
            "Venite University, Iloro-Ekiti, Ekiti State",
            "Shanahan University Onitsha, Anambra State",
            "The Duke Medical University, Calabar, Cross River State",
            "Mercy Medical University, Iwo, Ogun State",
            "Cosmopolitan University Abuja",
            "Miva Open University, Abuja FCT",
            "Iconic Open University, Sokoto State.",
            "West Midlands Open University, Ibadan, Oyo State",
            "Al-Muhibbah Open University, Abuja",
            "El-Amin University, Minna, Niger State",
            "College of Petroleum and Energy Studies, Kaduna State",
            "Jewel University, Gombe state",
            "Prime University, Kuje, FCT Abuja",
            "Nigerian University of Technology and Management, Apapa, Lagos State",
            "Al-Bayan University, Ankpa, Kogi State",
            "Lighthouse University, Evbobanosa, Edo State",
            "African University of Economics, FCT, Abuja",
        ]; // Add your list of school names here

        foreach ($schoolNames as $name) {
            SchoolName::create(['name' => $name]);
        }
    }
}