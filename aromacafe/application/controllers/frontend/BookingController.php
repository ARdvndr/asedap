<?php

defined('BASEPATH') or exit('No direct script access allowed');

class BookingController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('paketModel');
        $this->load->model('tempatModel');
        $this->load->model('bookingModel');

        if (!$this->session->has_userdata('login')) {
            redirect(base_url('login'));
        }
    }

    public function index($id = false)
    {
        $data['id_tempat'] = $id;
        $data['paket'] = $this->paketModel->get();
        $data['tempat'] = $this->tempatModel->get();
        $this->load->view('frontend/pages/booking/index', $data);
    }

    public function doBooking()
    {
        $input = $this->input->post();
        $validated = [
            'id_customer' => $input['id_customer'],
            'id_tempat' => $input['id_tempat'],
            'id_paket' => $input['id_paket'],
            'jml_org' => $input['jumlah_orang'],
            'tanggal' => date('Y-m-d H:i:s', strtotime($input['tanggal'])),
            'lama_sewa' => $input['lama_sewa'],
            'total' => $input['total'],
            'tgl_pesan' => date('Y-m-d H:i:s'),
            'status' => 'Pending',
        ];

        $request = $this->bookingModel->booking($validated);

        if ($request) {
            redirect('booking/history');
        }
    }

    public function history()
    {
        $data = [];

        foreach ($this->bookingModel->getUserHistory() as $value) {
            $value['status'] = strtolower($value['status']);
            $data[$value['status']][$value['id_booking']] = array(
                'id_booking'        => $value['id_booking'],
                'id_paket'          => $value['id_paket'],
                'status'            => $value['status'],
                'nama_tempat'       => $value['nama_tempat'],
                'total'             => $value['total'],
                'jumlah_orang'      => $value['jml_org'],
                'bukti_bayar'       => $value['bukti_bayar'],
                'tanggal_booking'   => $value['tanggal'],
                'lama_sewa'         => $value['lama_sewa'],
                'tanggal_pesan'     => $value['tgl_pesan'],
                'paket'             => $value['jenis_paket'] . ' - ' . $value['nama_paket'],
                'detail'            => array(),
            );
        }

        foreach ($this->bookingModel->getUserHistory() as $value) {
            $value['status'] = strtolower($value['status']);
            array_push(
                $data[$value['status']][$value['id_booking']]['detail'],
                array(
                    'nama_makanan' => $value['nama_makanan'],
                )
            );
        }

        return $this->load->view('frontend/pages/booking/history', $data);
    }

    public function payment()
    {
        $config['upload_path'] = './assets/img/bukti/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 500;
        $config['max_width'] = 6000;
        $config['max_height'] = 6000;
        $config['file_name'] = $this->input->post('id_booking');
        $config['overwrite'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('bukti_bayar')) {
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);
        } else {
            $data = array(
                'bukti_bayar'   => $this->upload->data('file_name'),
                'id_booking'    => $this->input->post('id_booking'),
                'status'        => 'Proses',
            );

            if ($this->bookingModel->paymentUpload($data)) {
                redirect('booking/history');
            } else {
                redirect('booking/history');
            }
        }
    }
}
