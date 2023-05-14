<?php 
function get_locations($user_id) {
    global $db;
    $query = 'select l.locationId, l.name, l.address1, l.address2, l.city, l.state, l.zip, l.phone, l.email, l.website, count(s.serviceId) "TimesUsed"
             from location l
             left join service s on l.locationId = s.locationId
             where l.createdBy = :createdBy
             and l.Deleted is null
             group by l.locationId, l.name, l.address1, l.address2, l.city, l.state, l.zip, l.phone, l.email, l.website';
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

function delete_location($location_id, $current_date) {
    global $db; 
    $query = 'update location
             set Deleted = :current_date
             where locationId = :locationId';
    $statement = $db->prepare($query);
    $statement->bindValue(':current_date', $current_date);
    $statement->bindValue(':locationId', $location_id);
    $statement->execute();
    $statement->closeCursor();
    return true;
}

?>