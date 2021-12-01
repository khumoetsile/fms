<?php
    namespace App;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Company extends Model
    {
    	protected $primaryKey = 'company_id';
        use SoftDeletes;
	    protected $guarded = ['company_id'];
	    protected $dates = ['deleted_at'];
    }