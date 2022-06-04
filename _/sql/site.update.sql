UPDATE `SITES`
SET 
name = :name, 
slogan = :slogan,
history = :history,
country = :country,
district = :district,
position = :position,
updatedAt = :updatedAt
WHERE site_id = :site_id;