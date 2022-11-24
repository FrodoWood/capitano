<?php
    session_start();
    if(isset($_SESSION['cart_items']) || empty($_SESSION['cart_items']))
    {
        header('location:');
        exit();
    }
    require_once();
    require_once();
    $itemCount = count($_SESSION['cart_items']);

    if(isset($_POST['submit']))
    {
        if(isset($_POST['first_name'],
        $_POST['last_name'],
        $_POST['email'],
        $_POST['address'],
        $_POST['country'])
        {
            $firstName = $_POST['first_name'];

            if(filter_var($_POST['email'],
            FILTER_VALIDATE_EMAIL) == false)
            {
                $errorMessage[] = 'Please enter a valid email!';
            }
            else
            {
                $firstName  = validate_input($_POST['first_name']);
                $lastName   = validate_input($_POST['last_name']);
                $email      = validate_input($_POST['email']);
                $address    = validate_input($_POST['address']);
                $country    = validate_input($_POST['country']);

                $statement = $db->prepare($sql);
                $params = [
                    'firstname' => $firstName,
                    'lastname' => $lastName,
                    'email' => $email,
                    'address' => $address,
                    'country' => $country
                ];

                $statement->execute($params);
                if($statement->rowCount() == 1)
                {
                    $getOrderID = $db->lastInsertID();
                }

            }
        }
    }