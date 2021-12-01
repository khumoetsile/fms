<?php
    namespace App;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class State extends Model
    {
    	protected $primaryKey = 'state_id';
        use SoftDeletes;
	    protected $guarded = ['state_id'];
	    protected $dates = ['deleted_at'];

        public function country()
        {

            return $this->belongsTo('App\Country', 'foreign_key', 'local_key');

        }


    }