<?php


namespace App\Models;


class User
{
    private $email;
    private $password;

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email) 
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password) 
    {
        $this->password = $password;
    }

    public function login()
    {
        $email = $this->getEmail();
        $password = $this->getPassword();

        $user = array(
            'email' => $email,
            'password' => $password
        );

        $url = 'http://192.168.0.2:3000/login';

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($user));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = json_decode(curl_exec($ch));

        $message = $response->message;
        $token = $response->token;

        if ($message) {
            $_SESSION['message'] = $message;
            header('Location: /login');
        } else {
            $_SESSION['token'] = $token;
            header('Location: /');
        }
    }
}
