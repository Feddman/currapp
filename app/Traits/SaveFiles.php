<?php
namespace App\Traits;
use Illuminate\Support\Facades\Storage;

trait SaveFiles{

	public function save_files($request, $review)
    {
        //build general filename
        $filename = date('Ymd');
        $filename .= '_' . $review->lesson->lesson_type->title;
        $filename .= '_' . $review->lesson->lesson_type->term->title;
        $filename .= '_' . $review->lesson->week_start;
        $filename .= '_' . $review->lesson->getFileName();
        
        //save wv
        if($request->hasFile('wv_file'))
        {
            $wv_ext = request()->wv_file->getClientOriginalExtension();
            $review->wv_filename = $filename . '.' . $wv_ext;
            $wv_do = 'review_' . $review->id . '_wv.' . $wv_ext;
            $review->wv_do_path = Storage::disk('spaces')->putFileAs('uploads/reviews', request()->wv_file, $wv_do, 'private');
        }

        //save tv
        if($request->hasFile('tv_file'))
        {
            $tv_ext = request()->tv_file->getClientOriginalExtension();
            $review->tv_filename = $filename . '_TV.' . $tv_ext;
            $tv_do = 'review_' . $review->id . '_tv.' . $tv_ext;
            $review->tv_do_path = Storage::disk('spaces')->putFileAs('uploads/reviews', request()->tv_file, $tv_do, 'private');
        }

        //save sv
        if($request->hasFile('sv_file'))
        {
            $sv_ext = request()->sv_file->getClientOriginalExtension();
            $review->sv_filename = $filename . '_SV.' . $sv_ext;
            $sv_do = 'review_' . $review->id . '_sv.' . $sv_ext;
            $review->sv_do_path = Storage::disk('spaces')->putFileAs('uploads/reviews', request()->sv_file, $sv_do, 'private');
        }
        
        $review->save();
    }

}