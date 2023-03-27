<?php

namespace Cornatul\Social\Http;

use Cornatul\Social\Objects\Message;
use Cornatul\Social\Service\LinkedInService;
use Cornatul\Social\Service\TumblrService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use League\OAuth1\Client\Credentials\CredentialsException;
use League\OAuth1\Client\Server\Tumblr;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class TumblrController extends Controller
{
    private Tumblr $provider;

    private TumblrService $service;

    /**
     * @throws CredentialsException
     */
    public function __construct()
    {
        $this->provider = new Tumblr([
            'identifier' => config('social.tumblr.identifier'),
            'secret' => config('social.tumblr.secret'),
            'callback_uri' => config('social.tumblr.callback_uri'),
        ]);


    }



    public function index()
    {
        return view('social::tumblr.index');
    }

    /**
     * @throws CredentialsException
     */
    public function login(Request $request)
    {
        $credentials = $this->provider->getTemporaryCredentials();
        $request->session()->put('tumblr_temporary_credentials', $credentials);
        $this->provider->authorize($credentials);
    }

    /**
     * @todo improve this by using a provider to get the access token
     * @throws IdentityProviderException
     * @throws CredentialsException
     */
    public function callback(Request $request)
    {
        $token = $request->get('oauth_token');

        $verify= $request->get('oauth_verifier');

        $tokenCredentials = $this->provider->getTokenCredentials(
            $request->session()->get('tumblr_temporary_credentials'),
            $token,
            $verify
        );

        session()->put('tumblr_access_token', $tokenCredentials);


        return redirect()->route('social.tumblr.share');
    }



    public function share()
    {
        return view('social::tumblr.share');
    }

    /**
     * @throws NotFoundExceptionInterface
     * @throws ContainerExceptionInterface
     * @throws GuzzleException
     * @throws IdentityProviderException
     * @throws \JsonException
     */
    public function shareAction(Request $request)
    {
        $accessToken = session()->get('tumblr_access_token');

        $tumblrService = new TumblrService();

        $message = new Message();
        $message->setTitle($request->get('title'));
        $message->setBody($request->get('body'));

        $tumblrService->shareOnWall($accessToken, $message);

        return redirect(route('social.tumblr.share'))->with('success', 'Post shared successfully.');
    }

}
