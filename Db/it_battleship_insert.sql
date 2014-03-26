USE tk;
DELETE FROM bs_unit;


INSERT INTO bs_unit (UNIT_COLOR, UNIT_SHORT_DESC, UNIT_DESC, ATTACK_RANGE, MOVE_RANGE) VALUES
('Red', 'Truck', 'Red Truck', 5, 2),
('Red', 'Tank', 'Red Tank', 3, 1),
('Red', 'V2', 'Red V2', 6, 2),
('Red', 'Helicopter', 'Red Helicopter', 3, 1),
('Red', 'Jet', 'Red Jet', 4, 4),
('Red', 'Plane', 'Red Plane', 3, 3),
('Blue', 'Truck', 'Blue Truck', 5, 2),
('Blue', 'Tank', 'Blue Tank', 3, 1),
('Blue', 'V2', 'Blue V2', 6, 2),
('Blue', 'Helicopter', 'Blue Helicopter', 3, 1),
('Blue', 'Jet', 'Blue Jet', 4, 4),
('Blue', 'Plane', 'Blue Plane', 3, 3)



/*
update map
set color = 'Red',
unit = 'Jet',
health = 50,
where map_row = 0 and map_column = 8;
*/

INSERT INTO MAP
(MAP_NAME, MAP_ROW, MAP_COLUMN, COLOR, UNIT, HEALTH, WEAK_CURSE, STRONG_CURSE, WEAK_BUFF, STRONG_BUFF, AIR_ATTACK, AIR_DEFENCE, GROUND_ATTACK, GROUND_DEFENCE, ATTACK_RANGE, MOVE_RANGE, SUPER_POWER)
  SELECT 'Blitzkrieg',    0,    0,    'Red',    'Jet',    100,    0,    0,    0,    0,    0,    0,    0,    0,    4,    4,    0
  UNION
  SELECT 'Blitzkrieg',    0,    4,    'Blue',    'Jet',    100,    0,    0,    0,    0,    0,    0,    0,    0,    4,    4,    0
  UNION
  SELECT 'Blitzkrieg',    1,    0,    'Red',    'Truck',    200,    0,    0,    0,    0,    0,    0,    0,    0,    5,    2,    0
  UNION
  SELECT 'Blitzkrieg',    2,    0,    'Red',    'Plane',    100,    0,    0,    0,    0,    0,    0,    0,    0,    3,    3,    0
  UNION
  SELECT 'Blitzkrieg',    3,    0,    'Red',    'Tank',    300,    0,    0,    0,    0,    0,    0,    0,    0,    3,    1,    0
  UNION
  SELECT 'Blitzkrieg',    4,    0,    'Red',    'V2',    200,    0,    0,    0,    0,    0,    0,    0,    0,    6,    2,    0
  UNION
  SELECT 'Blitzkrieg',    5,    0,    'Red',    'Helicopter',    100,    0,    0,    0,    0,    0,    0,    0,    0,    3,    1,    0
  UNION
  SELECT 'Blitzkrieg',    6,    1,    'Red',    'Helicopter',    100,    0,    0,    0,    0,    0,    0,    0,    0,    3,    1,    1
  UNION
  SELECT 'Blitzkrieg',    6,    0,    'Red',    'Base',    1000,    0,    0,    0,    0,    0,    0,    0,    0,    0,    0,    0
  UNION
  SELECT 'Blitzkrieg',    7,    0,    'Red',    'Tower',    400,    0,    0,    0,    0,    0,    0,    0,    0,    4,    0,    0
  UNION
  SELECT 'Blitzkrieg',    8,    0,    'Red',    'Bunker',    400,    0,    0,    0,    0,    0,    0,    0,    0,    4,    0,    0
  UNION
  SELECT 'Blitzkrieg',    3,    15,    'Blue',    'Tank',    300,    0,    0,    0,    0,    0,    0,    0,    0,    3,    1,    0
  UNION
  SELECT 'Blitzkrieg',    4,    14,    'Blue',    'Tank',    300,    0,    0,    0,    0,    0,    0,    0,    0,    3,    1,    0
  UNION
  SELECT 'Blitzkrieg',    5,    13,    'Blue',    'Tank',    300,    0,    0,    0,    0,    0,    0,    0,    0,    3,    1,    0
  UNION
  SELECT 'Blitzkrieg',    5,    17,    'Blue',    'Base',    1000,    0,    0,    0,    0,    0,    0,    0,    0,    0,    0,    0
  UNION
  SELECT 'Blitzkrieg',    4,    17,    'Blue',    'Tower',    400,    0,    0,    0,    0,    0,    0,    0,    0,    4,    0,    0
  UNION
  SELECT 'Blitzkrieg',    6,    14,    'Blue',    'Tank',    300,    0,    0,    0,    0,    0,    0,    0,    0,    3,    1,    0
  UNION
  SELECT 'Blitzkrieg',    6,    17,    'Blue',    'Bunker',    600,    0,    0,    0,    0,    0,    0,    0,    0,    4,    0,    0
  UNION
  SELECT 'Blitzkrieg',    7,    15,    'Blue',    'Tank',    300,    0,    0,    0,    0,    0,    0,    0,    0,    3,    1,    0
  UNION
  SELECT 'Blitzkrieg',    7,    17,    'Blue',    'Truck',    200,    0,    0,    0,    0,    0,    0,    0,    0,    5,    2,    0
  UNION
  SELECT 'Blitzkrieg',    8,    17,    'Blue',    'Plane',    100,    0,    0,    0,    0,    0,    0,    0,    0,    3,    3,    0
  UNION
  SELECT 'Blitzkrieg',    9,    17,    'Blue',    'V2',    200,    0,    0,    0,    0,    0,    0,    0,    0,    6,    2,    0
  UNION
  SELECT 'Blitzkrieg',    10,    13,    'Blue',    'Helicopter',    100,    0,    0,    0,    0,    0,    0,    0,    0,    3,    3,    0;


INSERT INTO `users` (`id`, `username`, `password`) VALUES
(6, 'belfring', '5f4dcc3b5aa765d61d8327deb882cf99'),
(7, 'belfring', '5f4dcc3b5aa765d61d8327deb882cf99'),
(8, 'username', '5f4dcc3b5aa765d61d8327deb882cf99'),
(9, 'testy', '5f4dcc3b5aa765d61d8327deb882cf99'),
(10, 'brandon', '5f4dcc3b5aa765d61d8327deb882cf99'),
(11, 'lance', 'f5d1278e8109edd94e1e4197e04873b9'),
(12, 'kelfring', '5f4dcc3b5aa765d61d8327deb882cf99');

INSERT INTO BUILDING_TYPES
(BUILDING_TYPE)
  SELECT 'Airport'
  UNION 
  SELECT 'Barracks'
  UNION 
  SELECT 'Base'
  UNION 
  SELECT 'Factory'
  UNION 
  SELECT 'Fortress'
  UNION 
  SELECT 'Tower'
  UNION 
  SELECT 'Bunker';

INSERT INTO UNIT_TYPES
(UNIT_TYPE)
  SELECT 'Truck'
  UNION 
  SELECT 'Tank'
  UNION 
  SELECT 'V2'
  UNION 
  SELECT 'Helicopter'
  UNION 
  SELECT 'Jet'
  UNION 
  SELECT 'Plane';