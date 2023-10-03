<?php
require_once __DIR__.'/config.php';
// print_r($db);

//login function
function login($post){
   
  if(count($post)>0){
    $email=trim($_POST['email']);
    $password=md5(trim($_POST['password']));

    global $db;
    $checkData=[
        ':email'=>$email,
        ':password'=>$password
    ];


    
    $data = $db->prepare('SELECT id,email, password FROM users WHERE email = :email AND password = :password');
    $data->execute($checkData);
   $row=$data->fetch(PDO::FETCH_ASSOC);
     if(count($row)>0){
        $_SESSION['user']['id']=$row['id'];
        sleep(2);
        echo 'yonlendirilirsiniz';
        header('Location:index.php');
        die;
     }
  }
    
}

// user fullname yazilmasi

function getUserFullname(){
   global $db;


    $sql='Select fullname FROM users where id=:id';

     $checkData=[
        ':id'=>$_SESSION['user']['id'],
     ];

     $data=$db->prepare($sql);
     $data->execute($checkData);
     $row=$data->fetch(PDO::FETCH_ASSOC);
     if(count($row)>0){
        return $row['fullname'];
     }
}


function logout(){
    if(isset($_SESSION['user']['id']) and $_SESSION['user']['id']>0){
        unset($_SESSION['user']['id']);
        header('Location:login.php');
        die;
    }
}

// all php ucun userleri tabelden getiriry
function getAllUsers(){
    global $db;
    $sql='SELECT * FROM users';
   $data=$db->prepare($sql);
   $data->execute();
   $row=$data->fetchAll(PDO::FETCH_ASSOC);
   if(count($row)>0){
    return $row;
   }else{
    header('Location:index.php');
    die;
   }

}

function deleteUser($user_id){
    global $db;
    $sql='DELETE FROM users where id=:id';
    $data=$db->prepare($sql);
    $data->bindParam(':id',$user_id,PDO::PARAM_INT);
   $exec=$data->execute();
    if($exec){
        $loc=explode('/',$_SERVER['REQUEST_URI']);
        $loc=$loc[count($loc)-1];
        header('Location:index.php?page=users&action=all&operation=true'); 
        die;
    }
}

function getUserDetail($user_id){
    global $db;
    $sql='Select * from users where id=:id';
    $data=$db->prepare($sql);
    $data->bindParam(':id',$user_id,PDO::PARAM_INT);
    $data->execute();
    $user=$data->fetch(PDO::FETCH_ASSOC);
    
    if(count($user)>0){
        return $user;
    }else{
        return [];
    }
}

/// update function
// function updateUserDetail($user_id,$post){
//   global $db;

  
//   if(isset($post['update_user'])){
    
//      if(empty($post['password'])){
//         unset($post['password']);
//      }if(empty($post['password_conf'])){
//         unset($post['password_conf']);
//      }
//      }if(empty($post['update_user'])){
//         unset($post['update_user']);
//      }
//      $keys=array_keys($post);
//      $sqlkeys=[];
//      foreach($keys as $key=>$val){
//          $sqlkeys[]=$val . ' =: ' . $val;
//         }
        
        
//         $sqlkeys=implode(',',$sqlkeys);
        
       
//     $execPost=[];
//     foreach($post as $key=>$data){
//         $execPost[':'.$key]=$data;

//     }
//        $execPost[':id']=$user_id;
      

//     $sql="UPDATE users SET " . $sqlkeys . " WHERE id=:id";
//     $data=$db->prepare($sql);
//    print_r($data);die;
// // //     // $data->bindParam('id',$user_id,PDO::PARAM_INT);
//     $row=$data->execute($execPost);
//     var_dump($row);die;
//   }
function updateUserDetail($user_id, $post){
    global $db;

    if(isset($post['update_user'])){
        if(empty($post['password'])){
            unset($post['password']);
        }
        if(empty($post['password_conf'])){
            unset($post['password_conf']);
        }
        if(empty($post['update_user'])){
            unset($post['update_user']);
        }
        if(empty($post['file'])){
            unset($post['file']);
        }

        $keys = array_keys($post);
        $sqlkeys = [];
        foreach ($keys as $key) {
            $sqlkeys[] = $key . ' = :' . $key;
        }

        $sqlkeys = implode(', ', $sqlkeys);

        $execPost = $post;
        $execPost['id'] = $user_id;

        $sql = "UPDATE users SET " . $sqlkeys . " WHERE id = :id";
        $data = $db->prepare($sql);

        //
        foreach ($execPost as $key => &$value) {
            $data->bindParam(':' . $key, $value);
        }

        $row = $data->execute();

           if($row){
            header('Location:index.php?page=users&action=update&id='.$user_id.'&operation=true'); 
        die;
           }
    }
}
function storeUser($post){
    global $db;



    if(isset($post['store_user'])){
        if(empty($post['store_user'])){
            unset($post['store_user']);
        }
        if(empty($post['password_conf'])){
            unset($post['password_conf']);
        }
       
        $errors = [];

        if (empty($post['fullname'])) {
            $errors[] = "Adınızı yazin";
        }

        if (empty($post['password'])) {
            $errors[] = "Şifre yazin";
        } elseif (strlen($post['password']) < 8) {
            $errors[] = "Şifre en az 8 reqemli olmalidir";
        }

       
        if (!empty($errors)) {
            
            echo "<script>";
            echo "alert('Xeta :(\\n";
            foreach ($errors as $error) {
                echo "- " . $error . "\\n";
            }
            echo "');";
            echo "</script>";

            return;
        }


        if (isset($_FILES['photo'])) {
            $targetDir = "../admin/user_img/"; 
            $fileExtension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION); 
           
            
          
            $userId = $_SESSION['user']['id']; 
            $date = time(); 
            
            
            $newFileName = $date . "_" . $userId . "." . $fileExtension;
            $targetFile = $targetDir . $newFileName;
            (strlen($fileExtension)>0)?$post['photo']=$newFileName :$post['photo']=null;
            
            
            if (!file_exists($targetDir)) {
                mkdir($targetDir); 
            }
          
            $post['password']=md5($post['password']);
          
            
            $keys = array_keys($post);
            $sqlkeys = [];
            foreach ($keys as $key) {
                $sqlkeys[] = $key . ' = :' . $key;
            }
            
            $sqlkeys = implode(', ', $sqlkeys);
            
            $execPost = $post;
            
            
    
            $sql = "INSERT INTO users SET " . $sqlkeys ;
            $data = $db->prepare($sql);
    
            //
            foreach ($execPost as $key => &$value) {
                $data->bindParam(':' . $key, $value);
            }
    
            $row = $data->execute();
       
               if($row){
                header('Location:index.php?page=users&action=create&operation=true'); 
            die;
               }
        }
        
    
      
       
       

      
    }
} 





function storeComment($post){
    global $db;

    if(isset($post['store_comment'])){
      

        if(empty($post['store_comment'])){
            unset($post['store_comment']);
        }
        
      $post['user_id']=$_SESSION['user']['id'];
    //  print_r($post);die;


        $keys = array_keys($post);
        $sqlkeys = [];
        foreach ($keys as $key) {
            $sqlkeys[] = $key . ' = :' . $key;
        }

        $sqlkeys = implode(', ', $sqlkeys);

        $execPost = $post;
      

        $sql = "INSERT INTO comments SET " . $sqlkeys ;
        $data = $db->prepare($sql);

        //
        foreach ($execPost as $key => &$value) {
            $data->bindParam(':' . $key, $value);
        }

        $row = $data->execute();

           if($row){
            header('Location:index.php?page=comment&action=all&operation=true'); 
        die;
           }
    }
}

// get comment
// function getComments(){
//     global $db;
//     $sql='SELECT * FROM `comments` left JOIN users on users.id=comments.user_id';
    
//    $data=$db->prepare($sql);
//    $data->execute();
//    $row=$data->fetchAll(PDO::FETCH_ASSOC);
   
 
//    if(count($row)>0){
//     return $row;
//    }else{
//     header('Location:index.php');
//     die;
//    }
// }
function getComments(){
    global $db;
    $sql = 'SELECT comments.id AS comment_id, comments.comment, users.id AS user_id, users.fullname
            FROM comments
            LEFT JOIN users ON comments.user_id = users.id';
    
    $data = $db->prepare($sql);
    $data->execute();
    $rows = $data->fetchAll(PDO::FETCH_ASSOC);
    
    if(count($rows) > 0){
        return $rows;
    } else {
        header('Location:index.php');
        die;
    }
}

// update comment
// function updateUserComment($user_id, $post){
//     global $db;

//     if(isset($post['update_comment'])){
      
//         if(empty($post['update_comment'])){
//             unset($post['update_comment']);
//         }
       

//         $keys = array_keys($post);
    
        
//         $sqlkeys = [];
//         foreach ($keys as $key) {
//             $sqlkeys[] = $key . ' = :' . $key;
//         }
        
//         $sqlkeys = implode(', ', $sqlkeys);
      

//         $execPost = $post;
//         $execPost['id'] = $user_id;

//       ;

//         $sql = "UPDATE comments SET " . $sqlkeys . " WHERE id = :id";
//         $data = $db->prepare($sql);
     
        
//         //
//         foreach ($execPost as $key => &$value) {
//             $data->bindParam(':' . $key, $value);
//         }
        
//         $row = $data->execute();
       

//            if($row){
//             header('Location:index.php?page=comment&action=all&id='.$user_id.'&operation=true'); 
//         die;
//            }
//     }
// }
function updateUserComment($user_id, $post){
    global $db;

//    print_r($user_id);die;


    if(isset($post['update_comment'])){
      
        if(empty($post['update_comment'])){
            unset($post['update_comment']);
        }

        $keys = array_keys($post);
        $sqlkeys = [];
        
        foreach ($keys as $key) {
            $sqlkeys[] = $key . ' = :' . $key;
        }
        
        $sqlkeys = implode(', ', $sqlkeys);

        $post['id'] = $user_id;

        $sql = "UPDATE comments SET " . $sqlkeys . " WHERE user_id = :id";
        $data = $db->prepare($sql);

        $row = $data->execute($post);

        if($row){
            header('Location: index.php?page=comment&action=all&id='.$user_id.'&operation=true'); 
            die;
        }
    }
}

// delete comment
function deleteComment($user_id){
    global $db;

    $sql='DELETE FROM comments where id=:id';
    $data=$db->prepare($sql);
    $data->bindParam(':id',$user_id,PDO::PARAM_INT);
   $exec=$data->execute();
    if($exec){
        $loc=explode('/',$_SERVER['REQUEST_URI']);
        $loc=$loc[count($loc)-1];
        header('Location:index.php?page=comment&action=all&operation=true'); 
        die;
    }
}

// delete all
function deleteCheckComments($post){
    global $db;
  
    if(!array_key_exists('check_id',$post)){
        header('Location: index.php?page=comment&action=all&operation=true');
        die;
    }

    if (isset($post['check_id']) && is_array($post['check_id'])) {
        foreach ($post['check_id'] as $commentId) {
            
            $sql = 'DELETE FROM comments WHERE id = :id';
            $data = $db->prepare($sql);
            $data->bindParam(':id', $commentId, PDO::PARAM_INT);
            $exec = $data->execute();

        }

       
        header('Location: index.php?page=comment&action=all&operation=true');
        die;
    }
}