<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use CodeIgniter\Database\RawSql;

use Faker\Factory;

class SiswaSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('id_ID');

        for ($i = 0; $i < 100; $i++) {
            // Menghasilkan tanggal acak untuk created_at dan updated_at
            $createdAt = $faker->dateTimeBetween('-2 years', 'now');
            //  2 tahun terakhir, Updated setelah created
            $updatedAt = $faker->dateTimeBetween($createdAt, 'now');

            $firstName = $faker->firstName();
            $lastName = $faker->lastName();

            //membuat email sma dgn namanya
            $email = strtolower($firstName) . '' . strtolower($lastName) . '@gmail.com';

            $data[] = [
                'nama' => $firstName . ' ' . $lastName,
                'slug' => strtolower($firstName),
                'kelas' => $faker->randomElement(['X', 'XI', 'XII']),
                'jurusan' => $faker->randomElement(['TKJ', 'Multimedia', 'RPL', 'Manajemen Bisnis', 'Akuntansi']),
                'tanggal_lahir' => $faker->dateTimeBetween('2001-01-01', '2008-12-31')->format('Y-m-d'),
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'alamat' => $faker->streetAddress(),
                'email' => $email,
                'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
                'thn_masuk' => $faker->numberBetween(2020, 2023),
                'created_at' => $createdAt->format('Y-m-d H:i:s'),
                'updated_at' => $updatedAt->format('Y-m-d H:i:s'),
            ];
        }

        // Menggunakan query builder untuk memasukkan data ke dalam tabel siswa.
        $this->db->table('siswa')->insertBatch($data);
    }
}
