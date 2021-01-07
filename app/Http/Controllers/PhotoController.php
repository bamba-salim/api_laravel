<?php

    namespace App\Http\Controllers;

    use App\Models\Photo;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Validator;

    class PhotoController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return Response
         */
        public function index()
        {
            //
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return Response
         */
        public function create()
        {
            //
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param Request $request
         * @return JsonResponse
         */
        public function store(Request $request): JsonResponse
        {
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:10',
                'description' => 'required|max:250'
            ],[
                'title.required' => 'le titre est obligatoire'
            ]);

            if($validator->fails()){
                return response()->json(['erros'=> $validator->errors()]);
            }

            Photo::create([
                'title' => $request->input('title'),
                'description' => $request->input('description')

            ]);



            return response()->json(['succes' => 'Infos enregistrés' ]);
        }

        /**
         * Display the specified resource.
         *
         * @param int $id
         * @return Response
         */
        public function show($id)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param int $id
         * @return Response
         */
        public function edit($id)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param Request $request
         * @param int $id
         * @return Response
         */
        public function update(Request $request, $id)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param int $id
         * @return Response
         */
        public function destroy($id)
        {
            //
        }
    }
