USE elite_exam;

SELECT artist, SUM(sales) AS total_albums_sold
FROM t_artists
GROUP BY artist;