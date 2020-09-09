<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address as Address;

class AddressController extends Controller
{
    
    public function province()
    {
        $province = Address::distinct()->select('Province')->pluck('Province', 'Province');
        return $province;
    }

    public function district($province)
    {
        if (\Request::ajax())
		{
			$districts = Address::distinct()->select('Province', 'District')->where('Province', $province)->get();
			return \Response::json( $districts );
		}else{
            $districts = Address::distinct()->select('Province', 'District')->where('Province', $province)->pluck('District', 'District');
            return $districts;
        }
    }

    public function commune($province, $district)
    {
        if (\Request::ajax())
		{
			$communes = Address::distinct()->select('Commune')->where('Province', $province)->where('District', $district)->get();
			return \Response::json( $communes );
		}else{
            $communes = Address::distinct()->select('Commune')->where('Province', $province)->where('District', $district)->pluck('Commune', 'Commune');
            return $communes;
        }
    }

    public function village($province, $district, $commune)
    {
        if (\Request::ajax())
		{
			$villages = Address::distinct()->select('ID', 'Village')->where('Province', $province)->where('District', $district)->where('Commune', $commune)->get();
			return \Response::json( $villages );
		}else{
            $villages = Address::distinct()->select('ID', 'Village')->where('Province', $province)->where('District', $district)->where('Commune', $commune)->pluck('Village', 'ID');
            return $villages;
        }
    }

}
