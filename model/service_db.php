<?php 
function add_service($vehicle_id, $service_date, $service_type, $date_added, $location_id, $service_miles, $service_cost, $user_id) {
    global $db;
    $query = 'insert into service (vehicleId, serviceDate, serviceType, dateAdded, locationId, serviceMiles, serviceCost, createdBy)
             values (:vehicleId, :serviceDate, :serviceType, :dateAdded, :locationId, :serviceMiles, :serviceCost, :createdBy)';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicleId', $vehicle_id);
    $statement->bindValue(':serviceDate', $service_date);
    $statement->bindValue(':serviceType', $service_type);
    $statement->bindValue(':dateAdded', $date_added);
    $statement->bindValue(':locationId', $location_id);
    $statement->bindValue(':serviceMiles', $service_miles);
    $statement->bindValue(':serviceCost', $service_cost);
    $statement->bindValue(':createdBy', $user_id);
    $statement->execute();
    $statement->closeCursor();
    return true;
}

function get_services_by_vehicle($vehicle_id) {
    global $db;
    $query = 'select s.*, l.name "locationName"
             from service s 
             left join location l on s.locationId = l.locationId
             where vehicleId = :vehicleId';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicleId', $vehicle_id);
    $statement->execute();
    $services = $statement->fetchAll();
    $statement->closeCursor();
    return $services;
}

function get_single_service_by_vehicle($vehicle_id) {
    global $db;
    $query = 'select s.*, v.ownerId 
             from service s 
             left join vehicle v on s.vehicleId = v.vehicleId
             where s.vehicleId = :vehicleId
             limit 1';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicleId', $vehicle_id);
    $statement->execute();
    $top_service = $statement->fetch();
    $statement->closeCursor();
    return $top_service;
}

function get_service_by_id($service_id) {
    global $db;
    $query = 'select s.*, l.name "locationName", l.city
             from service s
             left join location l on s.locationId = l.locationId 
             where s.serviceId = :serviceId';
    $statement = $db->prepare($query);
    $statement->bindValue(':serviceId', $service_id);
    $statement->execute();
    $details = $statement->fetch();
    return $details;
}

?>