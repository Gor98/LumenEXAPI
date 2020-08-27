<?php

namespace App\Common\Bases;

use Illuminate\Contracts\Auth\Access\Gate;
use Laravel\Lumen\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response;

abstract class Controller extends BaseController
{

    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="Truescape API Demo Documentation",
     *      description="L5 Swagger OpenApi description",
     *      @OA\Contact(
     *          email="admin@admin.com"
     *      ),
     *      @OA\License(
     *          name="Apache 2.0",
     *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
     *      )
     * )
     *
     * @OA\Server(
     *      url=L5_SWAGGER_CONST_HOST,
     *      description="Demo API Server"
     * )
     *
     * Authorize a given action for the current user.
     * @OA\SecurityScheme(
     *      securityScheme="bearerAuth",
     *      in="header",
     *      name="bearerToken",
     *      type="http",
     *      scheme="bearer",
     *      bearerFormat="JWT",
     * ),
     *
     * @param mixed $ability
     * @param mixed|array $arguments
     */
    public final function authorizeApi(string $ability, array $arguments = []): void
    {
        if (!app(Gate::class)
                ->forUser(request()->user())
                ->check($ability, $arguments)
        ) {
            abort(Response::HTTP_FORBIDDEN, 'This action is unauthorized.');
        }
    }
}
