/*for create an items view for home page with item category */
CREATE OR REPLACE VIEW itemsview as
SELECT items.* ,categories.* FROM items
INNER JOIN categories ON categories.cate_id = items.item_category