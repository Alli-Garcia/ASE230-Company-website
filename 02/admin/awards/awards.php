<?php 

//The file must contain the necessary functions for retrieving and indexing all the items,
//retrieving and showing a specific item, creating an item, modifying an item, and deleting an item from the database. 

function index(){
$file = '../../data/awards.csv';
$fp=fopen($file,'r');
$i=0;
while($content=fgetcsv($fp)){ 
    if($i == 0){
        echo $content[0],'<br>';
        $i++;
    }  
    //echo $content[0],' ',$content[1].'<br >';
    else{
        ?><a href=detail.php?index='<?php echo $i; ?>' class="btn btn-secondary"><?php echo $content[0],'<br>'; ?></a><?php
        $i++;
    }

}
fclose($fp);

}

function create(){
$file = '../../data/awards.csv';
$fp=fopen($file,'r');
/*$i=0;
while($content=fgetcsv($fp)){ 
    if($i == 0){
        echo $content[0],'<br>';
        $i++;
    }  
    //echo $content[0],' ',$content[1].'<br >';
    else{
        ?><a href=detail.php?index='<?php echo $i; ?>' class="btn btn-secondary"><?php echo $content[0],'<br>'; ?></a><?php
        $i++;
    }

}*/
fclose($fp);

    
}

function edit($ref){
    
}

function detail($ref){
$file = '../../data/awards.csv';
$fp=fopen($file,'r');
$i=0;

while($content=fgetcsv($fp)){
    if($i == $ref){        
        echo $content[1],'<br>';        
        break;
    }
    else{
        $i++;
        
    }
};
    
}
function delete($ref){
    
}

?>