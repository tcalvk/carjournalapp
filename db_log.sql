--Instructions: -- 
--Use this file to note database structure updates for push to production
--Use the following wrapper for each update: 
--ver x.x <short date>

--4/10/23
alter table service 
drop column serviceType 

drop table serviceType 

alter table service 
add serviceType varchar(64) after serviceDate 

--Status: Complete

--5/6/23

alter table vehicle 
add Deleted datetime after dateAdded;

alter table location 
add Deleted datetime after createdBy;

--Status: Complete

