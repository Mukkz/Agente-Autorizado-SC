<?php


Auth::routes();
Route::get('/teste', ['as'=>'teste', 'uses' => 'HomeController@teste']);
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@escolha']);

Route::group(['middleware' => 'auth'], function () {

    // Route::get('/escolha', ['as'=>'escolha', 'uses' => 'HomeController@escolha']);

    Route::group(['prefix' => 'TT'], function () {

        Route::get('/solicitacao', ['as' => 'home', 'uses' => 'HomeController@index']);
        Route::post('/cadastrar', ['as' => 'cadastrar', 'uses' => 'PreventivaController@cadastrarPreventiva']);
        Route::get('/listar', ['as' => 'listar', 'uses' => 'HomeController@listar']);
        Route::get('/listar/search', ['as' => 'search', 'uses' => 'HomeController@pesquisaPreventiva']);
        Route::get('/listar/searchADM', ['as' => 'searchADM', 'uses' => 'HomeController@pesquisaPreventivaADM'])->middleware(\App\Http\Middleware\isAdmin::class);
        Route::get('/fechar/{id}', ['as' => 'fechar', 'uses' => 'HomeController@fechar']);
        Route::post('/fechar/{id}', ['as' => 'realizarFechamento', 'uses' => 'HomeController@realizarFechamento']);
        Route::get('/abrir/{id}', ['as' => 'realizarAbertura', 'uses' => 'HomeController@realizarAbertura']);
        Route::get('/export', ['as'=>'export', 'uses'=> 'PreventivaController@export'])->middleware(\App\Http\Middleware\isAdmin::class);
        Route::get('/listarAbertos', ['as' => 'listarAbertos', 'uses' => 'HomeController@listarAbertos'])->middleware(\App\Http\Middleware\isAdmin::class);
        Route::get('/listarPendentes', ['as' => 'listarPendentes', 'uses' => 'HomeController@listarPendentes'])->middleware(\App\Http\Middleware\isAdmin::class);
        Route::get('/editar/aa/{id}', ['as' => 'editarInfo', 'uses' => 'HomeController@editarInfo']);
        Route::post('/editar/aaa/{id}', ['as' => 'editarAA', 'uses' => 'HomeController@editarAA']);
        
    });

    Route::group(['prefix' => 'BA'], function () {
        Route::get('/solicitacao', ['as' => 'homeBA', 'uses' => 'BaController@solicitacao']);
        Route::get('/lista', 'BaController@listaPriori')->name('listaBA');
        Route::post('/registra', 'BaController@cadastrarBa')->name('registrar');
        Route::get('/abrir/{id}', 'BaController@alteraStatus')->name('alteraStatus');
        Route::get('/fechar/{id}', 'BaController@fecharStatus')->name('fechar');
        Route::post('/fechar/{id}', 'BaController@realizarFechamento')->name('realizarFechamento');
        Route::get('/exportba', ['as'=>'exportBA', 'uses'=> 'BaController@export']);
    });

    Route::get('/logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);
    Route::get('/trocaSenha', ['as' => 'trocaSenha', 'uses' => 'HomeController@trocaSenha']);
    Route::post('/trocaSenha/alterar', ['as' => 'confirmaTrocaSenha', 'uses' => 'HomeController@confirmaTrocaSenha']);
});
