<?php

namespace App\DataTables;

use App\Models\User;
use Octopy\DataTable\DataTable;
use Yajra\DataTables\DataTableAbstract;

class UserDataTable extends DataTable
{
    /**
     * @return mixed
     */
    public function query()
    {
        return User::query();
    }

    /**
     * @param  DataTableAbstract $table
     */
    public function option(DataTableAbstract $table) : void
    {
        //
    }
}
