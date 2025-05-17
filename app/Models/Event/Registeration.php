<?php

 namespace App\Models\Event;

 use Illuminate\Database\Eloquent\Factories\HasFactory;
 use Illuminate\Database\Eloquent\Model;

 class Registeration extends Model
 {
     use HasFactory;

     protected $table = 'event_register';
     protected $fillable = ['fname','lname','email','phonenumber','occupation','organization','schedule_id'];
 }