<?php

namespace Bulkly\Http\Controllers;

use Bulkly\BufferPosting;
use Bulkly\SocialPostGroups;
use Illuminate\Http\Request;

class BufferPostingController extends Controller
{
    //

    public function index(){
//        dd("INDEX");
        $bufferPosting = BufferPosting::paginate(10);
        $groupTypes = SocialPostGroups::select('type')->distinct('type')->get();
        //dd($groupTypes);
        return view('pages.bufferPosting',compact('bufferPosting','groupTypes'));
    }

    public function searchPosts(Request $request){
//        dd($request->all());

        $groupTypes = SocialPostGroups::select('type')->distinct('type')->get();

        $date = strtotime($request->searchDate);
//        dd(date('Y-m-d',$date));
        $bufferPosting = BufferPosting::Join('social_post_groups','buffer_postings.group_id','social_post_groups.id')
            ->where([
                ['social_post_groups.type','=',$request->searchGroup],
                ['buffer_postings.post_text','like',$request->searchText.'%']
            ])
            ->whereDate('buffer_postings.created_at',$request->searchDate)->paginate(10);

        //dd($bufferPosting);
        //dd($data->count());
        if($bufferPosting->count()<=0){
            return redirect()->back()->with('error','No Results Found');
        }else {
            return view('pages.bufferPosting',compact('bufferPosting','groupTypes'));
        }
    }
}
