<?php
    namespace App;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Personnel extends Model
    {
        use SoftDeletes;
		protected $guarded = ['id'];
	    protected $dates = ['deleted_at'];
    }