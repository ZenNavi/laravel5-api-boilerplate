<?php

namespace App\Http\Controllers\Auth;

use Dingo\Api\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Specialtactics\L5Api\Http\Controllers\Features\JWTAuthenticationTrait;

class AuthController extends Controller
{
    use JWTAuthenticationTrait;

    /**
     * Get the token array structure.
     *
     * @param string $token
     * @return Response
     */
    protected function respondWithToken($token)
    {
        $tokenReponse = new \Stdclass;

        $tokenReponse->jwt = $token;
        $tokenReponse->token_type = 'bearer';
        $tokenReponse->expires_in = auth()->factory()->getTTL();
        $tokenReponse->user = auth()->user();

        return $this->response->item($tokenReponse, $this->getTransformer())->setStatusCode(200);
    }
}
