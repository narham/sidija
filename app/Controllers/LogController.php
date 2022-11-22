<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\LogModel;

class LogController extends BaseController
{
    protected $log;

    public function __construct()
    {
        $this->log = new LogModel();
    }


    public function index()
    {
        //
        $tanggal = date("Y-m-d");
        $pagi = "APEL PAGI";
        $malam = "APEL MALAM";
        $makan_pagi = "MAKAN PAGI";
        $makan_siang = "MAKAN SIANG";
        $makan_malam = "MAKAN MALAM";
        $data = [
            'judul' => '',
            'bread' => '',
            'header' => '',
            'link' => base_url('/admin'),
            'log_apel_pagi' => $this->log->log_hari_ini()->like('kegiatan', $pagi)->get()->getLastRow(),
            'log_apel_malam' => $this->log->log_hari_ini()->like('kegiatan', $malam)->get()->getLastRow(),
            'log_makan_pagi' => $this->log->log_hari_ini()->like('kegiatan', $makan_pagi)->get()->getLastRow(),
            'log_makan_siang' => $this->log->log_hari_ini()->like('kegiatan', $makan_siang)->get()->getLastRow(),
            'log_makan_malam' => $this->log->log_hari_ini()->like('kegiatan', $makan_malam)->get()->getLastRow(),
        ];
        // dd($data);
        return view('petugas/logbook', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'kegiatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'catatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $data = [
            'tanggal' => $this->request->getVar('tanggal'),
            'kegiatan' => $this->request->getVar('kegiatan'),
            'catatan' => $this->request->getVar('catatan'),
        ];
        // dd($data);
        $this->log->insert($data);

        return redirect()->to('/logbook');
    }
}