<?php
    namespace App;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class File extends Model
    {
        use SoftDeletes;
		protected $guarded = ['id'];
	    protected $dates = ['deleted_at'];
    }