USE elite_exam;

SELECT artist, SUM(sales) AS combined_sales
FROM t_artists
GROUP BY artist
ORDER BY combined_sales DESC
LIMIT 1;