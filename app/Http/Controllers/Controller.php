<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\MessageBag;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * 返回操作错误
     *
     * @param string $error
     * @return void
     */
    static public function backError( $error ) {
        return back()->withErrors( static::dealError($error) );
    }

    static public function dealError( $error ) {
        return [ 'deal_error' => $error ];
    }
    
    static public function jsonRes( $code = 0, $message = null, $data = [], $merge = true ) {
        if( \is_null( $message ) ) $message = $code == 0? "SUCCESS": "FAIL";
        $base = [ 'code' => $code, 'message' => $message ];
        $res = [];
        
        if( $data ) {
            $merge? $res = \array_merge( $base, $data ): $res['data'] = $data;
        }

        return $res;
    }

    static public function jsonValidate() {
        
    }
}
