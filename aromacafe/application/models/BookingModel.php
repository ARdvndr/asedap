<?php

defined('BASEPATH') or exit('No direct script access allowed');

class BookingModel extends CI_Model
{
    private $table = "booking";
    private $tablePaket = "paket";
    private $tableMakanan = "makanan";
    private $tableDetail = "detail_paket";
    private $tableTempat = "tempat";

    public function getId()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(id_booking ,8)) AS id_max FROM $this->table");
        $id = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->id_max) + 1;
                $id = sprintf("%08s", $tmp);
            }
        } else {
            $id = "00000001";
        }
        return "B" . $id;
    }

    public function booking($data = [])
    {
        $data['id_booking'] = $this->getId();
        return $this->db->insert($this->table, $data);
    }

    public function getApprove()
    {
        $data = $this->db
            ->join('customer', 'customer.id_customer=booking.id_customer')
            ->join('paket', 'paket.id_paket=booking.id_paket')
            ->join('tempat', 'tempat.id_tempat=booking.id_tempat')
            ->where('status', 'Proses')
            ->where('bukti_bayar !=', null)
            ->get($this->table)
            ->result();

        $resJson = array();
        $no = 1;

        if ($data) {
            foreach ($data as $d) {
                $id = $d->id_booking;
                $total = $d->total;
                $resJson[] = array(
                    "no"            => $no++,
                    "id"            => $id,
                    "tanggal"       => date('d F Y H:i:s', strtotime($d->tanggal)),
                    "lama_sewa"     => $d->lama_sewa,
                    "id_customer"   => $d->id_customer,
                    "id_paket"      => $d->id_paket,
                    "id_tempat"     => $d->id_tempat,
                    "customer"      => $d->nama,
                    "paket"         => $d->jenis_paket . ' - ' . $d->nama_paket,
                    "tempat"        => $d->nama_tempat,
                    "jml_org"       => $d->jml_org,
                    "txttotal"      => "Rp " . number_format($total, 0, ',', '.'),
                    "total"         => $total,
                    "bukti"         => "<image src='" . base_url("assets/img/bukti/$d->bukti_bayar") . "' height=80 />",
                    "aksi"  => '
                    <a onclick="approve(`' . $id . '`)" class="btn btn-link btn-sm text-success" >
                        Approve <i class="fas fa-check"></i>
                    </a>
                    <a onclick="batal(`' . $id . '`)" class="btn btn-link btn-sm text-danger" >
                        Batal <i class="fas fa-trash"></i>
                    </a>',
                );
            }
        } else {
            $resJson = [];
        }

        $response = array(
            "data" => $resJson,
        );

        return json_encode($response);
    }

    public function getPending()
    {
        $data = $this->db
            ->join('customer', 'customer.id_customer=booking.id_customer')
            ->join('paket', 'paket.id_paket=booking.id_paket')
            ->join('tempat', 'tempat.id_tempat=booking.id_tempat')
            ->where('status', 'Pending')
            ->where('bukti_bayar', null)
            ->get($this->table)
            ->result();

        $resJson = array();
        $no = 1;

        if ($data) {
            foreach ($data as $d) {
                $id = $d->id_booking;
                $total = $d->total;
                $resJson[] = array(
                    "no"            => $no++,
                    "id"            => $id,
                    "tanggal"       => date('d F Y H:i:s', strtotime($d->tanggal)),
                    "lama_sewa"     => $d->lama_sewa,
                    "id_customer"   => $d->id_customer,
                    "id_paket"      => $d->id_paket,
                    "id_tempat"     => $d->id_tempat,
                    "customer"      => $d->nama,
                    "paket"         => $d->jenis_paket . ' - ' . $d->nama_paket,
                    "tempat"        => $d->nama_tempat,
                    "jml_org"       => $d->jml_org,
                    "txttotal"      => "Rp " . number_format($total, 0, ',', '.'),
                    "total"         => $total,
                    "tgl_pesan"       => date('d F Y H:i:s', strtotime($d->tgl_pesan)),
                    "aksi"  => '
                    <a onclick="batal(`' . $id . '`)" class="btn btn-link btn-sm text-danger" >
                        Batal <i class="fas fa-trash"></i>
                    </a>',
                );
            }
        } else {
            $resJson = [];
        }

        $response = array(
            "data" => $resJson,
        );

        return json_encode($response);
    }

    public function getRiwayat()
    {
        $data = $this->db
            ->join('customer', 'customer.id_customer=booking.id_customer')
            ->join('paket', 'paket.id_paket=booking.id_paket')
            ->join('tempat', 'tempat.id_tempat=booking.id_tempat')
            ->where('status', 'Selesai')
            ->get($this->table)
            ->result();

        $resJson = array();
        $no = 1;

        if ($data) {
            foreach ($data as $d) {
                $id = $d->id_booking;
                $total = $d->total;
                $resJson[] = array(
                    "no"            => $no++,
                    "id"            => $id,
                    "tanggal"       => date('d F Y H:i:s', strtotime($d->tanggal)),
                    "lama_sewa"     => $d->lama_sewa,
                    "id_customer"   => $d->id_customer,
                    "id_paket"      => $d->id_paket,
                    "id_tempat"     => $d->id_tempat,
                    "customer"      => $d->nama,
                    "paket"         => $d->jenis_paket . ' - ' . $d->nama_paket,
                    "tempat"        => $d->nama_tempat,
                    "jml_org"       => $d->jml_org,
                    "txttotal"      => "Rp " . number_format($total, 0, ',', '.'),
                    "total"         => $total,
                );
            }
        } else {
            $resJson = [];
        }

        $response = array(
            "data" => $resJson,
        );

        return json_encode($response);
    }

    public function approve($id)
    {
        $this->status = 'Selesai';
        return $this->db->update($this->table, $this, array('id_booking' => $id));
    }

    public function batal($id)
    {
        $this->status = 'Dibatalkan';
        return $this->db->update($this->table, $this, array('id_booking' => $id));
    }

    public function getUserHistory()
    {
        return $this->db
                ->select([
                    'booking.id_booking',
                    'booking.tanggal',
                    'booking.tgl_pesan',
                    'booking.bukti_bayar',
                    'booking.jml_org',
                    'booking.status',
                    'booking.total',
                    'booking.lama_sewa',
                    'paket.id_paket',
                    'paket.nama_paket',
                    'paket.jenis_paket',
                    'paket.harga_paket',
                    'makanan.nama_makanan',
                    'makanan.foto_makanan',
                    'tempat.nama_tempat'
                ])
                ->join($this->tablePaket, 'paket.id_paket=booking.id_paket')
                ->join($this->tableDetail, 'detail_paket.id_paket = paket.id_paket')
                ->join($this->tableMakanan, 'makanan.id_makanan = detail_paket.id_makanan')
                ->join($this->tableTempat, 'tempat.id_tempat=booking.id_tempat')
                ->where('booking.id_customer', $this->session->userdata('user_id'))
                ->get($this->table)
                ->result_array();
    }

    public function paymentUpload($data = [])
    {
        return $this->db->update($this->table, $data, array('id_booking' => $data['id_booking']));   
    }
}
