<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* Route Create Default link url access 
 * author : Hekky Nurhikmat
 * Version : 1.0.1
 */



// default sistem administrator sysadmin.pasteurtrans.co.id


	$route['default_controller'] 									= "menu/home_operasional";
	$route['404_override'] 											= 'back_handler';
	$route['translate_uri_dashes'] 									= FALSE;
	$route['home'] 													= 'menu/home_index';

	//authentikasi
	$route['auth'] 													= 'auth/login';
	$route['login'] 												= 'auth/login';
	$route['autentikasi']											= 'auth/login/autentikasi';
	$route['logout'] 												= 'auth/logout';

	// user
	$route['user/profile/edit'] 									= 'user/profile_edit';
	$route['user/profile/akses'] 									= 'user/password_change_view';
	$route['user/profile/akses/edit'] 								= 'user/password_change';

	// pengaturan
	$route['pengaturan'] 											= 'menu/home_pengaturan';

	// customers
	$route['customers'] 											= 'menu/home_customer';
	$route['customers/all_customer'] 								= 'customer';
	$route['customers/member'] 										= 'member';


	// Operasional
	$route['operasional'] 											= 'menu/home_operasional';
	$route['operasional/reservasi'] 								= 'reservasi_shuttle'; //module reservasi shuttle
	$route['operasional/reservasi_paket'] 							= 'reservasi_cargo'; //module reservasi shuttle
	$route['operasional/reservasi_carter']							= "reservasi_carter"; // module reservasi_carter
	$route['operasional/reservasi_barbershop']						= "reservasi_barbershop"; // module reservasi_carter

	$route['operasional/pencarian_nomor'] 							= "menu/home_pencarian_nomor";
	$route['operasional/pencarian_nomor_tiket'] 					= "pencarian_nomor_tiket";
	$route['operasional/pencarian_nomor_resi'] 		  				= "pencarian_nomor_resi";
	$route['operasional/online']									= "online";
	$route['operasional/pengumuman']								= "pengumuman/pengumuman";
	$route['operasional/pengumuman_pesan']							= "pengumuman/pengumuman_pesan";
	$route['operasional/penjadwalan_kendaraan']						= "penjadwalan_kendaraan";
	$route['operasional/discount']									= "discount";
	$route['operasional/pembatalan']								= "laporan_pembatalan";
	$route['operasional/pembatalan/tiket']							= "pembatalan_tiket";
	$route['operasional/manifest'] 									= "manifest";
	$route['operasional_manifest'] 									= "manifest/operasional_manifest";
	$route['operasional/promo']  									= "promo";
	
	// barbershop
	$route['barbershop'] 											=  'menu/home_barbershop';
	$route['barbershop/pegawai'] 									=  'barbershop_pegawai';
	$route['barbershop/layanan'] 									=  'barbershop_service';

	// Cargo
	$route['cargo'] 												=  'cargo/home_cargo';

	// sales
	$route['sales'] 												= "menu/home_sales";


	// keuangan
	$route['keuangan'] 												= 'keuangan/home_keuangan';

	// shuttle
	$route['shuttle'] 												=  'shuttle/home_shuttle';


	//charter
	$route['charter'] 												= 'charter/home_charter';
	//sms_gateway
	$route['sms_gateway'] 											= 'sms_gateway/home_sms_gateway';



