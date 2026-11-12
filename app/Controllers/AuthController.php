<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    protected UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function login()
    {
        return view('auth/login');
    }
    public function attemptLogin()
    {
        $username = trim((string) $this->request->getPost('username'));
        $password = (string) $this->request->getPost('password');
        $user = $this->userModel->where('username', $username)->first();
        if (
            !$user ||
            !password_verify($password, $user['password_hash']) ||
            $user['status'] !== 'ACTIVE'
        ) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'username atau password tidak valid');
        }

        // periksa apakah hash password perlu diperbaiki/perbarui

        if (password_needs_rehash($user['password_hash'], PASSWORD_DEFAULT)) {
            $newHash = password_hash($password, PASSWORD_DEFAULT);
            $this->userModel->update($user['id'], [
                'password_hash' => $newHash,
            ]);
        }

        session()->regenerate();

        session()->set([
            'user_id' => $user['id'],
            'username' => $user['username'],
            'full_name' => $user['full_name'],
            'role' => $user['role'],
            'isLoggedIn' => true,
        ]);
        return redirect()->to('dashboard');
    }
    public function dashboard()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        return view('dashboard/index');
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function adminUsers()
    {
        return $this->response->setJSON([
            'message' => 'AKSES ADMINISTRATOR BERHASIL.',
            'username' => session()->get('username'),
            'role' => session()->get('role'),
        ]);
    }

    // membuat password policy
    private function validatePasswordPolicy(string $password): bool
    {
        return strlen($password) >= 8 &&
            preg_match('/[A-Z]/', $password) &&
            preg_match('/[a-z]/', $password) &&
            preg_match('/[0-9]/', $password) &&
            preg_match('/[^A-Za-z0-9]/', $password);
    }

    // tes password policy
    public function testPasswordPolicy()
    {
        $passwords = [
            'Admin123!' => true,
            'admin123' => false,
            'Admin123' => false,
        ];
        $results = [];
        foreach ($passwords as $password => $expected) {
            $actual = $this->validatePasswordPolicy($password);
            $results[] = [
                'password' => $password,
                'expected' => $expected,
                'actual' => $actual,
                'result' => $actual === $expected ? 'PASS' : 'FAIL',
            ];
        }
        return $this->response->setJSON($results);
    }

    // membuat akun baru

    public function storeUser()
    {
        $data = [
            'username' => trim((string) $this->request->getPost('username')),
            'email' => trim((string) $this->request->getPost('email')),
            'password' => (string) $this->request->getPost('password'),
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'role' => (string) $this->request->getPost('role'),
        ];

        if (
            $data['username'] === '' ||
            $data['email'] === '' ||
            $data['full_name'] === '' ||
            !filter_var($data['email'], FILTER_VALIDATE_EMAIL) ||
            !in_array($data['role'], ['ADMIN', 'STAFF'], true) ||
            !$this->validatePasswordPolicy($data['password'])
        ) {
            return $this->response->setStatusCode(400)->setJSON([
                'message' => 'DATA PENGGUNA TIDAK VALID',
            ]);
        }
        if (
            $this->userModel->where('username', $data['username'])->first() ||
            $this->userModel->where('email', $data['email'])->first()
        ) {
            return $this->response->setStatusCode(400)->setJSON([
                'message' => 'USERNAME DAN EMAIL SUDAH DIGUNAKAN.',
            ]);
        }

        $this->userModel->insert([
            'username' => $data['username'],
            'email' => $data['email'],
            'password_hash' => password_hash(
                $data['password'],
                PASSWORD_DEFAULT,
            ),
            'full_name' => $data['full_name'],
            'role' => $data['role'],
            'status' => 'ACTIVE',
        ]);
        return $this->response->setStatusCode(201)->setJSON([
            'message' => 'PENGGUNA BERHASIL DIBUAT.',
        ]);
    }

    public function createUser()
    {
        return view('admin/create_user');
    }
}
