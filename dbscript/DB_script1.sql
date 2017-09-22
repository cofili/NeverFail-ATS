create table tests
 (testId int auto_increment not null,
  testName varchar(50),
  scriptName varchar(50),
  primary key (testId),
 )Engine=InnoDB;
 
 
 insert into classroom tests (Null, 'directory list', 'directoryList.py');
