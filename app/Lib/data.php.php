<?php

namespace App\Lib;

use DB;

class Data {
    
    public static function getCsvData($name, $number, $club)
    {
        
        $playerInfo = DB::table('players')
                        ->select('players.name', 'players.number', 'players.club', 'players.position', 'pitchers.speed', 
                                'pitchers.control', 'pitchers.stamina', 'pitchers.breaking_ball', 'fielders.meet', 'fielders.dandou', 'fielders.power', 
                                'fielders.run', 'fielders.shoulder', 'fielders.defense', 'fielders.catch'
                        )
                        ->leftjoin('pitchers', 'players.id', '=', 'pitchers.players_id')
                        ->leftjoin('fielders', 'players.id', '=', 'fielders.players_id')
                        ->when($name, function($query) use ($name){
                            return $query->where('name', '=', $name);
                        })
                        ->when($number, function($query) use ($number){
                            return $query->where('number', '=', $number);
                        })
                        ->when($club, function($query) use ($club){
                            return $query->where('club', '=', $club);
                        })
                        ->get();
        
        return $playerInfo;
    }
}