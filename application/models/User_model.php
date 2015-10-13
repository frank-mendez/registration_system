<?php 


class User_model extends CI_Model 
{

        const DB_TABLE = 'user';
        const DB_PK = 'user_id';
        const USER_ROLE = 'role';
        const ROLE_PK = 'role_id';

        public function __construct()
        {
                parent::__construct();
        }


        /*Role Functions*/

        public function get_user_role()
        {
                $db_table = self::USER_ROLE;

                $sql = "SELECT * FROM {$db_table}";

                $query = $this->db->query($sql)->result();

                return $query;
        }

        public function insert_role($name, $description)
        {
                $db_table = self::USER_ROLE;

                $sql = "INSERT INTO {$db_table} (name, description) VALUES(?, ?)";

                $escaped_values = array($name, $description);

                $query = $this->db->query($sql, $escaped_values);

                return $query;
        }

        public function get_user_role_by_id($role_id)
        {
                $db_table = self::USER_ROLE;
                $role_pk = self::ROLE_PK;

                $sql = "SELECT * FROM {$db_table} WHERE {$role_pk} = ?";

                $escaped_value = array($role_id);

                $query = $this->db->query($sql, $escaped_value)->row_array();

                return $query;
        }

        public function update_role($name, $description, $role_id)
        {
                $db_table = self::USER_ROLE;
                $role_pk = self::ROLE_PK;

                $sql = "UPDATE {$db_table} SET name = ?, description = ? WHERE {$role_pk} = ?";

                $escaped_values = array($name, $description, $role_id);

                $query = $this->db->query($sql, $escaped_values);

                return $query;
        }

        public function delete_role($role_id)
        {
                $db_table = self::USER_ROLE;
                $role_pk = self::ROLE_PK;

                $sql = "DELETE FROM {$db_table} WHERE {$role_pk} = ?";

                $escaped_value = array($role_id);

                $query = $this->db->query($sql, $escaped_value);

                return $query;
        }

        /*User Functions*/
        public function get_all_users()
        {
                $db_table = self::DB_TABLE;
                $table_pk = self::DB_PK;

                $sql = "SELECT * FROM user";

                $query = $this->db->query($sql)->result_array();

                return $query;
        }

        public function insert_user($username, $password, $first_name, $last_name, $email, $address, $phone_num, $role_id)
        {
                $db_table = self::DB_TABLE;
                $table_pk = self::DB_PK;

                $sql = "INSERT INTO `user` (
                                  `username`,
                                  `password`,
                                  `first_name`,
                                  `last_name`,
                                  `email`,
                                  `address`,
                                  `phone_num`,
                                  `date_created`,
                                  `role_id`
                                ) 
                                VALUES
                                  (?, ?, ?, ?, ?, ?, ?, NOW(), ?) ";

                $escaped_values = array($username, $password, $first_name, $last_name, $email, $address, $phone_num, $role_id);

                $query = $this->db->query($sql, $escaped_values);

                return $query;
        }

        public function get_user_by_id($user_id)
        {
            $db_table = self::DB_TABLE;
            $table_pk = self::DB_PK;

            $sql = "SELECT * FROM {$db_table} WHERE {$table_pk} = ?";

            $escaped_value = array($user_id);

            $query = $this->db->query($sql, $escaped_value)->row_array();

            return $query;
        }

        public function update_user($first_name, $last_name, $email, $address, $phone_num, $role_id, $user_id)
        {
            $db_table = self::DB_TABLE;
            $table_pk = self::DB_PK;

            $sql = "UPDATE 
                      {$db_table} 
                    SET
                      `first_name` = ?,
                      `last_name` = ?,
                      `email` = ?,
                      `address` = ?,
                      `phone_num` = ?,
                      `role_id` = ?
                    WHERE {$table_pk} = ? ";

            $escaped_values = array($first_name, $last_name, $email, $address, $phone_num, $role_id, $user_id);

            $query = $this->db->query($sql, $escaped_values);

            return $query;
        }

}

