<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Listbuku extends BaseController
{
    protected $bukuModel;
    public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }

    public function index()
    {
        $data = [
            'title' => 'List buku',
            'buku' => $this->bukuModel->getBuku()
        ];

        return view('/pages/beranda', $data);
    }

    public function detail($slug)
    {
        $data = [
            'buku' => $this->bukuModel->getBuku($slug)
        ];

        if (empty($data['buku'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Berita' . $slug . 'tidak ditemukan');
        }

        return view('/pages/detail', $data);
    }

    public function create()
    {
        session();
        $data = [
            'validation' => \Config\Services::validation()
        ];

        return view('pages/tambah', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'judul' => 'required|is_unique[list-buku.judul]',
            'penulis' => 'required',
            'harga' => 'required',
            'review' => 'required'
        ])) {
            $validation = \Config\Services::validation();

            return redirect()->to('/listbuku/create')->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->bukuModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'harga' => $this->request->getVar('harga'),
            'review' => $this->request->getVar('review')
        ]);
        session()->setFlashdata('pesan', 'Data telah berhasil ditambahkan');
        return redirect()->to('/listbuku/#list');
    }

    public function delete($id)
    {
        $this->bukuModel->delete($id);
        session()->setFlashdata('pesan', 'Data telah berhasil dihapus');
        return redirect()->to('/listbuku/#list');
    }

    public function edit($slug)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'buku' => $this->bukuModel->getBuku($slug)
        ];

        return view('pages/tambah', $data);
    }

    public function update($id)
    {
        $bukuLama = $this->bukuModel->getBuku($this->request->getVar('slug'));
        if ($bukuLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[list-buku.judul]';
        }
        if (!$this->validate([
            'judul' => 'required|is_unique[list-buku.judul]',
            'penulis' => 'required',
            'harga' => 'required',
            'review' => 'required'
        ])) {
            $validation = \Config\Services::validation();

            return redirect()->to('/listbuku/edit' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }
        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->bukuModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'harga' => $this->request->getVar('harga'),
            'review' => $this->request->getVar('review')
        ]);
        session()->setFlashdata('pesan', 'Data telah berhasil diupdate');
        return redirect()->to('/listbuku/#list');
    }


    //--------------------------------------------------------------------

}
