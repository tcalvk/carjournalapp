<?php 
function get_locations($user_id) {
    global $db;
    $query = 'select * 
             from location
             where (createdBy = :createdBy or locationId = 14)';
    $statement = $db->prepare($query);
    $statement->bindValue(':createdBy', $user_id);
    $statement->execute();
    $locations = $statement->fetchAll();
    $statement->closeCursor();
    return $locations;
}

function add_location($name, $address1, $address2, $city, $state, $zip, $phone, $email, $website, $user_id) {
    global $db;
    $query = 'insert into location (name, address1, address2, city, state, zip, phone, email, website, createdBy)
             values (:name, :address1, :address2, :city, :state, :zip, :phone, :email, :website, :createdBy)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':address1', $address1);
    $statement->bindValue(':address2', $address2);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':zip', $zip);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':website', $website);
    $statement->bindValue(':createdBy', $user_id);
    $statement->execute();
    $statement->closeCursor();
    return true;
}

?>