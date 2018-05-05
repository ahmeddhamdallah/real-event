<?php
include("db.php");


class Member 
{
	public function getAllMembers(){
		global $connection ;
		$statement = $connection->prepare("SELECT * FROM categoryes");
		$statement->execute();
		$result = $statement->fetchAll();
		//return $statement->rowCount();
		return $result;

	}
	public function getParentMembers(){
		global $connection ;
		$statement = $connection->prepare("SELECT * FROM categoryes where parentId=0");
		$statement->execute();
		$result = $statement->fetchAll();
		//return $statement->rowCount();
		return $result;

	}
	public function insertMember($inputParamArray){
		global $connection ;
		$sqlInsert = "INSERT INTO categoryes(name, createdOn, parentId)
		    VALUES(:name, :createdOn, :parentId)";		
		$statement = $connection->prepare($sqlInsert);
		$statement->execute(array(
		    "name" => $inputParamArray['name'],
		    "createdOn" => date("Y-m-d H:i:s"),
		    "parentId" => $inputParamArray['parentId']
		));
	}
}
class Event 
{
	public function getAllEvent(){
		global $connection ;
		$statement = $connection->prepare("SELECT * FROM sport");
		$statement->execute();
		$result = $statement->fetchAll();
		//return $statement->rowCount();
		return $result;

	}
	public function insertevent($inputParamArray){
		global $connection ;
		$sqlInsert = "INSERT INTO sport(content, image, title, category)
		    VALUES(:content, :image, :title, :category)";		
		$statement = $connection->prepare($sqlInsert);
		$statement->execute(array(
		    "content" => $inputParamArray['content'],
		    "image" => $inputParamArray['image'],
		    "title" => $inputParamArray['title'],
		    "category" => $inputParamArray['category']
		));
	}
}

