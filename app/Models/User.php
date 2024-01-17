<?php

namespace App\Models;

class User extends Model {
    
    var $table = 'users';
    var $id = 'id';

    // function get_by_email($email) {
    //     $stmt = $this->query_builder
    //         ->select('*')
    //         ->from( $this->table )
    //         ->where( 'email like ?' )
    //         ->setMaxResults(1)
    //         ->setParameter(0, $email);
    //     return $stmt->execute()->fetchAll();
    // } // -- end of get_by_email

    function get_by_email($email, $id = null) {
        $this->query_builder->select('*')->from( $this->table )
        ->where( 'email like ?' )->setParameter(0, $email);
        if ($id != null) {
            $this->query_builder->andWhere( $this->id .' != ?')->setParameter(1, $id);
        }
        $stmt = $this->query_builder->setMaxResults(1);
        return $stmt->execute()->fetchAll();
    } // -- end of get_by_email


    function get_by_username($username, $id = null) {
        $this->query_builder
            ->select('*')->from( $this->table )
            ->where( 'username like ?' )->setParameter(0, $username);
        if ($id != null) {
            $this->query_builder->andWhere($this->id . ' != ?')->setParameter(1, $id);
        }
        $stmt = $this->query_builder->setMaxResults(1);
        return $stmt->execute()->fetchAll();
    }


    // function get_by_username($username) {
    //     $stmt = $this->query_builder
    //         ->select('*')
    //         ->from( $this->table )
    //         ->where( 'username like ?' )
    //         ->setMaxResults(1)
    //         ->setParameter(0, $username);
    //     return $stmt->execute()->fetchAll();
    // } // -- end of get_by_username

}

