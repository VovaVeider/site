<?php
require_once  __DIR__ .'/../vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\SignatureInvalidException;
    function rights_auth_check(array $roles):array{
        require  __DIR__ .'/secret.php';
        require_once __DIR__ .'/..//api_errors/errors.php';
        require_once __DIR__ .'/../db/db.php';
        $jwt=array_change_key_case(getallheaders(), CASE_LOWER)['authorization'];
        if (!isset($jwt)){
            //Если разрешён неаутенфицированный доступ
            if (in_array('guest',$roles)){
                $payload =['role'=>'guest'];
                return $payload;
            } else{
                header('Content-Type: application/json');
                $answer['error'] = 'NOT_AUTH';
                $answer['error_descr'] = $api_errors['NOT_AUTH'];
                echo json_encode($answer);
                exit();
            }
        }
        try {
            $payload = JWT::decode($jwt,new Key($secret_code,'HS256'));
        }
        catch (Throwable $e ){
                header('Content-Type: application/json');
                $answer['error'] = 'JWT_SIGN_FAIL';
                $answer['error_descr'] = $api_errors['JWT_SIGN_FAIL'];
                echo json_encode($answer);
                exit();
        }
        //Проверка что пользователь сейчас существует
        $id = $payload->id;
        $conn = create_conn();
        $stmt=$conn->prepare('SELECT * FROM USERS  WHERE ID = :ID');
        $stmt->execute(['ID'=>$id]);

        if ($stmt->fetch() === false){
            header('Content-Type: application/json');
            $answer['error'] = 'USER_NOT_EXISTS';
            $answer['error_descr'] = $api_errors['USER_NOT_EXISTS'];
            echo json_encode($answer);
            exit();
        }
        $role = $payload->role;
        if (!in_array($role,$roles)){
            header('Content-Type: application/json');
            $answer['error'] = 'NOT_RIGHTS';
            $answer['error_descr'] = $api_errors['NOT_RIGHTS'];
            echo json_encode($answer);
            exit();
        }

        return ['id'=>$payload->id,'login'=>$payload->login,'role'=>$payload->role];
    }
