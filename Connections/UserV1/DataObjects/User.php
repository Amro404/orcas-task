<?php


namespace Connections\UserV1\DataObjects;

//use Spatie\DataTransferObject\DataTransferObject;

class User
{
    /** @var int */
    public $id;

    /** @var string */
    public $first_name;

    /** @var string */
    public $last_name;

    /** @var string */
    public $email;

    /** @var string */
    public $avatar;

//    /** @var string */
//    public $phone_number;

    /** @var string */
    public $created_at;

    public function __construct(
        int $id,
        string $first_name,
        string $last_name,
        string $email,
        string $avatar,
//        string $phone_number,
        string $created_at
    )
    {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->avatar = $avatar;
//        $this->phone_number = $phone_number;
        $this->created_at = $created_at;
    }

    public function toArray(): array
    {
        return [
            'id'            => $this->id,
            'first_name'    => $this->first_name,
            'last_name'     => $this->last_name,
            'email'         => $this->email,
            'avatar'        => $this->avatar,
//            'phone_number'  => $this->phone_number,
            'created_at'    => $this->created_at
        ];
    }

}
