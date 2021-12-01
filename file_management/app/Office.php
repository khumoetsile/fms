<?php
    namespace App;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Office extends Model
    {
        use SoftDeletes;
		protected $guarded = ['id'];
	    protected $dates = ['deleted_at'];
    }