

use GB;

CREATE TABLE images (
  id SERIAL PRIMARY KEY,
  dir VARCHAR(100),
  name_mini VARCHAR(50),
  name_origin VARCHAR(50),
  size int not null,  
  viewed int not null default 0
) ;


INSERT INTO GB.images(dir, name_mini,name_origin,size) VALUES ('./img/', 'img-5-mini.jpg', 'img-5.jpg', 18 );


UPDATE GB.images SET viewed = viewed +1 WHERE id=1;
SELECT * FROM GB.images;