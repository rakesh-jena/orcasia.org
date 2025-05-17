<?php

 namespace App\Models\Event;

 use Illuminate\Database\Eloquent\Factories\HasFactory;
 use Illuminate\Database\Eloquent\Model;

 class ScheduleSession extends Model
 {
     use HasFactory;

     protected $table = 'event_session';
     protected $fillable = ['scheduleId','title','startTime','endTime','description','sessionTag'];
 }