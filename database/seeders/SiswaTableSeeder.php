<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SiswaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('siswa')->delete();

        \DB::table('siswa')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'nayon',
                'profil' => 'gambar_siswa/EJ1OT2FKHmDKVpsBTWt48WML2bPcHAe5LacEPx9H.jpg',
            'about' => 'Im Na-yeon (Hangul: 임나연; lahir 22 September 1995), lebih dikenal sebagai Nayeon, adalah seorang penyanyi asal Korea Selatan. Setelah ikut serta dalam acara realitas berjudul Sixteen pada tahun 2015, ia terpilih menjadi anggota grup vokal wanita asal Korea Selatan, Twice, yang dibentuk oleh JYP Entertainment.[3][4] Nayeon dideskripsikan sebagai salah satu vokalis dan penari utama Twice, dan sering kali mengisi posisi center selama melakukan tarian.[3][5] Nayeon adalah anggota Twice yang paling tua.[3][6] Selama dua tahun berturut-turut (2017 dan 2018), ia merupakan idola Korea terpopuler keenam dalam jajak pendapat musik tahunan Gallup Korea, dan naik ke posisi kelima pada tahun 2019.',
                'email' => 'nayeon@gmail.com',
                'jenis_kelamin' => 'Perempuan',
                'alamat' => 'banten',
                'nisn' => '9999999',
                'created_at' => '2022-08-30 12:12:41',
                'updated_at' => '2022-08-30 12:16:36',
            ),
        ));


    }
}
