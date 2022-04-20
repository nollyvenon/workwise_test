<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class ApiController extends Controller
{
    
      public function getAllCandidates() {
        //Get all Candidate goes here
        

      }
  
      public function createCandidate(Request $request) {
        //create a Candidate record goes here
        $request->validate([
            'name' => 'required|unique:posts|max:255',
            'email' => 'required|max:200',
            'phone' => 'required|max:70',
        ]);
        Candidate::create($request->all());
        return response()->json([
            "message" => "Candidate record created"
        ], 201);
      }
  
      public function getCandidate($id) {
        //get a Candidate record goes here
        return response(Candidate::find($id),200);

      }
  
      public function searchCandidate(Request $request, $id) {
        //Read All Candidates that applied
        
      }
   

      
      
      //Get a particular candidate's detail
      //Search/filter of the candidates based on certain selected criteria 
      //Search via location
      //Search via selected skill sets
    
}
