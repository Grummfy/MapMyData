The purpose of this library is to help the change between on system of data to another. Whatever this data are (array, object, ...). It's a basic library that can help to build A MDM (Master Data Management) or just convert data from an API.

You can map data from :
* 1 entity to 1 other entity
* 1 entity to n other entities
* 
All of this with or without transformations.

[![Build Status](https://travis-ci.org/Grummfy/MapMyData.png?branch=master)](https://travis-ci.org/Grummfy/MapMyData)
# Map my data

	1. 1 to 1
	+-------------+                     +-------------+
	|    dataA    |	------ .... ---->   |     dataB   |
	+-------------+                     +-------------+
	| id          |                     | id          |
	| label       |                     | label       |
	| foo         |                     | foo         |
	| bar         |                     +-------------+
	| baz         |                     
	+-------------+                     
	
	2. 1 to n
	+-------------+                     +-------------+
	|    dataA    |	------ .... ---->   |     dataBa  |
	+-------------+                     +-------------+
	| id          |                     | id          |
	| label       |                     | label       |
	| foo         |                     | foo         |
	| bar         |                     +-------------+
	| baz         | ------ .... ---->   +-------------+
	+-------------+	                    |     dataBb  |
	                                    +-------------+
	                                    | id          |
	                                    | baz         |
	                                    | bar         |
	                                    +-------------+


## Extra
### Transformation of data
The transformation of data is possible through anonymous functions.

	+-------------+                     +-------------+
	|    dataA    |	------ .... ---->   |     dataBa  |
	+-------------+                     +-------------+
	| id          |                     | id          |
	| label       |                     | label       |
	| foo         |                     | foobar      |
	| bar         |                     +-------------+
	| baz         | ------ .... ---->   +-------------+
	+-------------+	                    |     dataBb  |
	                                    +-------------+
	                                    | id          |
	                                    | foobaz      |
	                                    | bar         |
	                                    +-------------+
