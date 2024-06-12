<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class PaymentsExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */


    use Exportable;

    private $id_user;

    public function __construct($id_user)
    {
        $this->id_user = $id_user;
    }

    public function collection()
    {
        return user::where('id_user', $this->id_user)->get();
    }
}
