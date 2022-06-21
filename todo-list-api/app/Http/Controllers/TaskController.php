<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\Task as TaskResource;

class TaskController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::with('user')->get();

        return $this->sendResponse(TaskResource::collection($tasks), 'Tasks Retrieved Successfully.');
    }
    /**
     * Display a listing of the resource by user.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_all_by_user()
    {
        $tasks = Task::with('user')->where('user_id', auth()->user()->id)->get();

        return $this->sendResponse(TaskResource::collection($tasks), 'Tasks Retrieved Successfully.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name'              => 'required',
            'completion_date'   => ['required', 'date'],
            'status'            => ['required', 'string'],
            'user_id'           => ['required', 'exists:users,id'],
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $task = Task::create($input);
   
        return $this->sendResponse(new TaskResource($task), 'Task Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
  
        if (is_null($task)) {
            return $this->sendError('Task not found.');
        }
   
        return $this->sendResponse(new TaskResource($task), 'Task Retrieved Successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name'              => 'required',
            'completion_date'   => ['required', 'date'],
            'status'            => ['required', 'string'],
            'user_id'           => ['required', 'exists:users,id'],
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $task = Task::find($id);   
        $task->name = $input['name'];
        $task->completion_date = $input['completion_date'];
        $task->status = $input['status'];
        $task->save();
   
        return $this->sendResponse(new TaskResource($task), 'Task Updated Successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_status(Request $request, $id)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'status'            => ['required', 'string'],
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $task = Task::find($id);
        $task->status = $input['status'];
        $task->save();
   
        return $this->sendResponse(new TaskResource($task), 'Task Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
   
        return $this->sendResponse([], 'Task Deleted Successfully.');
    }
}