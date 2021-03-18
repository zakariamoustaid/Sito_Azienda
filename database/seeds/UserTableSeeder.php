<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
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
            'role'          => 'admin',
	        'email' 		=> 'beatrice.bianchi@coffedev.com',
	        'password' 		=> bcrypt('password'),
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s')		        
		], [
            'name' 			=> 'Martino',
	        'surname' 		=> 'Marroni',
            'role'          => 'admin',
	        'email' 		=> 'martino.marroni@coffedev.com',
	        'password' 		=> bcrypt('password'),
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s')	        
		], [
            'name' 			=> 'Susanna',
	        'surname' 		=> 'Sasso',
            'role'          => 'user',
	        'email' 		=> 'susanna.sasso@coffedev.com',
	        'password' 		=> bcrypt('password'),
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s')	
        ],
        [
            'name' 			=> 'Pietro',
	        'surname' 		=> 'Perlo',
            'role'          => 'user',
	        'email' 		=> 'pietro.perlo@coffedev.com',
	        'password' 		=> bcrypt('password'),
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s')	
        ]]);
    }
}
