<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $table = "users_address";

    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable = ['zip_code', 'address', 'second_address', 'number', 'city', 'state', 'user_id'];

    public function insertUserAddress(array $userAddressData)
    {
        $userAddress = UserAddress::create([
            'zip_code' => preg_replace('/\D/', '', $userAddressData['zip']),
            'address' => $userAddressData['address'],
            'second_address' => $userAddressData['second_address'],
            'number' => $userAddressData['number'],
            'city' => $userAddressData['city'],
            'state' => $userAddressData['state'],
            'user_id' => $userAddressData['user_id'],
        ]);

        return $userAddress;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
