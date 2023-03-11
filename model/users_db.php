<?php 
function get_user($email, $password) {
    global $db;
    $query = 'select * 
             from users 
             where email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $row = $statement->fetch();
    $statement->closeCursor();
    $hash = $row['password'];
    $valid_password = password_verify($password, $hash);

    if ($valid_password == false) {
        return false; }
    else {
        return $row;
    }
}

function add_user($email, $password, $first_name, $last_name) {
    global $db;
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $query = 'insert into users (email, password, FirstName, LastName)
             values (:email, :password, :FirstName, :LastName)';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $hash);
    $statement->bindValue(':FirstName', $first_name);
    $statement->bindValue(':LastName', $last_name);
    $statement->execute();
    $statement->closeCursor();
    return true;
}

function get_personal_info($user_id) {
    global $db; 
    $query = 'select * 
             from users
             where userId = :userId';
    $statement = $db->prepare($query);
    $statement->bindValue(':userId', $user_id);
    $statement->execute();
    $row = $statement->fetch();
    $statement->closeCursor();
    return $row;
}

function change_firstname($user_id, $new_firstname) {
    global $db; 
    $query = 'update users
             set FirstName = :new_firstname
             where userId = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':new_firstname', $new_firstname);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $statement->closeCursor();
    return true;
}

function change_lastname($user_id, $new_lastname) {
    global $db; 
    $query = 'update users
             set LastName = :new_lastname
             where userId = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':new_lastname', $new_lastname);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $statement->closeCursor();
    return true;
}

function change_email($user_id, $new_email) {
    global $db; 
    $query = 'update users
             set email = :new_email
             where userId = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':new_email', $new_email);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $statement->closeCursor();
    return true;
}

function check_current_password($user_id) {
    global $db; 
    $query = 'select *
             from users 
             where userId = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $row = $statement->fetch();
    $statement->closeCursor();
    return $row;
}

function change_password($user_id, $new_password) {
    global $db; 
    $hash = password_hash($new_password, PASSWORD_DEFAULT);
    $query = 'update users
             set password = :password
             where userId = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':password', $hash);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $statement->closeCursor();
    return true;
}
?>