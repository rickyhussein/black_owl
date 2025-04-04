<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Lokasi;
use App\Models\Jabatan;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($row["nama"] !== null && $row['email'] !== null) {
            $user = User::create([
                "name" => $row["nama"],
                "alamat" => $row["alamat"],
                "rt" => $row["rt"],
                "status" => $row["status"],
                "no_hp" => $row["nomor_hp"],
                "email" => $row["email"],
                "keterangan" => $row["keterangan"],
                "password" => Hash::make('madrid123')
            ]);

            $user->assignRole('user');
        }

    }
}
