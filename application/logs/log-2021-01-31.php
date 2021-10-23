<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-01-31 11:09:56 --> Query error: In aggregated query without GROUP BY, expression #2 of SELECT list contains nonaggregated column 'crayotech_multistore.reviews.overall_rating'; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT SUM(`overall_rating`) AS `overall_rating`, `overall_rating`, count(*) as num
FROM `reviews`
WHERE `status` = '1'
AND `product_id` = '15'
