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
        ], [
            'name' 			=> 'Lara',
	        'surname' 		=> 'Luce',
            'role'          => 'USER',
	        'email' 		=> 'lara.luce@coffedev.com',
	        'password' 		=> bcrypt('password'),
			'tel' 			=> '1234567890',
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s')	
        ], [
            'name' 			=> 'Marta',
	        'surname' 		=> 'Manna',
            'role'          => 'USER',
	        'email' 		=> 'marta.manna@coffedev.com',
	        'password' 		=> bcrypt('password'),
			'tel' 			=> '1234567890',
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s')	
        ], [
            'name' 			=> 'Federico',
	        'surname' 		=> 'Forse',
            'role'          => 'ADMIN',
	        'email' 		=> 'federico.forse@coffedev.com',
	        'password' 		=> bcrypt('password'),
			'tel' 			=> '1234567890',
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s')	
        ], [
            'name' 			=> 'Cara',
	        'surname' 		=> 'Levi',
            'role'          => 'USER',
	        'email' 		=> 'cara.levi@coffedev.com',
	        'password' 		=> bcrypt('password'),
			'tel' 			=> '1234567890',
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s')	
        ], [
            'name' 			=> 'Lauro',
	        'surname' 		=> 'Luna',
            'role'          => 'USER',
	        'email' 		=> 'lauro.luna@coffedev.com',
	        'password' 		=> bcrypt('password'),
			'tel' 			=> '1234567890',
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s')	
        ], [
            'name' 			=> 'Enzo',
	        'surname' 		=> 'Menso',
            'role'          => 'USER',
	        'email' 		=> 'enzo.menso@coffedev.com',
	        'password' 		=> bcrypt('password'),
			'tel' 			=> '1234567890',
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s')	
        ], [
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