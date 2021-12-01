<?php
    namespace App;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Message extends Model
    {
        use SoftDeletes;
	    protected $primaryKey = 'message_id';
		protected $guarded = ['message_id'];
	    protected $dates = ['deleted_at'];
    }