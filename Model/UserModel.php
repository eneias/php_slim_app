<?php
class UserModel
{
    /**
     * Busca todos os usuários cadastrados no DB
     * @return array com os objetos que encapsualm o usuario
     */
    public static function get_all()
    {
        $sql = "select * from users";
        $result = Db::query($sql);
        return $result;
    }

    /**
     * Insere um usuario no DB e retorna seu id
     * @param $user_data array com os dados do usuario a ser inserido no formato:
     *                     array( "name" => "",
     *                            "email" => "",
     *                            "password" => ""
     *                          );
     *
     * @return string retorna o id do usuario recem inserido
     */
    public static function insert($user_data)
    {
        $pass = md5($user_data['password']);

        $sql = "insert into users (name, email, password) VALUES ('$user_data[name]', '$user_data[email]', '$pass')";
        Db::execute($sql);
        return Db::getLastId();
    }

    /**
     * Atualiza os dados do usuario com o $id
     * @param $data  array com os dados do usuario a ser inserido no formato:
     *                     array( "name" => "",
     *                            "email" => "",
     *                            "password" => ""
     *                          );
     * @param $id id do usuario a ser editado
     * @return bool retorna true/false em caso de sucesso/falha
     */
    public static function update($data, $id)
    {
        $pass = md5($data['password']);
        $sql = "update users set name='$data[name]', email='$data[email]', password='$pass' where id=$id";
        return Db::execute($sql);
    }

    /**
     * Remove o usuario com o $id
     * @param $id id do usuario a ser removido
     * @return bool retorna true/false em caso de sucesso/falha
     */
    public static function delete($id)
    {
        $sql = "delete from users where id=$id";
        return Db::execute($sql);
    }

    /**
     * Retorna o usuario com o $id
     * @param $id identificação do usuario
     * @return mixed retorna um array com os dados do usuario com o $id informado
     */
    public static function get_one_by_id($id)
    {
        $sql = "select * from users where id=$id";
        $result = Db::query($sql);
        $user = $result[0];

        return $user;
    }

    /**
     * Retorna o usuario com o $id
     * @param $email identificação do usuario
     * @return mixed retorna um array com os dados do usuario com o $id informado
     */
    public static function get_one_by_email($email)
    {
        $sql = "select * from users where email='$email'";
        $result = Db::query($sql);

        echo $sql;
        var_dump($result);
        if (count($result)==0){
            return false;
        } else if (count($result)==1){
            return $result[0];
        } else {
            return false;
        }
    }
}