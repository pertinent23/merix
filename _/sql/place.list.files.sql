SELECT
FILES.file_id,
FILES.createdAt,
FILES.updatedAt,
FILES.description,
FILES.title,
FILES.type,
FILES.url
FROM `PLACES_FILES`
RIGHT JOIN `FILES`
ON FILES.file_id = PLACES_FILES.file_id
WHERE place_id = :place_id;