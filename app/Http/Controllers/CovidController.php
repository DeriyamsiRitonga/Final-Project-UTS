<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class CovidController extends Controller
{
    
public function index()
    {
        $patient = Patient::all();
        $total = count($patient);

        if ($total) {
            $data = [
                'message' => 'Get All Resource',
                'total patient' => $total,
                'data patient' => $patient
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data is empty',
                'total patient' => $total
            ];
            return response()->json($data, 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:45',
            'phone' => 'required|numeric',
            'address' => 'required',
            'status' => 'required|max:10',
            'in_date_at' => 'required',
            'out_date_at' => 'nullable'
        ]);

        $patients = Patient::create($validate);

        $data = [
            'message' => 'Resource is added successfully',
            'data' => $patients
        ];

        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patients
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::find($id);

        if ($patient) {
            $data = [
                'message' => 'Get Detail Resource',
                'data' => $patient
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found'
            ];

            return response()->json($data, 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $patient = Patient::find($id);

        if ($patient) {
            $patient->update($request->all());
            $data = [
                'message' => 'Resource is update successfully',
                'data' => $patient
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found'
            ];

            return response()->json($data, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patients
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::find($id);

        if ($patient) {
            $patient->delete();
            $data = [
                'message' => 'Resource is delete successfully'
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found'
            ];

            return response()->json($data, 404);
        }
    }

    /**
     * Method (GET) Search Resource by name.
     *
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        $patient = Patient::where('name', 'like', '%' . $name . '%')->get();

        $total = count($patient);

        if ($total) {
            $data = [
                'message' => 'Get searched resource',
                'total' => $total,
                'data' => $patient
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found'
            ];

            return response()->json($data, 404);
        }
    }

    public function positive()
    {
        $patient = Patient::where('status', 'positive')->get();
        $total = count($patient);

        if ($total) {
            $data = [
                'message' => 'Get positive resource',
                'total patient' => $total,
                'data patient' => $patient
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data is empty',
                'total patient' => $total
            ];
            return response()->json($data, 200);
        }
    }

    public function  recovered()
    {
        $patient = Patient::where('status', 'recovered')->get();
        $total = count($patient);

        if ($total) {
            $data = [
                'message' => 'Get recovered resource',
                'total patient' => $total,
                'data patient' => $patient
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data is empty',
                'total patient' => $total
            ];
            return response()->json($data, 200);
        }
    }

    public function dead()
    {
        $patient = Patient::where('status', 'dead')->get();
        $total = count($patient);

        if ($total) {
            $data = [
                'message' => 'Get dead resource',
                'total patient' => $total,
                'data patient' => $patient
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data is empty',
                'total patient' => $total
            ];
            return response()->json($data, 200);
        }
    }
}
