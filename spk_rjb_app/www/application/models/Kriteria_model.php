<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria_model extends CI_Model
{
    private $table = "kriteria";

    public function getAll()
    {
        $data = $this->db
            ->get($this->table)
            ->result_array();

        return $data;
    }

    public function getById($id)
    {
        $data = $this->db
            ->where('id_kr', $id)
            ->get($this->table)
            ->row_array();

        return $data;
    }

    public function getParameter($id)
    {
        $data = $this->db
            ->where('id_kr', $id)
            ->get('parameter')
            ->result_array();

        return $data;
    }

    public function getid()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(id_kr ,2)) AS id_max FROM kriteria");
        $id = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $res) {
                $tmp = ((int)$res->id_max) + 1;
                $id = sprintf("%02s", $tmp);
            }
        } else {
            $id = "01";
        }
        return "C" . $id;
    }

    public function simpan()
    {
        $post = $this->input->post();
        $this->id_kr = $this->getid();
        $this->nama_kr = $post["nama"];
        $this->jenis_kr = $post["jenis"];
        $this->tipe_kr = $post["tipe"];

        return $this->db->insert($this->table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->nama_kr = $post["nama"];
        $this->jenis_kr = $post["jenis"];
        $this->tipe_kr = $post["tipe"];

        return $this->db->update($this->table, $this, array('id_kr' => $post["id"]));
    }

    public function hapus($id)
    {
        return $this->db->delete($this->table, array('id_kr' => $id));
    }

    public function simpanBobot()
    {
        $jml = 0;
        $post = $this->input->post();

        $kr = $this->getAll();

        foreach ($kr as $value) {
            $n = $post[$value['id_kr']];
            $jml += $n;
        }

        if ($jml == 100) {
            foreach ($kr as $value) {
                $id = $value['id_kr'];
                $this->nilai_bobot = $post[$id];

                $this->db->update($this->table, $this, array('id_kr' => $id));
            }
            $this->session->set_flashdata('sukses', 'Berhasil mengubah bobot');
            redirect('Kriteria');
        } else {
            $this->session->set_flashdata('error', 'Jumlah Bobot harus 100, jumlah bobot saat ini adalah ' . $jml);
            redirect('Kriteria/ubahBobot');
        }
    }

    public function simpanParameter($id)
    {
        $this->db->delete('parameter', array('id_kr' => $id));

        $post = $this->input->post();

        for ($i = 0; $i < count($post['nilai']); $i++) {
            $this->nilai_asli = $post['nilai'][$i];
            $this->nilai_parameter = $post['parameter'][$i];
            $this->id_kr = $id;

            $this->db->insert('parameter', $this);
        }

        return true;
    }
}
