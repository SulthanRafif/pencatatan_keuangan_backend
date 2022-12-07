<?php

namespace App\Http\Controllers;

use App\Http\Requests\FinancialRecord\FinancialRecordRequest;
use App\Http\Resources\FinancialRecord\FinancialRecordCollection;
use App\Http\Resources\FinancialRecord\FinancialRecordIndexResource;
use App\Http\Resources\FinancialRecord\FinancialRecordShowResource;
use App\Models\Category;
use App\Models\FinancialRecord;

class FinancialRecordController extends Controller
{
    /**
     * Display a listing of the Financial Records for authenticated user
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $financialRecords = auth()->user()->financialRecords()->paginate(5);

        // return FinancialRecordIndexResource::collection($financialRecords);

        if ($financialRecords) {
            return new FinancialRecordCollection($financialRecords);
        }

        return response()->json(['message' => 'financial records data not found', 'status' => false], 401);
    }

    /**
     * Display a listing of the Financial Records for all users.
     *
     * @return \Illuminate\Http\Response
     */
    public function showListFinancialRecord()
    {
        $financialRecords = FinancialRecord::paginate(5);


        if ($financialRecords) {
            // return new FinancialRecordCollection($financialRecords);
            return FinancialRecordIndexResource::collection($financialRecords);
        }

        return response()->json(['message' => 'financial records data not found testing', 'status' => false], 401);
    }

    /**
     * Store a newly created Financial Record in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FinancialRecordRequest $request)
    {
        $category = Category::find($request->category);

        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => 'Financial Record not added, category not found',
            ], 500);
        }

        $financialRecord = auth()
            ->user()
            ->financialRecords()
            ->create($this->financialRecordStore($request));

        if ($financialRecord) {
            return response()->json([
                'status' => true,
                'data' => $financialRecord->toArray(),
                'message' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Financial Record not added',
            ], 500);
        }
    }

    /**
     * Display the specified Financial Record.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $financialRecord = FinancialRecord::find($id);

        if (!$financialRecord) {
            return response()->json([
                'status' => false,
                'message' => 'Financial Record not found'
            ], 400);
        }

        return new FinancialRecordShowResource($financialRecord);
    }

    /**
     * Update the specified Financial Record in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FinancialRecordRequest $request, $id)
    {
        $financialRecord = auth()->user()->financialRecords()->find($id);

        if (!$financialRecord) {
            return response()->json([
                'status' => false,
                'message' => 'Financial Record not found'
            ], 400);
        }

        $category = Category::find($request->category);

        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => 'Financial Record not added, category not found',
            ], 500);
        }

        $updated = $financialRecord->update($this->financialRecordStore($request));

        if ($updated) {
            return response()->json([
                'status' => true,
                'data' => $financialRecord->toArray(),
                'message' => 'Financial Record successfully updated'
            ], 400);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Financial Record can not be updated'
            ]);
        }
    }

    /**
     * Remove the specified Financial Record from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $financialRecord = auth()->user()->financialRecords()->find($id);

        if (!$financialRecord) {
            return response()->json([
                'status' => false,
                'message' => 'Financial Record not found'
            ], 400);
        }

        if ($financialRecord->delete()) {
            return response()->json([
                'status' => true,
                'message' => 'Financial Record successfully deleted'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Financial Record can not be deleted'
            ], 500);
        }
    }

    public function financialRecordStore(FinancialRecordRequest $request)
    {
        $income = $request->income;
        $expenditure = $request->expenditure;

        return [
            'income' => $income,
            'expenditure' => $expenditure,
            'balance' => $income - $expenditure,
            'category_id' => $request->category
        ];
    }
}
