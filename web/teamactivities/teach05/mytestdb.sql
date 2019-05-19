CREATE TABLE family(
    ID SERIAL NOT NULL PRIMARY KEY, 
    name varchar(50), 
    sex varchar(10), 
    age int
);

INSERT INTO family VALUES(1, 'Jonathan', 'Male', 38);
INSERT INTO family VALUES(2, 'Shannon', 'Female', 37);
INSERT INTO family VALUES(3, 'Elinor', 'Female', 13);
INSERT INTO family VALUES(4, 'Wesley', 'Male', 9);
INSERT INTO family VALUES(5, 'James', 'Male', 5);
INSERT INTO family VALUES(6, 'Evelyn', 'Female', 1);


