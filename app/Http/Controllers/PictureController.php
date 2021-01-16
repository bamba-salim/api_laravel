<?php

    namespace App\Http\Controllers;

    use App\Http\FormValidation\PictureFormValidation;
    use App\Models\Picture;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Validator;

    class PictureController extends Controller
    {
        public function store(Request $request, PictureFormValidation $validation): JsonResponse
        {
//            return response()->json(Auth::user());

            $validator = Validator::make($request->all(), $validation->rules(), $validation->messages());

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 401);
            }

            $fullFileName = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fullFileName, PATHINFO_FILENAME);
            $extension = pathinfo($fullFileName, PATHINFO_EXTENSION);
            $file = $filename . '_' . time() . '.' . $extension;

            $request->file('image')->storeAs('public/pictures', $file);

            $picture = Picture::create([
                'image' => $file,
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'user_id' => Auth::user()->id
            ]);

            return response()->json([$picture]);
        }

        public function show($id): JsonResponse
        {
            $picture = Picture::find($id);
            if (!$picture) return response()->json(['message' => 'Ressource not found'], 404);
            return response()->json($picture);
        }

        public function fetchAll(): JsonResponse
        {
            $pictures = Picture::all();
            return response()->json($pictures);
        }

        public function search(Request $request): JsonResponse
        {
            $param = $request->input('search');
            if($param){
                $pictures = Picture::where('title','like',"%$param%",)->get();
            } else {
                $pictures = Picture::all();

            }
            return response()->json($pictures);
        }
    }
