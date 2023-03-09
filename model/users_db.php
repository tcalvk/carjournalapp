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
?>