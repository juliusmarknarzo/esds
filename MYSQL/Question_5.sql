USE elite_exam;

SELECT artist, album, sales, date_released
FROM t_artists
WHERE artist LIKE '%searched_artist%';