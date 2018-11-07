<?php

function NewUser($name,$surname){
    $newname=['name'=>$name];
    $newsurn=['surmane'=>$surname];
    $userid=['id'=>time().md5($newname['name'].$newsurn['surmane'])];
    $newUser=array_merge($newname,$newsurn,$userid);
    saveArray($newUser);

}

function getArrayFromFile(){
    $arr=unserialize(file_get_contents("my.data"));
    return $arr? $arr:[];
}

function saveArray($UserArr){
    $Users=getArrayFromFile();
    $Users[]=$UserArr;
    file_put_contents("my.data",serialize($Users));
}


$users=getArrayFromFile();
foreach ($users as $key=>$value){
    echo $key." ".$value["name"];
}

