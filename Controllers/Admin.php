<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\TenagaModel;

class Admin extends BaseController
{
    // variabel local
    protected $db, $builder, $siswaModel, $tenagaModel;

    public function __construct()
    {
        // Menggunakan query builder
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');

        $this->siswaModel = new SiswaModel();
        $this->tenagaModel = new TenagaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Admin',
            'jumlahSiswa' => $this->siswaModel->countAll(),
            'jumlahTenaga' => $this->tenagaModel->countAll(),
        ];

        return view('admin/dashboard', $data);
    }

    public function pengguna()
    {
        $data = [
            'title' => 'Pengguna'
        ];

        $this->builder->select('users.id as userid, username, email, name');
        // join tbl user & grop user (users id (tbl grop users) harus sama dgn users _id)
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        // auth grup id harus sma dengan group user id
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();

        // query
        $data['users'] = $query->getResult();

        return view('admin/akses/pengguna', $data);
    }

    public function detail($id = 0)
    {
        $data = [
            'title' => 'User Detail'
        ];

        $this->builder->select('users.id as userid, username, email, fullname, user_img, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        // users id  = id
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();

        // query
        $data['user'] = $query->getRow();

        // tangani jika kosong 
        if (empty($data['user'])) {
            return redirect()->to('admin/pengguna');
        }

        return view('admin/akses/detail', $data);
    }
}
