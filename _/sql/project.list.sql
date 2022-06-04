SELECT * FROM `PROJECTS` 
WHERE site_id = :site_id
ORDER BY project_id DESC;