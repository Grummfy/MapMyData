# Notice
Instable project

[![Build Status](https://travis-ci.org/Grummfy/MapMyData.png?branch=master)](https://travis-ci.org/Grummfy/MapMyData)

# Map my data
The purpose of this project is to map data.

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
	                                    +-------------+
	                                    | id          |
	                                    | baz         |
	                                    | bar         |
	                                    +-------------+


## Extra
### Transformation of data
The transformation of data is possible through anonymous functions.
