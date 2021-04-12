<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            'name' 			=> 'Beatrice',
	        'surname' 		=> 'Bianchi',
            'role'          => 'ADMIN',
	        'email' 		=> 'beatrice.bianchi@coffedev.com',
	        'password' 		=> bcrypt('password'),
			'tel' 			=> '1234567890',
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s')		        
		], [
            'name' 			=> 'Martino',
	        'surname' 		=> 'Marroni',
            'role'          => 'ADMIN',
	        'email' 		=> 'martino.marroni@coffedev.com',
	        'password' 		=> bcrypt('password'),
			'tel' 			=> '1234567890',
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s')	        
		], [
            'name' 			=> 'Susanna',
	        'surname' 		=> 'Sasso',
            'role'          => 'USER',
	        'email' 		=> 'susanna.sasso@coffedev.com',
	        'password' 		=> bcrypt('password'),
			'tel' 			=> '1234567890',
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s')	
        ],
        [
            'name' 			=> 'Pietro',
	        'surname' 		=> 'Perlo',
            'role'          => 'USER',
	        'email' 		=> 'pietro.perlo@coffedev.com',
	        'password' 		=> bcrypt('password'),
			'tel' 			=> '1234567890',
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s')	
        ]]);
    }
}