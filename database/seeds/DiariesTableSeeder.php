<?php

use Illuminate\Database\Seeder;

class DiariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('diaries')->insert([[
            'today'             => date('2021-6-01 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '3',
	        'project_id' 	    => '1',
            'user_id'           => '5',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-5-15 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '4',
	        'project_id' 	    => '2',
            'user_id'           => '6',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-6-01 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '2',
	        'project_id' 	    => '3',
            'user_id'           => '7',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-5-15 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '1',
	        'project_id' 	    => '4',
            'user_id'           => '8',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-6-03 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '6',
	        'project_id' 	    => '5',
            'user_id'           => '9',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-6-04 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '5',
	        'project_id' 	    => '6',
            'user_id'           => '10',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-6-01 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '3',
	        'project_id' 	    => '7',
            'user_id'           => '11',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-5-16 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '7',
	        'project_id' 	    => '8',
            'user_id'           => '12',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-5-16 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '4',
	        'project_id' 	    => '9',
            'user_id'           => '13',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-5-16 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '6',
	        'project_id' 	    => '10',
            'user_id'           => '14',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-5-16 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '6',
	        'project_id' 	    => '8',
            'user_id'           => '15',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-5-15 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '3',
	        'project_id' 	    => '9',
            'user_id'           => '16',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-5-15 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '1',
	        'project_id' 	    => '10',
            'user_id'           => '17',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-5-15 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '1',
	        'project_id' 	    => '10',
            'user_id'           => '18',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-5-15 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '3',
	        'project_id' 	    => '1',
            'user_id'           => '19',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-5-16 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '3',
	        'project_id' 	    => '2',
            'user_id'           => '5',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-5-16 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '7',
	        'project_id' 	    => '3',
            'user_id'           => '6',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-5-17 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '8',
	        'project_id' 	    => '4',
            'user_id'           => '7',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-5-17 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '1',
	        'project_id' 	    => '5',
            'user_id'           => '8',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-5-17 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '2',
	        'project_id' 	    => '6',
            'user_id'           => '9',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-5-17 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '2',
	        'project_id' 	    => '7',
            'user_id'           => '10',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-5-15 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '3',
	        'project_id' 	    => '6',
            'user_id'           => '11',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-5-15 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '5',
	        'project_id' 	    => '5',
            'user_id'           => '12',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'today'             => date('2021-5-15 12:50:20'),
	        'notes' 		    => '',
            'hours'             => '5',
	        'project_id' 	    => '4',
            'user_id'           => '13',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
        ]]);
    }
}
