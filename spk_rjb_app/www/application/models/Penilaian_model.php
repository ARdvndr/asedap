<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian_model extends CI_Model
{
    private $tablePenilaian = "penilaian";

    public function getById($id)
    {
        $data = $this->db
            ->where('id_kel', $id)
            ->get($this->tablePenilaian)
            ->result_array();

        return $data;
    }

    public function getKeluarga()
    {
        $data = $this->db
            ->join('keluarga', 'keluarga.id_kel=penilaian.id_kel')
            ->group_by('keluarga.id_kel')
            ->get($this->tablePenilaian)
            ->result_array();

        return $data;
    }

    public function getList($idKel, $idKr)
    {
        $data = $this->db
            ->where('id_kel', $idKel)
            ->where('id_kr', $idKr)
            ->get($this->tablePenilaian)
            ->row_array();

        return $data;
    }

    public function simpan()
    {
        $post = $this->input->post();
        $kriteria = $this->Kriteria_model->getAll();
        $this->id_kel = $post['kel'];
        $this->tgl_sel = date('Y-m-d');

        foreach ($kriteria as $kr) {
            $this->id_kr = $kr['id_kr'];
            $this->nilai = $post[$kr['id_kr']];

            $this->db->insert($this->tablePenilaian, $this);
        }

        return true;
    }

    public function update()
    {
        $post = $this->input->post();

        $kriteria = $this->Kriteria_model->getAll();
        $this->tgl_sel = date('Y-m-d');

        foreach ($kriteria as $kr) {
            $this->nilai = $post[$kr['id_kr']];

            $this->db->update($this->tablePenilaian, $this, array('id_kel' => $post['kel'], 'id_kr' => $kr['id_kr']));
        }

        return true;
    }

    public function hapus($id)
    {
        return $this->db->delete($this->tablePenilaian, array('id_kel' => $id));
    }

    public function hitung()
    {
        $keluarga = $this->getKeluarga();
        $kriteria = $this->Kriteria_model->getAll();

        $alternatif = [];
        $matriks = [];
        $solusi = [];

        $i = 1;
        foreach ($keluarga as $kel) {

            $alternatif['A' . $i]['nama'] = $kel['nama_kel'];

            foreach ($kriteria as $kr) {
                $n = $this->getList($kel['id_kel'], $kr['id_kr']);
                $alternatif['A' . $i][$kr['id_kr']] = $n['nilai'];
            }
            $i++;
        }

        
        // Normalisasi Matriks
        
        foreach ($kriteria as $kr) {
            $matriks['n' . $kr['id_kr']] = 0;
        }
        
        foreach ($alternatif as $a) {
            foreach ($kriteria as $kr) {
                $id = $kr['id_kr'];
                $matriks['n' . $id] += pow($a[$id], 2);
            }
        }
        
        foreach ($matriks as $key => $value) {
            $matriks[$key] = round(sqrt($value), 4);
        }
        
        foreach ($alternatif as $key => $a) {
            foreach ($kriteria as $kr) {
                $id = $kr['id_kr'];
                $alternatif[$key]['r' . $id] = round($a[$id] / $matriks['n' . $id], 4);
            }
        }
        
        // Normalisasi Matriks Terbobot
        foreach ($alternatif as $key => $a) {
            foreach ($kriteria as $kr) {
                $id = $kr['id_kr'];
                $n = round($a['r' . $id] * ($kr['nilai_bobot'] / 100), 4);
                $alternatif[$key]['y' . $id] = $n;
            }
        }

        // Solusi Ideal
        foreach ($alternatif as $key => $a) {
            foreach ($kriteria as $kr) {
                $id = $kr['id_kr'];
                if ($kr['tipe_kr'] == "Benefit") {
                    $solusi['y+' . $id] = max(array_column($alternatif, 'y' . $id));
                    $solusi['y-' . $id] = min(array_column($alternatif, 'y' . $id));
                } else {
                    $solusi['y+' . $id] = min(array_column($alternatif, 'y' . $id));
                    $solusi['y-' . $id] = max(array_column($alternatif, 'y' . $id));
                }
            }
        }

        // Jarak Solusi Ideal Positif & Negatif
        foreach ($alternatif as $key => $a) {
            $positif = 0;
            $negatif = 0;
            foreach ($kriteria as $kr) {
                $id = $kr['id_kr'];
                $positif += pow(($a['y' . $id] - $solusi['y+' . $id]), 2);
                $negatif += pow(($a['y' . $id] - $solusi['y-' . $id]), 2);
            }
            $alternatif[$key]['D+'] = round(sqrt($positif), 4);
            $alternatif[$key]['D-'] = round(sqrt($negatif), 4);
        }
        
        foreach ($alternatif as $key => $a) {
            $alternatif[$key]['V'] = round($a['D-'] / ($a['D-'] + $a['D+']), 4);
        }

        usort($alternatif, function($a, $b) {
            return $b['V'] <=> $a['V'];
        });

        $data = array(
            'alternatif' => $alternatif,
            'solusi' => $solusi,
        );

        return $data;
    }
}
