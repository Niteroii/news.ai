<?php
declare(strict_types=1);

namespace Cornatul\Social\Http;
use Illuminate\Routing\Controller;
class SocialController extends Controller
{
    public function index()
    {
        return view('social::index');
    }
}
