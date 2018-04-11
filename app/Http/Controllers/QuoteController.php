<?php

namespace App\Http\Controllers;

use App\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller{



    /**
     * @param Request $request
     */
    public function postQuote(Request $request){
        $quote = new Quote();
        $quote->content = $request->input('content');
        $quote->save();
        return response()->json(['qutoe' => $quote], 201);
    }

    /**
     *
     */
    public function getQuotes(){
        $quots = Quote::all();
       $response = [
            'quotes' => $quots
        ];
       return response()->json($response,200);
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function putQuote(Request $request, $id){
        $quote = Quote::find($id);
        if(!$quote){
            return response()->json(['message'=>'Document not found'], 400);

        }
        $quote->content = $request->input('content');
        $quote->save();
        return response()->json(['quote' => $quote], 200);
    }

    /**
     * @param $id
     */
    public function deleteQuote($id){
        $quote = Quote::find($id);
        $quote->delete();
        return response()->json(['message' => 'Deleted'],200);
        
    }



}