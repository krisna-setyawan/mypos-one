<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data_session_username = $this->session->userdata('username');
        $data['user_login'] = $this->db->get_where('user', ['username' => $data_session_username])->row_array();

        $data['profil_toko'] = $this->db->get_where('profil_toko', ['id' => 1])->row_array();

        $data['jml_barang'] = $this->db->count_all('barang');
        $data['jml_suplier'] = $this->db->count_all('suplier');
        $data['jml_pelanggan'] = $this->db->count_all('pelanggan');
        $data['jml_reseller'] = $this->db->count_all('reseller');

        date_default_timezone_set('Asia/Jakarta');
        $hariini = date('Y-m-d');

        $this->db->where('tanggal', $hariini);
        $data['pj_hariini'] = $this->db->count_all_results('penjualan');

        $this->db->where('status', 'Selesai');
        $data['pj_selesai'] = $this->db->count_all_results('penjualan');

        $this->db->where('status', 'Proses');
        $data['pj_proses'] = $this->db->count_all_results('penjualan');

        $this->db->where('jenis_penjualan', 'umum');
        $data['pj_umum'] = $this->db->count_all_results('penjualan');

        $this->db->where('jenis_penjualan', 'pelanggan');
        $data['pj_pelanggan'] = $this->db->count_all_results('penjualan');

        $this->db->where('jenis_penjualan', 'reseller');
        $data['pj_reseller'] = $this->db->count_all_results('penjualan');



        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('v_utama/dashboard', $data);
        $this->load->view('templates/footer');
    }
}
