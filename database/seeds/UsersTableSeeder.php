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
		],[
            'name' 			=> 'Gianni',
	        'surname' 		=> 'Meccio',
            'role'          => 'ADMIN',
	        'email' 		=> 'gianni.meccio@coffedev.com',
	        'password' 		=> bcrypt('password'),
			'tel' 			=> '1234567890',
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s')	        
		],[
            'name' 			=> 'Giulietto',
	        'surname' 		=> 'Frate',
            'role'          => 'ADMIN',
	        'email' 		=> 'giulietto.frate@coffedev.com',
	        'password' 		=> bcrypt('password'),
			'tel' 			=> '1234567890',
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s')	        
		],[
            'name' 			=> 'Sara',
	        'surname' 		=> 'Lumino',
            'role'          => 'ADMIN',
	        'email' 		=> 'sara.lumino@coffedev.com',
	        'password' 		=> bcrypt('password'),
			'tel' 			=> '1234567890',
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s')	        
		],[
            'name' 			=> 'Rania',
	        'surname' 		=> 'Absu',
            'role'          => 'USER',
	        'email' 		=> 'rania.absu@coffedev.com',
	        'password' 		=> bcrypt('password'),
			'tel' 			=> '1234567890',
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s')	        
		],[
            'name' 			=> 'Silvio',
	        'surname' 		=> 'Serv',
            'role'          => 'USER',
	        'email' 		=> 'silvio.serv@coffedev.com',
	        'password' 		=> bcrypt('password'),
			'tel' 			=> '1234567890',
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s')	        
		],[
            'name' 			=> 'Renata',
	        'surname' 		=> 'Sata',
            'role'          => 'USER',
	        'email' 		=> 'renata.sata@coffedev.com',
	        'password' 		=> bcrypt('password'),
			'tel' 			=> '1234567890',
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s')	        
		],[
            'name' 			=> 'Paolo',
	        'surname' 		=> 'Capo',
            'role'          => 'USER',
	        'email' 		=> 'paolo.capo@coffedev.com',
	        'password' 		=> bcrypt('password'),
			'tel' 			=> '1234567890',
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s')	        
		],[
            'name' 			=> 'Jess',
	        'surname' 		=> 'Met',
            'role'          => 'USER',
	        'email' 		=> 'jess.met@coffedev.com',
	        'password' 		=> bcrypt('password'),
			'tel' 			=> '1234567890',
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s')	        
		],[
            'name' 			=> 'Hal',
	        'surname' 		=> 'Dei',
            'role'          => 'USER',
	        'email' 		=> 'hal.dei@coffedev.com',
	        'password' 		=> bcrypt('password'),
			'tel' 			=> '1234567890',
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s')	        
		],[
            'name' 			=> 'Flavio',
	        'surname' 		=> 'Dote',
            'role'          => 'USER',
	        'email' 		=> 'flavio.dote@coffedev.com',
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
            'role'          => 'USER',
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