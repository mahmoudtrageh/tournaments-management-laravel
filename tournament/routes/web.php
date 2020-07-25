<?php

/* Site Routes */

Auth::routes();

Route::group(['namespace' => 'Site'], function () {

    Route::get('', 'IndexController@index')->name('site-index');
    Route::post('/send-message', 'IndexController@sendMessage')->name('send-message');
    Route::post('/add-team-index', 'IndexController@addTeam')->name('add-team-index');
    Route::get('/site-login/{id}', 'IndexController@siteLogin')->name('site-login');
    
     Route::get('/site-login-second', 'IndexController@siteLoginSecond')->name('site-login-second');
    
    
    Route::get('/team-register/{id}', 'IndexController@teamRegister')->name('team-register');
    
    Route::post('/get-max-index', 'IndexController@getMax')->name('get-max');

    
     Route::get('/team-register-second', 'IndexController@teamRegisterSecond')->name('team-register-second');
    
    Route::get('/player-register', 'IndexController@playerRegister')->name('player-register');
    Route::get('/player-login', 'IndexController@playerLogin')->name('player-login');

    Route::post('/add-player-index', 'IndexController@addPlayer')->name('add-player-index');
        Route::post('/add-x-player', 'IndexController@addXPlayer')->name('add-x-player');

    Route::post('/check-team-index', 'IndexController@checkTeam')->name('check-team-index');
    Route::post('/check-group-index', 'IndexController@checkGroup')->name('check-group-index');
    Route::post('/expire-update-status-index', 'IndexController@updateStatusExpire')->name('expire-update-status-index');
    

    Route::get('/forget', 'AuthController@forget')->name('site-forget');
    Route::post('/check-email', 'AuthController@check')->name('site-check');
    Route::get('/code', 'AuthController@code')->name('site.code');
    Route::post('/code-confirmation', 'AuthController@code_confirmation')->name('code.confirmation');
    Route::post('/pass-change', 'AuthController@pass_change')->name('site.pass.change');
            Route::post('/team-register-live', 'IndexController@teamRegisterLive')->name('team-register-live');

    
});

// admin

Route::group(['namespace' => 'Admin'], function () {
    

    Route::get('/login', 'AuthController@index')->name('get.login');
        Route::get('/login/{id}', 'AuthController@indexDash')->name('get.login.dash');

    Route::post('/login', 'AuthController@login')->name('post.login');
        Route::post('/login-dash/{id}', 'AuthController@loginDash')->name('post.login.dash');

    Route::get('/logout', 'AuthController@logout')->name('logout');
    
        Route::get('/logout-site', 'AuthController@logoutSite')->name('logout-site');

   

    Route::group(['middleware' => 'admin'], function () {

        Route::get('/dashboard', 'IndexController@index')->name('dashboard-index');
                Route::get('/dashboard-dash/{id}', 'IndexController@indexDash')->name('dashboard-index-dash');

                Route::post('/get-season', 'IndexController@getSeason')->name('get.season');

        Route::get('dashboard/admins', 'AdminController@admins')->name('admins');
        Route::post('dashboard/add-admin', 'AdminController@add')->name('add-admin');
        Route::post('dashboard/edit-admin', 'AdminController@edit')->name('edit-admin');
        Route::post('dashboard/delete-admin', 'AdminController@delete')->name('delete-admin');
                Route::get('/admin-info/{id}', 'AdminController@adminInfo')->name('admin-info');

    
    

        Route::get('dashboard/tournaments/{id}', 'TournamentsController@index')->name('tournaments');
        Route::get('dashboard/all-tournaments', 'TournamentsController@indexAll')->name('all-tournaments');
        Route::get('dashboard/season-tournaments/{id}', 'TournamentsController@seasonTournaments')->name('season-tournaments');
        Route::get('dashboard/union-tournaments/{id}', 'TournamentsController@unionTournaments')->name('union-tournaments');
        Route::post('/add-tournament', 'TournamentsController@addTournament')->name('add-tournament');
        Route::post('/edit-tournament', 'TournamentsController@editTournament')->name('edit-tournament');
        Route::post('/delete-tournament', 'TournamentsController@deleteTournament')->name('delete-tournament');
        Route::post('/tournament-update-status', 'TournamentsController@updateStatus')->name('tournament-update-status');
                        Route::get('tournament-filter','TournamentsController@filter')->name('tournament.filter');

        Route::get('dashboard/news', 'NewsController@index')->name('news');
        Route::post('/add-new', 'NewsController@addNew')->name('add-new');
        Route::post('/edit-new', 'NewsController@editNew')->name('edit-new');
        Route::post('/delete-new', 'NewsController@deleteNew')->name('delete-new');
        Route::post('/new-update-status', 'NewsController@updateStatus')->name('new-update-status');


         Route::get('dashboard/punishments', 'PunishmentsController@index')->name('punishments');
        Route::post('/add-punishment', 'PunishmentsController@addPunishment')->name('add-punishment');
        Route::post('/edit-punishment', 'PunishmentsController@editPunishment')->name('edit-punishment');
        Route::post('/delete-punishment', 'PunishmentsController@deletePunishment')->name('delete-punishment');

        Route::get('dashboard/seasons', 'SeasonsController@index')->name('seasons');
        Route::post('/add-season', 'SeasonsController@addSeason')->name('add-season');
        Route::post('/edit-season', 'SeasonsController@editSeason')->name('edit-season');
        Route::post('/delete-season', 'SeasonsController@deleteSeason')->name('delete-season');
        Route::post('/season-update-status', 'SeasonsController@updateStatus')->name('season-update-status');

        Route::get('dashboard/unions', 'UnionController@index')->name('unions');
        Route::post('/add-union', 'UnionController@addUnion')->name('add-union');
        Route::post('/edit-union', 'UnionController@editUnion')->name('edit-union');
        Route::post('/delete-union', 'UnionController@deleteUnion')->name('delete-union');

        Route::get('dashboard/teams/{id}', 'TeamController@index')->name('teams');
                Route::get('dashboard/all-teams', 'TeamController@allTeams')->name('all-teams');

        Route::post('/add-team', 'TeamController@addTeam')->name('add-team');
                Route::post('/add-team-inner', 'TeamController@addTeamInner')->name('add-team-inner');
        Route::post('/edit-team', 'TeamController@editTeam')->name('edit-team');
        Route::post('/delete-team', 'TeamController@deleteTeam')->name('delete-team');
        Route::post('/team-update-status', 'TeamController@updateStatus')->name('team-update-status');
        Route::get('dashboard/union-teams/{id}', 'TeamController@unionTeams')->name('union-teams');
        Route::get('dashboard/season-teams/{id}', 'TeamController@seasonTeams')->name('season-teams');
                        Route::get('team-filter','TeamController@filter')->name('team.filter');
                Route::post('/get-max', 'TeamController@getMax')->name('get.max');

                Route::post('/change-image', 'TeamController@changeImg')->name('change-image');
                
Route::post('/change-image-tournament', 'TournamentsController@changeImg')->name('change-image-tournament');

        Route::get('dashboard/groups/{id}', 'GroupController@index')->name('groups');
        Route::post('/add-group', 'GroupController@addGroup')->name('add-group');
        Route::post('/edit-group', 'GroupController@editGroup')->name('edit-group');
        Route::post('/delete-group', 'GroupController@deleteGroup')->name('delete-group');

        Route::get('dashboard/players/{id}', 'PlayersController@index')->name('players');
                Route::get('dashboard/players-all', 'PlayersController@indexAll')->name('players-all');
                                Route::get('dashboard/tour-players', 'PlayersController@tourPlayer')->name('tour-players');

        Route::post('/add-player', 'PlayersController@addPlayer')->name('add-player');
        Route::post('/edit-player', 'PlayersController@editPlayer')->name('edit-player');
        Route::post('/delete-player', 'PlayersController@deletePlayer')->name('delete-player');
                Route::get('/player-history/{id}', 'PlayersController@playerHistory')->name('player-history');

         Route::post('/edit-specific-player', 'PlayersController@editSpecificPlayer')->name('edit-specific-player');
        Route::post('/delete-specific-player', 'PlayersController@deleteSpecificPlayer')->name('delete-specific-player');
        
        Route::post('/check-team', 'PlayersController@checkTeam')->name('check-team');
        Route::post('/check-group', 'PlayersController@checkGroup')->name('check-group');
        Route::post('/check-team-edit', 'PlayersController@checkTeamEdit')->name('check-team-edit');
        Route::post('/check-team-edit-sp', 'PlayersController@checkTeamEditSp')->name('check-team-edit-sp');
        Route::post('/check-group-edit', 'PlayersController@checkGroupEdit')->name('check-group-edit');
        Route::post('/check-group-edit-sp', 'PlayersController@checkGroupEditSp')->name('check-group-edit-sp');
        Route::post('/player-update-status', 'PlayersController@updateStatus')->name('player-update-status');
        Route::post('/expire-update-status', 'PlayersController@updateStatusExpire')->name('expire-update-status');
                
                        Route::get('player-filter','PlayersController@filter')->name('player.filter');

        Route::post('/get-team', 'TeamActivityController@getTeam')->name('admin.get.team');
        Route::post('/get-tournament', 'TeamActivityController@getTournament')->name('admin.get.tournament');
        Route::post('/get-group', 'TeamActivityController@getGroup')->name('admin.get.group');


        Route::post('get-notifications', 'NotificationsController@get_notifications')->name('get.notifications');
        Route::get('notifications', 'NotificationsController@notifications')->name('notifications');
        Route::post('delete-notification', 'NotificationsController@deleteNotification')->name('delete.notification');

        Route::post('read', 'NotificationsController@read')->name('read.notifications');


        Route::get('dashboard/settings', 'SettingController@index')->name('settings');
        Route::post('/edit-details', 'SettingController@editDetails')->name('edit-details');

    });

});