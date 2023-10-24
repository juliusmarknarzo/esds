USE elite_exam;

SELECT artist, SUM(sales) AS combined_sales
FROM t_artists
GROUP BY artist;