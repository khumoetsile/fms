<?php
    namespace App;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class City extends Model
    {
    	protected $primaryKey = 'city_id';
        use SoftDeletes;
	    protected $guarded = ['city_id'];
	    protected $dates = ['deleted_at'];
    }