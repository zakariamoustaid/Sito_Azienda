<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([[
            'ragione_sociale'   => 'Koka SPA',
	        'name_ref' 		    => 'Rosaria',
            'surname_ref'       => 'Mito',
	        'email_ref' 	    => 'mitorosaria@koka.it',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')      
		], [
            'ragione_sociale'   => 'Rolq SRL',
	        'name_ref' 		    => 'Marco',
            'surname_ref'       => 'Lumi',
	        'email_ref' 	    => 'lumi44@rolq.com',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')    
		], [
            'ragione_sociale'   => 'Magia SRL',
	        'name_ref' 		    => 'Gianna',
            'surname_ref'       => 'Lillini',
	        'email_ref' 	    => 'lillinigianna@magia.it',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')    
        ], [
            'ragione_sociale'   => 'Pontix SRL',
	        'name_ref' 		    => 'Teresa',
            'surname_ref'       => 'Mai',
	        'email_ref' 	    => 'maiteresa@pontix.it',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')    
        ], [
            'ragione_sociale'   => 'Furse SPA',
	        'name_ref' 		    => 'Rossana',
            'surname_ref'       => 'Vesti',
	        'email_ref' 	    => 'rossanave@furse.it',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')    
        ],  [
            'ragione_sociale'   => 'Morsi snc',
	        'name_ref' 		    => 'Massimo',
            'surname_ref'       => 'Mini',
	        'email_ref' 	    => 'massimom@morsi.it',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')    
        ],  [
            'ragione_sociale'   => 'Jexi SRL',
	        'name_ref' 		    => 'Doria',
            'surname_ref'       => 'Losca',
	        'email_ref' 	    => 'loscado@jexi.it',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')    
        ],  [
            'ragione_sociale'   => 'Tronchi SRL',
	        'name_ref' 		    => 'Giorgio',
            'surname_ref'       => 'Merende',
	        'email_ref' 	    => 'giorgiomerende@tronchi.it',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')    
        ], [
            'ragione_sociale'   => 'Lisp SPA',
	        'name_ref' 		    => 'Walter',
            'surname_ref'       => 'Uait',
	        'email_ref' 	    => 'uait77@lisp.com',
	        'updated_at' 	    => date('Y-m-d h:i:s'),
			'created_at' 	    => date('Y-m-d h:i:s')
        ]]);
    }
}
