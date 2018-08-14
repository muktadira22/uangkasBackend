<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Debit extends Model
{
    protected $table = 'transaksi_debit';
    protected $fillable = [
        'no_transaksi', 'debit', 'keterangan'
    ];
}
