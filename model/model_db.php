<?php 
function get_models() {
    global $db;
    $query = 'select * 
             from model';
    $statement = $db->prepare($query);
    $statement->execute();
    $models = $statement->fetchAll();
    $statement->closeCursor();
    return $models;
}

function get_model_by_makeid($make_id) {
    global $db;
    $query = 'select * 
             from model where makeId = :makeId';
    $statement = $db->prepare($query);
    $statement->bindValue(':makeId', $make_id);
    $statement->execute();
    $models = $statement->fetchAll();
    $statement->closeCursor();
    return $models;
}
?>