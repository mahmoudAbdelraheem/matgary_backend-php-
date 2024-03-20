/*for create an items view for home page with item category */
CREATE OR REPLACE VIEW itemsview as
SELECT items.* ,categories.* FROM items
INNER JOIN categories ON categories.cate_id = items.item_category

/* items view with faavorite user items*/
SELECT items1view.*,1 AS favorite_item FROM items1view
INNER JOIN favorite ON favorite.favorite_items_id = items1view.item_id AND favorite.favorite_users_id = 25
UNION ALL 
SELECT *, 0 AS favorite_item FROM items1view
WHERE item_id NOT IN (SELECT items1view.item_id FROM items1view
INNER JOIN favorite ON favorite.favorite_items_id = items1view.item_id AND favorite.favorite_users_id = 25)


/* user favorite my favorite view*/

CREATE OR REPLACE view myfavorite AS
SELECT favorite.* ,items.*, users.id FROM favorite
INNER JOIN users ON users.id =favorite.favorite_users_id
INNER JOIN items ON items.item_id = favorite.favorite_items_id

/* cart user items view*/
CREATE OR REPLACE VIEW cartview AS
SELECT SUM(items.item_price - (items.item_price * items.item_discount /100)) AS itemprice ,COUNT(cart_item_id) AS itemcount , cart.* , items.* FROM cart
INNER JOIN items ON items.item_id =cart.cart_item_id
WHERE cart_order_id =0
GROUP BY cart.cart_item_id , cart.cart_user_id , cart.cart_order_id

/*user orders view*/
CREATE OR REPLACE VIEW orderview AS
SELECT orders.* , address.* FROM orders
LEFT JOIN address ON address.address_id = orders.order_user_address

/* cart user order details*/
CREATE OR REPLACE VIEW ordersdetaisview AS
SELECT SUM(items.item_price - (items.item_price * items.item_discount /100)) AS itemprice ,COUNT(cart_item_id) AS itemcount , cart.* , items.* FROM cart
INNER JOIN items ON items.item_id =cart.cart_item_id
WHERE cart_order_id !=0
GROUP BY cart.cart_item_id , cart.cart_user_id , cart.cart_order_id