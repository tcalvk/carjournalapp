<?php 
function get_service_types($user_id) {
    global $db;
    $query = 'select *
             from serviceType
             where userId = :userId or userId is null
             order by serviceTypeId desc';
    $statement = $db->prepare($query);
    $statement->bindValue(':userId', $user_id);
    $statement->execute();
    $service_types = $statement->fetchAll();
    $statement->closeCursor();
    return $service_types;
}

function add_service_type($other_box, $user_id) {
    global $db; 
    $query = 'insert into serviceType (name, userId)
             values (:name, :userId)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $other_box);
    $statement->bindValue(':userId', $user_id);
    $statement->execute();
    $statement->closeCursor();
    return true; 
}

function get_service_type_by_name($other_box, $user_id) {
    global $db;
    $query = 'select * from serviceType
             where name = :otherBox
             and userId = :userId';
    $statement = $db->prepare($query);
    $statement->bindValue(':otherBox', $other_box);
    $statement->bindValue(':userId', $user_id);
    $statement->execute();
    $service_type = $statement->fetch();
    $statement->closeCursor();
    return $service_type;
}

function check_serviceType_duplicates ($user_id, $other_box) {
    global $db;
    $query = 'select * from serviceType 
              where name = :otherBox';
    $statement = $db->prepare($query);
    $statement->bindValue(':otherBox', $other_box);
    $statement->execute();
    $duplicate = $statement->fetchAll();
    $statement->closeCursor();
    return $duplicate;
}
?>