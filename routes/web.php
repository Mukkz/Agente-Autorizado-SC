<?php


Auth::routes();

Route::get('/teste', ['as'=>'teste', 'uses' => 'HomeController@teste']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
    Route::post('/cadastrar', ['as' => 'cadastrar', 'uses' => 'PreventivaController@cadastrarPreventiva']);
    Route::get('/listar', ['as' => 'listar', 'uses' => 'HomeController@listar']);
    Route::get('/listar/search', ['as' => 'search', 'uses' => 'HomeController@pesquisaPreventiva']);
    Route::get('/listar/searchADM', ['as' => 'searchADM', 'uses' => 'HomeController@pesquisaPreventivaADM'])->middleware(\App\Http\Middleware\isAdmin::class);
    Route::get('/fechar/{id}', ['as' => 'fechar', 'uses' => 'HomeController@fechar']);
    Route::post('/fechar/{id}', ['as' => 'realizarFechamento', 'uses' => 'HomeController@realizarFechamento']);
    Route::get('/abrir/{id}', ['as' => 'realizarAbertura', 'uses' => 'HomeController@realizarAbertura']);
    Route::get('/logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);
    Route::get('/export', ['as'=>'export', 'uses'=> 'PreventivaController@export'])->middleware(\App\Http\Middleware\isAdmin::class);
    Route::get('/listarADM', ['as' => 'listarADM', 'uses' => 'HomeController@listarADM'])->middleware(\App\Http\Middleware\isAdmin::class);
    Route::get('/listarAbertos', ['as' => 'listarAbertos', 'uses' => 'HomeController@listarAbertos'])->middleware(\App\Http\Middleware\isAdmin::class);
    
    Route::get('/listarPendentes', ['as' => 'listarPendentes', 'uses' => 'HomeController@listarPendentes'])->middleware(\App\Http\Middleware\isAdmin::class);
    Route::get('/editar/aa/{id}', ['as' => 'editarInfo', 'uses' => 'HomeController@editarInfo']);
    Route::post('/editar/aaa/{id}', ['as' => 'editarAA', 'uses' => 'HomeController@editarAA']);

    Route::get('/trocaSenha', ['as' => 'trocaSenha', 'uses' => 'HomeController@trocaSenha']);
    Route::post('/trocaSenha/alterar', ['as' => 'confirmaTrocaSenha', 'uses' => 'HomeController@confirmaTrocaSenha']);

});
