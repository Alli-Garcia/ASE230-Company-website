<?php 

//The file must contain the necessary functions for retrieving and indexing all the items,
//retrieving and showing a specific item, creating an item, modifying an item, and deleting an item from the database. 

function index(){
$file = '../../data/awards.csv';
$fp=fopen($file,'r');
$awards = [];
$i=0;
while(($content=fgetcsv($fp)) == !false){ 
    //print_r($content);
    $awards[$i] = $content;
    $i++;
}
fclose($fp);
print '<pre>' . print_r($awards, true) . '</pre>';
return $awards;

}

function create(){
$file = '../../data/awards.csv';
$fp=fopen($file,'a');
$i=0;
$list=array('Place', 'holder');
fputcsv($fp, $list);
fclose($fp);
$fp=fopen($file,'r');
while(($content=fgetcsv($fp)) == !false){$i++; /*echo $i;*/}
fclose($fp);
return $i;  
}

function edit($ref){
//echo $ref;
$file = '../../data/awards.csv';
$fp=fopen($file,'r');
$awards = [];
$i=0;
while(($content=fgetcsv($fp)) == !false){ 
    if($ref == $i){
        //echo $i;
        fclose($fp);
        return $content;
        break;
    }
    $awards[$i] = $content;
    $i++;
}
fclose($fp);
//print '<pre>' . print_r($awards, true) . '</pre>';
return $awards;
}

function detail($ref/*int*/){
//print '<pre>' . print_r($ref, true) . '</pre>';
$file = '../../data/awards.csv';
$fp=fopen($file,'r');
$i=0;
while($content=fgetcsv($fp)){
    if($ref == $i){        
        echo $content[1];  
        echo '</br>';
        break;
    }
    else{
        $i++;
        
    }
};
    
}
function delete($ref){
$file = '../../data/awards.csv';
$fp=fopen($file,'r');
$tempFp = fopen('../../data/temp.csv', 'w');
$awards = [];
$i=0;
while(($content=fgetcsv($fp)) == !false){ 
    if($ref == $i){
        continue;
    }
    else{
    $awards[$i] =$content;
    fputcsv($tempFp, $content);
    $i++;
    }
}
//print '<pre>' . print_r($awards, true) . '</pre>';
fclose($fp);
fclose($tempFp);
unlink('../../data/awards.csv');
rename('../../data/temp.csv','../../data/awards.csv');
echo 'Changes made.';
    
}

?>