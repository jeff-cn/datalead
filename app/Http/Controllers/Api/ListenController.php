<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Log;

use App\Logic\AppInitData as AppInitDataL;
use App\Logic\AppDataFilter as AppDataFilterL;

use App\Http\Requests\Api\AppInitData;

class ListenController extends Controller
{
    public function __construct() {
        $this->middleware( 'gameappid_check' );
        //接口日志记录
        Log::info( static::class .': requestUri '. \request()->fullUrl(), \request()->all() );
    }

    public function app_init( Request $request, $app_id ) {
        $req_data = $request->all();
        $valiRes = static::jsonValidate( new AppInitData, $req_data, $valiStatus );
        if( !$valiStatus ) {
            Log::debug( static::class .': valiFail', $valiRes );
            // return \response()->json( $valiRes );
            $req_data = AppDataFilterL::filterKeys( $req_data, \array_keys( $valiRes['data'] ) );
        }

        $req_data['ua'] = $request->header( 'user-agent' );
        $req_data['ip'] = $request->getClientIp( );
        if( empty( $req_data['ts'] ) ) {
            $request_time = $request->server( 'REQUEST_TIME_FLOAT' )?: time();
            $req_data['ts'] = \round( $request_time * 1000 );
        }

        $filter_data = AppDataFilterL::filter( $req_data );

        $init_id = AppInitDataL::InitId( $filter_data );
        $filter_data['init_id'] = $init_id;
        Log::debug( static::class .': init_id ' .$init_id );

        $AppInitDataL = new AppInitDataL( $app_id );
        $init_data_create_status = $AppInitDataL->create( $filter_data );

        return \response()->json( static::jsonRes( ) );
    }
}
