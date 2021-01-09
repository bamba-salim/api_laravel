<?php

    namespace App\Http\Controllers;

    use App\Http\FormValidation\LoginFormValidation;
    use App\Http\FormValidation\RegisterFormValidation;
    use App\Http\Requests\RegisterRequest;
    use App\Models\User;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Str;

    class AuthController extends Controller
    {
        public function register(Request $request, RegisterFormValidation $validation): JsonResponse
        {
            $validator = Validator::make($request->all(), $validation->rules(), $validation->messages());

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()],401);
            }

            $token = Str::random(60);
            User::create([
                'email' => $request->input('email'),
                'name' => $request->input('name'),
                'password' => bcrypt($request->input('password')),
                'api_token' => $token
            ]);
            return response()->json(['token' => $token ]);

        }

        public function login(Request $request, LoginFormValidation $validation): JsonResponse
        {

            $validator = Validator::make($request->all(), $validation->rules(), $validation->messages());

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()],401);
            }

            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                $user = User::where('email',$request->input('email'))->firstOrFail();
                return response()->json($user);
            } else {
                return response()->json(['error'=>'Mauvais identifiant de connexion !'],401);
            }
        }


    }
