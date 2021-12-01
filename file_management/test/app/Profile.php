<?php
    namespace App;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Profile extends Model
    {
        use SoftDeletes;
	    protected $primaryKey = 'profile_id';
		protected $guarded = ['profile_id'];
	    protected $dates = ['deleted_at'];
    }