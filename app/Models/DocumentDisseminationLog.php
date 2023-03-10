<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DocumentDisseminationLog extends Model{


//    protected $table = 'rec_document_dissemination_logs';

    protected $dates = ['sent_at'];

	public $timestamps = false;



    protected $attributes = [
        
        'slug' => '',
        'document_id' => '',
        'employee_no' => '',
        'email_contact_id' => '',
        'email' => '',
        'subject' => '',
        'content' => '',
        'status' => '',
        'status' => null,
        'sent_at' => null,
        'ip_sent' => '',
        'user_sent' => '',

    ];

    public function getTable(){
        if(Auth::user()->access == 'QC'){
            return 'qc_rec_document_dissemination_logs';
        }
        if( Auth::user()->access == 'VIS'){
            return 'rec_document_dissemination_logs';
        }
    }

    // Relationships

    public function document(){
        return $this->belongsTo('App\Models\Document', 'document_id', 'document_id');
    }

    public function employee(){
        return $this->belongsTo('App\Models\Employee', 'employee_no', 'employee_no');
    }

    public function emailContact(){
        return $this->belongsTo('App\Models\EmailContact', 'email_contact_id', 'email_contact_id');
    }
    


    
}
