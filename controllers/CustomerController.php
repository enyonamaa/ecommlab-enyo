CustomerController


<?php

require_once __DIR__ . '/../classes/CustomerClass.php';

class CustomerController {
    private $customer;

    public function __construct() {
        $this->customer = new CustomerClass();
    }

    public function register($d) {
        if ($this->customer->emailExists($d['email'])) {
            return ['success' => false, 'error' => 'This email is already registered'];
        }

        $id = $this->customer->addCustomer(
            $d['name'], $d['email'], $d['pass'], $d['country'], $d['city'], $d['contact']
        );

        if ($id) {
            return ['success' => true, 'id' => $id];
        }

        return ['success' => false, 'error' => 'Registration was not successful. Try again.'];
    }

    public function login($email, $pass) {
        $row = $this->customer->login($email, $pass);

        if ($row) {
            return $row;
        }

        return ['error' => 'Invalid email or password'];
    }
}