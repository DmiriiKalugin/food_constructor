<?php

namespace App\Http\Controllers\FoodConstructorControllers;

use App\FoodConstructor\FoodConstructor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *    title="FoodConstructor  ApplicationAPI",
 *    version="1.0.0",
 * )
 */
class FoodConstructorController extends Controller
{
    /**
     * @OA\Post(
     * path="/api/create_a_dish/",
     * operationId="Create_a_dish",
     * tags={"Create_a_dish"},
     * summary="Получение состава блюда",
     * description="Получение состава блюда",
     *  @OA\Parameter(
     *      name="code",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent()
     *       ),
     * )
     */

    public function create_a_dish(Request $request){
        $data = $request->all();

        $code = $data['code'];

        return response()->json(FoodConstructor::food_constructor($code), 200);
    }
}
