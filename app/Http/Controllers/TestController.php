<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class TestController extends Controller
    {
        public function getMethod(): \Illuminate\Http\JsonResponse
        {
            return response()->json(['susses' => 'Méthode GET']);
        }

        public function testPost(Request $request): array
        {
            return $request->all();
        }
    }
