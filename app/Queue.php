<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \DateTime;

class Queue extends Model
{
      public function getNextJob()
    {
    	$q = New Queue;
	    $q = \DB::table('queues')
                ->where('status', 'not complete')
                ->orderBy('priority', 'desc')
                ->first();
	    return $q;
    }
      public function setJobToProgress($id)
    {
    	$q = New Queue;
	    $q = Queue::find($id);
	    $q->status = 'inprogress';
	    $q->save();
	    return true;
    }
      public function getAverageTime()
    {
    	$q = New Queue;
	    $q = \DB::table('queues')
                ->where('status', 'inprogress')
                ->get();

        $now = date("Y-m-d H:i:s");
        foreach ($q as $key => $value) {
        	$diff =+ strtotime($now) - strtotime($value->updated_at);
        }
        $totalInprogress = $key +1; //the array starts from 0, so just add 1

        return $diff/$totalInprogress; // total second diffrents / total q items
    }
}
