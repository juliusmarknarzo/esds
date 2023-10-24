USE elite_exam;

WITH RankedAlbums AS (
    SELECT
        artist,
        album,
        sales,
        date_released,
        ROW_NUMBER() OVER (PARTITION BY YEAR(date_released) ORDER BY sales DESC) AS sales_rank
    FROM t_artists
)
SELECT
    artist,
    album,
    sales,
    date_released
FROM RankedAlbums
WHERE sales_rank <= 10;
