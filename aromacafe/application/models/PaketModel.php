<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PaketModel extends CI_Model
{
    private $table = "paket";
    private $tableDetail = "detail_paket";
    private $tableMakanan = 'makanan';

    public function get()
    {
        $data_paket = $this->db
                        ->select([
                            'paket.id_paket',
                            'paket.nama_paket',
                            'paket.jenis_paket',
                            'paket.harga_paket',
                            'makanan.nama_makanan',
                            'makanan.foto_makanan'
                        ])
                        ->from($this->table)
                        ->join($this->tableDetail, 'detail_paket.id_paket = paket.id_paket')
                        ->join($this->tableMakanan, 'makanan.id_makanan = detail_paket.id_makanan')
                        ->get()->result_array();
        
        $paket = [];
        $jenis['jenis'] = [];
        $num = 0;
        foreach($data_paket as $value){

            array_push($jenis['jenis'], $value['jenis_paket']);

            $paket[$value['id_paket']] = array(
                'id'        => $value['id_paket'],
                'nama'      => $value['nama_paket'],
                'jenis'     => $value['jenis_paket'],
                'harga'     => $value['harga_paket'],
                'detail'    => array(),
            );
            

        };
        

        foreach($data_paket as $list_makanan){
            array_push(
                $paket[$list_makanan['id_paket']]['detail'],
                array(
                    'nama_makanan' => $list_makanan['nama_makanan'],
                    'foto_makanan' => $list_makanan['foto_makanan'],
                )
            );
        }

        sort($paket);
        $jenis['jenis'] = array_unique($jenis['jenis']);
        
        return array(
            'paket' => $paket,
            'jenis' => $jenis
        );
    }

    public function getAll()
    {
        $data = $this->db
            ->get($this->table)
            ->result();

        $resJson = array();
        $no = 1;

        if ($data) {
            foreach ($data as $d) {
                $id = $d->id_paket;
                $jenis = $d->jenis_paket;
                $nama = $d->nama_paket;
                $harga = $d->harga_paket;
                $resJson[] = array(
                    "no"    => $no++,
                    "id"    => $id,
                    "jenis" => $jenis,
                    "nama"  => $nama,
                    "txtharga"  => "Rp " . number_format($harga, 0, ',', '.'),
                    "harga"  => $harga,
                    "aksi"  => '
                    <a class="btn btn-link btn-sm text-info" href="./paket/detail/' . $id . '"> 
                        Detail <i class="fas fa-eye"></i>
                    </a>
                    <a class="btn btn-link btn-sm text-warning ubahPaket" data-toggle="modal" data-target="#modal-ubah"> 
                        Edit <i class="fas fa-edit"></i>
                    </a>
                    <a onclick="deletePaket(`' . $id . '`,`' . $jenis . ' - ' . $nama . '`)" class="btn btn-link btn-sm text-danger" >
                        Hapus <i class="fas fa-trash"></i>
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

    public function getById($id)
    {
        $data = $this->db
            ->where('id_paket', $id)
            ->get($this->table)
            ->result_array();

        return $data;
    }

    public function getId()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(id_paket ,3)) AS id_max FROM paket");
        $id = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->id_max) + 1;
                $id = sprintf("%03s", $tmp);
            }
        } else {
            $id = "001";
        }
        return "P" . $id;
    }

    public function add()
    {
        $post = $this->input->post();

        $this->id_paket = $this->getId();
        $this->jenis_paket = $post["jenis"];
        $this->nama_paket = $post["nama"];
        $this->harga_paket = $post["harga"];

        return $this->db->insert($this->table, $this);
    }

    public function update()
    {
        $post = $this->input->post();

        $this->jenis_paket = $post["jenis"];
        $this->nama_paket = $post["nama"];
        $this->harga_paket = $post["harga"];

        return $this->db->update($this->table, $this, array('id_paket' => $post["id"]));
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array('id_paket' => $id));
    }

    public function addDetail($id)
    {
        $post = $this->input->post();
        $rt = '';

        $this->db->delete($this->tableDetail, array('id_paket' => $id));
        foreach ($post['makanan'] as $n) {
            $this->id_paket = $id;
            $this->id_makanan = $n;
            $rt = $this->db->insert($this->tableDetail, $this);
        }

        return $rt;
    }
}
