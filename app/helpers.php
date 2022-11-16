<?php

use App\Models\Theme;
use App\Models\User;
use Jorenvh\Share\Share;
use Illuminate\Support\Facades\URL;

function responseSuccess($data)
{
    return response()->json([
        'success' => true,
        'data' => $data,
    ], 200);
}

function responseError($msg = 'Something went wrong, please try again', $code = 404)
{
    return response()->json([
        'success' => false,
        'message' => $msg,
    ], $code);
}

function flashSuccess($msg)
{
    session()->flash('success', $msg);
}

function flashError($message = 'Something went wrong, please try again')
{
    session()->flash('error', $message);
}

function avgStar($total_stars, $total_ratings)
{
    return round($total_stars / $total_ratings, 0);
}

function homePageThemes()
{
    return Theme::first()->home_page;
}

function socialMediaShareLinks(string $path, string $subject)
{
    $base_url = URL::to('/');

    return [
        'facebook' => 'https://www.facebook.com/sharer/sharer.php?u=' . $base_url . $path . $subject,
        'twitter' => 'https://twitter.com/intent/tweet?text=' . $base_url . $path . $subject,
        'linkedin' => 'https://www.linkedin.com/shareArticle?mini=true&url=' . $base_url . $path . $subject,
        'gmail' => 'https://mail.google.com/mail/u/0/?ui=2&fs=1&tf=cm&su=' . $base_url . $path . $subject,
        'whatsapp' => 'https://wa.me/?text=' . $base_url . $path . $subject
    ];
}

// function test()
// {
//     return base_url();
// }


function getStudentNameById($id)
{
    $student = User::select('firstname', 'lastname')->find($id);
    return "{$student->firstname} {$student->lastname}";
}
