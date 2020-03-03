<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

#=================== Page accueil ==================
Route::get('/','PageHomeController@index')->name('page.index');

// Route::get('/', function () {
//     return view('welcome');
// });

#============== L'urls connexion and inscription client=====================
Route::get('/client/connexion','ConnexionController@pageConnexionClient')
	->name('page.connexion');

Route::get('/client/inscription','InscriptionController@pageInscriptionClient')
	->name('page.inscription');

Route::get('/client/deconnexion','ConnexionController@deconnexion')->name('page.deconnexion');


#============== L'urls connexion and inscription Boutique=====================
Route::get('/boutique/connexion','ConnexionController@pageConnexionBoutique')
	->name('page.connexion.boutique');

Route::get('/boutique/inscription','InscriptionController@pageInscriptionBoutique')
	->name('page.inscription.boutique');

Route::get('/boutique/deconnexion','ConnexionController@deconnexionBoutique')->name('page.deconnexion.boutique');
#===========================================================================

#============== L'urls connexion and inscription Admin=====================
Route::get('/admin/connexion','ConnexionController@pageConnexionAdmin')
	->name('page.connexion.admin');

Route::get('/admin/inscription','InscriptionController@pageInscriptionAdmin')
	->name('page.inscription.admin');

Route::get('/admin/deconnexion','ConnexionController@deconnexionAdmin')->name('page.deconnexion.admin');
#===========================================================================


#============== L'urls connexion and inscription atelier=====================
Route::get('/atelier/connexion','ConnexionController@pageConnexionAtelier')
	->name('page.connexion.atelier');

Route::get('/atelier/inscription','InscriptionController@pageInscriptionAtelier')
	->name('page.inscription.atelier');

Route::get('/atelier/deconnexion','ConnexionController@deconnexionAtelier')->name('page.deconnexion.atelier');
#==========================================================================

#============Les actions (Connexion && Inscription client)================
Route::post('/client/connexion','ConnexionController@connexionClient')->name('connexion');
Route::post('/client/inscription','InscriptionController@inscriptionCleint')->name('inscription');
#==========================================================================

#============Les actions (Connexion && Inscription boutique)================
Route::post('/boutique/connexion','ConnexionController@connexionBoutique')->name('connexion.boutique');
Route::post('/boutique/inscription','InscriptionController@inscriptionBoutique')->name('inscription.boutique');
#==========================================================================

#==========Les actions (Connexion && Inscription atelier)================
Route::post('/atelier/connexion','ConnexionController@connexionAtelier')->name('connexion.atelier');
Route::post('/atelier/inscription','InscriptionController@inscriptionAtelier')->name('inscription.atelier');
#==========================================================================

#==========Les actions (Connexion && Inscription atelier)================
Route::post('/admin/connexion','ConnexionController@connexionAdmin')->name('connexion.admin');
Route::post('/admin/inscription','InscriptionController@inscriptionAdmin')->name('inscription.admin');

#========================Compte============================================
Route::get('/compte','CompteController@pageCompte')->name('page.compte');

#======= les page: Boutique, Atelier, Admin=================================
Route::get('/boutique','BoutiqueController@pageBoutique')->name('page.boutique');
Route::get('/atelier','AtelierController@pageAtelier')->name('page.atelier');
Route::get('/admin','AdminController@pageAdmin')->name('page.admin');


#=================mot de passe oublié========================================
Route::get('/mot-de-passe-oublié','MotDePasseOublier@form')->name('forgot.form');
Route::post('/mot-de-passe-oublié','MotDePasseOublier@formAction')->name('forgot.action');

#========================== Modification des infos du client ================

Route::post('/modifier','CompteController@modifier')->name('client.modifier');

#============================================================================


Route::get('/dao', function () {
	$tb=[
	'lun',
	'mar',
	'mercre',
	'jeu',
	'ven',
	'sam',
	'dim'
];
    return view('pages/dao', compact('tb'));
});
Route::get('/connexion', function () {
    return view('pages/connexion');
});

