<?php 
function get_makes() {
    global $db;
    $query = 'select * 
             from make';
    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
}

function get_make_by_id($make_id) {
    global $db;
    $query = 'select *
             from make 
             where makeId = :makeId';
    $statement = $db->prepare($query);
    $statement->bindValue(':makeId', $make_id);
    $statement->execute();
    $make = $statement->fetch();
    $statement->closeCursor();
    return $make;
}

?>