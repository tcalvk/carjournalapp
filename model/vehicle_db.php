<?php 
function get_vehicles($user_id) {
    global $db;
    $query = 'select v.*, mk.name "makeName", md.name "modelName"
             from vehicle v 
             left join make mk on v.makeId = mk.makeId
             left join model md on v.modelId = md.modelId
             where v.ownerId = :ownerId
             and v.Deleted is null';
    $statement = $db->prepare($query);
    $statement->bindValue(':ownerId', $user_id);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function add_vehicle($vin, $make_id, $model_id, $year, $color, $purchase_date, $date_added, 
                    $purchase_price, $purchase_miles, $owner_id) {  
    global $db;
    $query = 'insert into vehicle (vin, makeId, modelId, year, color, purchaseDate, dateAdded, purchasePrice, 
             purchaseMiles, logMiles, ownershipCost, ownerId)
              
             values (:vin, :makeId, :modelId, :year, :color, :purchaseDate, :dateAdded, :purchasePrice, 
             :purchaseMiles, :logMiles, :ownershipCost, :ownerId)';
    $statement = $db->prepare($query);
    $statement->bindValue(':vin', $vin);
    $statement->bindValue(':makeId', $make_id);
    $statement->bindValue(':modelId', $model_id);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':color', $color);
    $statement->bindValue(':purchaseDate', $purchase_date);
    $statement->bindValue(':dateAdded', $date_added);
    $statement->bindValue(':purchasePrice', $purchase_price);
    $statement->bindValue(':purchaseMiles', $purchase_miles);
    $statement->bindValue(':logMiles', $purchase_miles);
    $statement->bindValue(':ownershipCost', $purchase_price);
    $statement->bindValue(':ownerId', $owner_id);
    $statement->execute();
    $statement->closeCursor();
}

function delete_vehicle($vehicle_id, $current_date) {
    global $db;
    $query = 'update vehicle
             set Deleted = :current_date
             where vehicleId = :vehicleId';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicleId', $vehicle_id);
    $statement->bindValue(':current_date', $current_date);
    $statement->execute();
    $statement->closeCursor();
    return true;
}

function get_vehicle_by_id($vehicle_id) {
    global $db;
    $query = 'select v.*, mk.name "makeName", md.name "modelName"
             from vehicle v 
             left join make mk on v.makeId = mk.makeId
             left join model md on v.modelId = md.modelId
             where v.vehicleId = :vehicleId
             and v.Deleted is null';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicleId', $vehicle_id);
    $statement->execute();
    $vehicle = $statement->fetch();
    $statement->closeCursor();
    return $vehicle;
}
?>