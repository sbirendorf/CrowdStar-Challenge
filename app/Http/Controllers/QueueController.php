<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Queue;

class QueueController extends Controller
{
    public function create(Request $request)
    {
    	$user =  \Auth::user();
	    $q = New Queue;

	    $q->execute_command = $request->exe_command;
	    $q->pid = $request->pid;
	    $q->priority = $request->priority;
	    $q->uid = $user->id;
	    $q->save();
	    return $q;
    }
     public function update($id,Request $request)
    {
    	$user =  \Auth::user();
    	$q = New Queue;
	    $q = Queue::find($id);

	    $q->execute_command = $request->exe_command;
	    $q->pid = $request->pid;
	    $q->priority = $request->priority;
	    $q->status = $request->status;
	    $q->uid = $user->id;
	    $q->save();

	    return $q;
    }
    public function status($id)
    {
    	$q = New Queue;
	    $q = Queue::find($id);

	    return $q->status;
    }
    //pick non-completed job with the highest priority and set to inprogress
      public function setNextJobToProcess()
    {
    	$q = New Queue;
	    $next = $q->getNextJob();
	    return $q->setJobToProgress($next->id);
    }
    //get current average processing time
      public function aveTime()
    {
    	$q = New Queue;
	    return $q->getAverageTime();
    }

}
