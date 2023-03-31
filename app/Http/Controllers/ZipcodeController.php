<?php

namespace App\Http\Controllers;

use App\Http\Resources\ZipcodeResource;
use Core\ZipCodeApi\Infrastructure\GetZipcodeController;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use InvalidArgumentException;

class ZipcodeController extends Controller
{
    /**
     * @var GetZipcodeController
     */
    private GetZipcodeController $getZipcodeController;

    /**
     * @param GetZipcodeController $getZipcodeController
     */
    public function __construct(GetZipcodeController $getZipcodeController)
    {
        $this->getZipcodeController = $getZipcodeController;
    }

    /**
     * @param Request $request
     * @return ZipcodeResource|JsonResponse
     */
    public function zipcode(Request $request) {
        try {
            return new ZipcodeResource($this->getZipcodeController->zipcode($request));
        } catch (InvalidArgumentException $e) {
            return response()->json([
                "zip_code" => $request->zipcode,
                "message" => $e->getMessage()
            ], 404);
        }
        catch (Exception $e) {
            return response()->json([
                "zip_code" => $request->zipcode,
                "message" => $e->getMessage()
            ], 500);
        }
    }
}
