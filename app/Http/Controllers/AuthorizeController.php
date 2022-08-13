<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\trello;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
//https://api.trello.com/1/members/me/?key={yourAPIKey}&token={yourAPIToken}
//https://api.trello.com/1/boards/?name={name}&key=APIKey&token=APIToken
//https://api.trello.com/1/boards/{id}?key=APIKey&token=APIToken
//https://api.trello.com/1/boards/{id}?key=APIKey&token=APIToken (update)
//https://api.trello.com/1/boards/{id}/lists?key=APIKey&token=APIToken (get lists on a board)
//https://api.trello.com/1/lists/{id}/cards?key=APIKey&token=APIToken (get list card)
//https://api.trello.com/1/lists?name={name}&idBoard=5abbe4b7ddc1b351ef961414&key=APIKey&token=APIToken
//https://api.trello.com/1/cards/{id}?key=APIKey&token=APIToken
class AuthorizeController extends Controller
{
    const BASE_API_URL='https://api.trello.com/1/';
    const ME_URL='members/me/';
    const GET_ORG='members/{id}/organizations';
   const Get_BOARDS='organizations/{id}/boards';
   const POST_BOARD= 'boards/?name=';
   const POST_BOARDs='&description=';
   const BOARD='boards/';
   const LIST ='/lists';
   const LISTS='lists/';
   const CARDS='/cards';
   const Create_List='lists?name=';
   const ID = '&idBoard=';
   const CARD = 'cards/';
    public function getUser(Request $request) {
    //    dd($request->apikey);
    //    dd($request->token);
      $response= Http::get(self::BASE_API_URL . self::ME_URL . '?key='.$request->apikey.'&token='.$request->token);
        //  dd($response->status());
        //  dd($response->body());
        if ($response->status()==200)
        {
            $cred = new trello();
        $cred->apikey = $request->apikey;
        $cred->token= $request->token;
        $userId= json_decode($response->body());
        //  dd($userId->id);
        $cred->userid = $userId->id;
        $cred->save();
        return view('trelloboard');
        }
        else {
            echo "<b>You have no access for this application</b>";
        }
    }
    //get organization ID
    public function getOrg() {

        $b= trello::all();
        // dd($b[0]->apikey);
        // dd($b[0]->token);
        //  dd($b[0]->userid);

     $url=self::BASE_API_URL . self::GET_ORG . '?key='.$b[0]->apikey.'&token='.$b[0]->token;
     $url= str_replace('{id}',$b[0]->userid,$url);
    //   dd($url);
     $response= Http::get($url);

        //  dd($response->status());
        //   dd($response->body());
        //  return json_decode($response->body());
        if($response->status()==200)
        {
            $org = new Organization();
           $idOrganizations=  json_decode($response->body());
          //  dd($idOrganizations[0]->id);
          $org->idOrganizations = $idOrganizations[0]->id;
          $org->save();
          echo "Organization ID =<br>".$idOrganizations[0]->id;
        }
        else {
            echo "<b>Something went wrong</b>";
        }

    }
      //get organization board
      public function getOrgBoard() {
        $b= trello::all();
        // dd($b[0]->apikey);
        // dd($b[0]->token);
        $org= Organization::all();
        //  dd($org);
        //  dd($org[0]->idOrganizations);

     $url=self::BASE_API_URL . self::Get_BOARDS . '?key='.$b[0]->apikey.'&token='.$b[0]->token;
     $url= str_replace('{id}',$org[0]->idOrganizations,$url);
    //   dd($url);
     $response= Http::get($url);

        //  dd($response->status());
         // dd($response->body());
        // return json_decode($response->body());
             $b=json_decode($response->body());
            //  dd($b);
       return view('allboard',compact('b'));

    }

      //create board
      public function createBoard(Request $request) {
        // dd($request);
        //  dd($request->name);
        $b= trello::all();
        // dd($b[0]->apikey);
        // dd($b[0]->token);
     $url=self::BASE_API_URL . self::POST_BOARD .$request->name .self::POST_BOARDs.$request->description.'&key='.$b[0]->apikey.'&token='.$b[0]->token;

    //   dd($url);
     $response= Http::post($url);

        //  dd($response->status());
         // dd($response->body());
        // return json_decode($response->body());
        return view('trelloboard');
    }


      // get create board
      public function getcreateBoard() {
        return view('createboard');
    }
    //delete board
     public function delete(Request $request) {
    //  dd($request);
    //   dd($request->boardId);
    $b= trello::all();
    // dd($b[0]->apikey);
    // dd($b[0]->token);
     $url=self::BASE_API_URL . self::BOARD .$request->boardId .'?key='.$b[0]->apikey.'&token='.$b[0]->token;

    //   dd($url);
     $response= Http::delete($url);

        //  dd($response->status());
         // dd($response->body());
        // return json_decode($response->body());
            return view('trelloboard');
    }
       //get  Update board
       public function getUpdateBoard(Request $request) {
            // dd($request);
    //   dd($request->boardId);
     $boardId=$request->boardId;
    // dd($request->name);
    $name=$request->name;
    // dd($request->desc);
    $desc=$request->desc;
        return view('updateboard',compact('boardId','name','desc'));
    }
    // update board
    public function updateboard(Request $request) {
      //  dd($request);
        //  dd($request->name);
        // dd($request->description);
        $b= trello::all();
        // dd($b[0]->apikey);
        // dd($b[0]->token);
     $url=self::BASE_API_URL . self::BOARD .$request->boardId.'?key='.$b[0]->apikey.'&token='.$b[0]->token;

    //   dd($url);
     $response= Http::put($url);

        //   dd($response->status());
         // dd($response->body());
        // return json_decode($response->body());
        return view('trelloboard');
    }
    //get lists
    public function getlist(Request $request) {
        //   dd($request);
        //  dd($request->name);
        // dd($request->description);
        //dd($request->boardId);
        $b= trello::all();
        // dd($b[0]->apikey);
        // dd($b[0]->token);


     $url=self::BASE_API_URL . self::BOARD. $request->boardId .self::LIST . '?key='.$b[0]->apikey.'&token='.$b[0]->token;

    //   dd($url);
     $response= Http::get($url);

        //   dd($response->status());
         // dd($response->body());
        // return json_decode($response->body());
             $list=json_decode($response->body());
            //    dd($list);
            // dd($list[0]->name);
       return view('list',compact('list'));

    }
    //get list card
    public function getlistcard(Request $request) {
        //    dd($request);
        //  dd($request->id);
        // dd($request->idBoard);
        //dd($request->name);
        $b= trello::all();
        // dd($b[0]->apikey);
        // dd($b[0]->token);


     $url=self::BASE_API_URL .self::LISTS .$request->id .self:: CARDS.'?key='.$b[0]->apikey.'&token='.$b[0]->token;

    //    dd($url);
     $response= Http::get($url);

        //    dd($response->status());
         // dd($response->body());
        // return json_decode($response->body());
             $listcard=json_decode($response->body());
                // dd($listcard);
            // dd($listcard[0]->id);
            // dd($listcard[0]->name);
       return view('viewlistcard',compact('listcard'));

    }
    //create list view page
    public function createlist(Request $request) {
          // dd($request);
           // dd($request->boardId);
           $boardId=$request->boardId;
       return view('createlist',compact('boardId'));

    }
    //create list
    public function createlists(Request $request) {
          //  dd($request);

        //  dd($request->boardId);
        //dd($request->name);
        $b= trello::all();
        // dd($b[0]->apikey);
        // dd($b[0]->token);


     $url=self::BASE_API_URL .self::Create_List .$request->name . self::ID.$request->boardId.'&key='.$b[0]->apikey.'&token='.$b[0]->token;

    //   dd($url);
     $response= Http::post($url);

        //    dd($response->status());

       return view('trelloboard');

    }
    //card info
    public function cardinfo(Request $request) {
            // dd($request);
        //  dd($request->id);

        //dd($request->name);
        $b= trello::all();
        // dd($b[0]->apikey);
        // dd($b[0]->token);


     $url=self::BASE_API_URL .self::CARD . $request->id .'?key='.$b[0]->apikey.'&token='.$b[0]->token;

    //   dd($url);
     $response= Http::get($url);

            // dd($response->status());
         // dd($response->body());
        // return json_decode($response->body());
             $listcard=json_decode($response->body());
                //  dd($listcard);
            // dd($listcard[0]->id);
            // dd($listcard[0]->name);
       return view('viewlistcard',compact('listcard'));

    }

}
