CREATE Table scriptures(
    id SERIAL PRIMARY KEY,
    book varchar(255),
    chapter int,
    verse int,
    content text);

INSERT INTO scriptures(book,chapter,verse,content) VALUES(
	'John',1,5,
	'And the light shineth in darkness; and the darkness 
	comprehended it not.'),

('font-sizeDoctrine and Covenants',88,49,
	'The light shineth in darkness, and the darkness 
	comprehendeth it not; nevertheless, the day shall come 
	when you shall comprehend even God, being quickened in 
	him and by him.'),

('Doctrine and Covenants',93,28,
	'He that keepeth his commandments receiveth truth and 
	light, until he is glorified in truth and knoweth all 
	things.'),

('Mosiah',16,9,
	'He is the light and the life of the world; yea, a 
	light that is endless, that can never be darkened; 
	yea, and also a life which is endless, that there 
	can be no more death.'),

('Alma', 48, 17, 
	'Yea, verily, verily I say unto you, if all men had been, 
	and were, and ever would be, like unto Moroni, behold, 
	the very powers of hell would have been shaken forever; 
	yea, the devil would never have power over the hearts of 
	the children of men.'),

('Mosiah', 2, 17, 
	'And behold, I tell you these things that ye may learn 
	wisdom; that ye may learn that when ye are in the service 
	f your fellow beings ye are only in the service of your 
	God.'),

('3 Nephi', 30, 2, 
	'Turn, all ye Gentiles, from your wicked ways; and repent 
	of your evil doings, of your lyings and deceivings, and of 
	your whoredoms, and of your secret abominations, and your 
	idolatries, and of your murders, and your priestcrafts, and 
	your envyings, and your strifes, and from all your wickedness 
	d abominations, and come unto me, and be baptized in my name, 
	hat ye may receive a remission of your sins, and be filled 
	with the Holy Ghost, that ye may be numbered with my people 
	who are of the house of Israel.'),

('Mosiah', 3, 19, 
	'For the natural man is an enemy to God, and has been from 
	the fall of Adam, and will be, forever and ever, unless he 
	yields to the enticings of the Holy Spirit, and putteth off 
	the natural man and becometh a saint through the atonement 
	of Christ the Lord, and becometh as a child, submissive, 
	meek, humble, patient, full of love, willing to submit to 
	all things which the Lord seeth fit to inflict upon him, 
	even as a child doth submit to his father.');

CREATE TABLE topic(id SERIAL PRIMARY KEY, name VARCHAR(100));

INSERT INTO topic(name) VALUES
('Faith'),
('Sacrifice'),
('Charity');

CREATE TABLE topic_scripture(id SERIAL PRIMARY KEY, 
	topic_id int REFERENCES topic(id), 
	scripture_id int REFERENCES scriptures(id));

